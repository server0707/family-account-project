<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category_expense".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 *
 * @property FamilyAccount[] $familyAccounts
 */
class CategoryExpense extends \yii\db\ActiveRecord
{
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
        return 'category_expense';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'/*, 'created_at', 'updated_at'*/], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'created_at' => 'Yaratilgan',
            'updated_at' => 'Tahrirlangan',
        ];
    }

    /**
     * Gets query for [[FamilyAccounts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFamilyAccounts()
    {
        return $this->hasMany(FamilyAccount::className(), ['category_id' => 'id']);
    }
}
