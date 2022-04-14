<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m220412_132140_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [                               //oila a'zolari jadvali
            'id' => $this->primaryKey(),
            'fullName' => $this->string(255)->notNull()->unique(),      //oila azosining toliq ishmi
            'username' => $this->string(40)->unique()->notNull(),       //saytga kirish uchun login
            'password_hash' => $this->string()->notNull(),                      //saytga kirish uchun shifrlangan kalit
            'auth_key' => $this->string(32)->notNull(),                 //avtorizatsiya kaliti

            'created_at' => $this->integer()->notNull(),                        //saytda yaratilgan vaqti
            'updated_at' => $this->integer()->notNull(),                        //ma'lumotlari tahrirlangan vaqt
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
