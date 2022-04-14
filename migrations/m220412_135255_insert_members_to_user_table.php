<?php

use yii\db\Migration;

/**
 * Class m220412_135255_insert_members_to_user_table
 */
class m220412_135255_insert_members_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('user',                  //login: admin      parol: admin    oila azosi qoshish
            [
                'id',
                'fullName',
                'username',
                'password_hash',
                'auth_key',

                'created_at',
                'updated_at',
            ],
            [
                [
                    1,
                    'admin',
                    'admin',
                    '$2y$13$vtgd4QeO2iKZOEq2sfVJw.GOOh02yeAy6AH6UiEaxJFPysVI9AJHy',     //admin
                    '7ZzmYYJRXW.NwaVt8gxtLQ9GKCo9LU2',

                    1633850322,
                    1633850322,
                ],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['in', 'id', [1]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220412_135255_insert_members_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
