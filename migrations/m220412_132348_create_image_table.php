<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m220412_132348_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [                              //barcha rasmlar(oila azosi, hujjatlar)ni saqlovchi jadval
            'id' => $this->primaryKey(),
            'filePath' => $this->string(400)->notNull(),
            'itemId' => $this->integer(),
            'isMain' => $this->boolean(),
            'modelName' => $this->string(150)->notNull(),
            'urlAlias' => $this->string(400)->notNull(),
            'name' => $this->string(80)
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
