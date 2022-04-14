<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%family_account}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%category_expense}}`
 */
class m220412_133650_create_family_account_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%family_account}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),                                  //oila a'zosi id si
            'category_id' => $this->integer(),                              //kategoriya id si
            'type' => $this->tinyInteger(),                                 //0=>kirim yoki 1=>chiqim belgisi
            'quantity' => $this->double(),                                  //pul miqdori (bir xil valyutada)
            'comment' => $this->text(),                                     //izoh (agar mavjud bolsa)
            'date' => $this->date(),                                        //izoh (agar mavjud bolsa)
            'currency' => $this->tinyInteger()->defaultValue(0),    //Pul birligi (USD, UZS)

            'created_at' => $this->integer()->notNull(),                    //saytda yaratilgan vaqti
            'updated_at' => $this->integer()->notNull(),                    //ma'lumotlari tahrirlangan vaqt
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-family_account-user_id}}',
            '{{%family_account}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-family_account-user_id}}',
            '{{%family_account}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-family_account-category_id}}',
            '{{%family_account}}',
            'category_id'
        );

        // add foreign key for table `{{%category_expense}}`
        $this->addForeignKey(
            '{{%fk-family_account-category_id}}',
            '{{%family_account}}',
            'category_id',
            '{{%category_expense}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-family_account-user_id}}',
            '{{%family_account}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-family_account-user_id}}',
            '{{%family_account}}'
        );

        // drops foreign key for table `{{%category_expense}}`
        $this->dropForeignKey(
            '{{%fk-family_account-category_id}}',
            '{{%family_account}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-family_account-category_id}}',
            '{{%family_account}}'
        );

        $this->dropTable('{{%family_account}}');
    }
}
