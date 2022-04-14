<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "family_account".
 *
 * @property int $id
 * @property int|null $type
 * @property int|null $currency
 * @property float|null $quantity
 * @property string|null $comment
 * @property int|null $user_id
 * @property int|null $category_id
 * @property date|null $date
 * @property int $created_at
 * @property int $updated_at
 *
 * @property CategoryExpense $category
 * @property User $user
 */
class FamilyAccount extends \yii\db\ActiveRecord
{
    const TYPE_IN = 0;
    const TYPE_OUT = 1;

    const CURRENCY_UZS = 0;
    const CURRENCY_USD = 1;

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                // 'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'family_account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at'], 'integer'],
            [['type'], 'in', 'range' => [self::TYPE_IN, self::TYPE_OUT]],
            [['currency'], 'in', 'range' => [self::CURRENCY_UZS, self::CURRENCY_USD]],
            [['currency'], 'default', 'value' => 0],
            [['quantity'], 'double'],
            [['comment'], 'string'],
            [['date'], 'safe'],
//            [['created_at', 'updated_at'], 'required'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => CategoryExpense::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Shakli',
            'currency' => 'Valyuta',
            'quantity' => 'Qiymat',
            'comment' => 'Izoh',
            'user_id' => 'Oila a\'zosi',
            'category_id' => 'Kategoriya',
            'date' => 'Sana',
            'created_at' => 'Yaratilgan',
            'updated_at' => 'Tahrirlangan',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(CategoryExpense::className(), ['id' => 'category_id']);
    }

    public function getQuantum(){
        return $this->quantity . ' ' . ['UZS', 'USD'][$this->currency];
    }
}
