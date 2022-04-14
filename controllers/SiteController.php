<?php

namespace app\controllers;

use app\models\CategoryExpense;
use app\models\ContactForm;
use app\models\FamilyAccount;
use app\models\FamilyDocuments;
use app\models\LaborActivity;
use app\models\LoginForm;
use app\models\User;
use Faker\Factory;
use Yii;
use yii\db\Expression;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'index', 'fake-data'],
                'rules' => [
                    [
                        'actions' => ['logout', 'index', 'fake-data'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $familyMembers = User::find()->innerJoin('family_account', '`family_account`.`user_id` = `user`.`id`')->where('`family_account`.`date` > DATE_ADD(NOW(), INTERVAL(1-DAYOFWEEK(NOW())) DAY)')->select('user.fullName')->distinct('fullName')->all();
        $familyAccounts = FamilyAccount::find()->where(['>', 'date', new Expression('DATE_ADD(NOW(), INTERVAL(1-DAYOFWEEK(NOW())) DAY)')])->orderBy(['date' => SORT_DESC])->all();
        return $this->render('index', compact('familyAccounts', 'familyMembers'));
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionFakeData()
    {
        $faker = Factory::create('uz_UZ');

        for ($i = 1; $i <= 5; $i++) {
            $model = new User();

            $model->fullName = $faker->firstName . ' ' . $faker->lastName . ' ' . $faker->firstNameMale;
            $model->username = $faker->userName;
            $model->setPassword('admin');
            $model->generateAuthKey();
            while (!$model->save()) {
                $model->username = $faker->userName;
            }
            unset($model);
        }

        for ($i = 1; $i <= 8; $i++) {
            $model = new CategoryExpense();

            $model->name = $faker->name;
            while (!$model->save()) {
                $model->name = $faker->name;
            }
            unset($model);
        }


        for ($i = 1; $i <= 100; $i++) {
            $model = new FamilyAccount();

            $model->comment = $faker->realText;
            $model->quantity = $faker->randomFloat(2, 0, 999999999);
            $model->type = rand(0, 1);

            if ($model->quantity <= 5000) {
                $model->currency = FamilyAccount::CURRENCY_USD;
            } else {
                $model->currency = FamilyAccount::CURRENCY_UZS;
            }
            $model->date = $faker->date;
            $model->user_id = rand(1, User::find()->count());
            $model->category_id = rand(1, CategoryExpense::find()->count());

            if (!$model->save()) {
                die($model->errors);
            }
            unset($model);
        }

        return $this->goHome();
    }
}
