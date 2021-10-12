<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%list}}`.
 */
class m211012_074344_create_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%list}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'order_number'=> $this->integer(),
            'name' => $this->string()->notNull()
        ]);

        $this->addForeignKey(
            'fk-list-user_id',
            'list',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-list-user_id',
            'list'
        );

        $this->dropTable('{{%list}}');
    }
}
