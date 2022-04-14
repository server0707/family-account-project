<?php

use app\models\FamilyAccount;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\FamilyAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Oilaviy kirim-chiqimlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-account-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('+', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    return array('Kirim', 'Chiqim')[$model->type];
                },
                'filter' => ['Kirim', 'Chiqim'],
                'options' => [
                    'style' => [
                        'width' => '100px'
                    ]
                ]
            ],
            [
                'attribute' => 'quantity',
                'value' => function($model){
                    return $model->getQuantum();
                }
            ],
//            'comment:ntext',
            [
                'attribute' => 'date',
                'options' => [
                    'style' => [
                        'width' => '100px'
                    ]
                ]
            ],
            [
                'attribute' => 'category_id',
                'label' => 'Categoriya nomi',
                'value' => function ($model) {
                    return $model->category->name;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\CategoryExpense::find()->all(), 'id', 'name')
            ],
            [
                'attribute' => 'user_id',
                'label' => 'Oila a\'zosi',
                'value' => function ($model) {
                    return $model->user->fullName;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'fullName')
            ],
            //'created_at',
            //'updated_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, FamilyAccount $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
