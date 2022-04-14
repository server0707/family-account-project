<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_expense}}`.
 */
class m220412_133549_create_category_expense_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_expense}}', [                       //xarajatlarning kategoriya jadvali
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull()->unique(),              //kategoriya nomi

            'created_at' => $this->integer()->notNull(),                        //saytda yaratilgan vaqti
            'updated_at' => $this->integer()->notNull(),                        //ma'lumotlari tahrirlangan vaqt
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%category_expense}}');
    }
}
