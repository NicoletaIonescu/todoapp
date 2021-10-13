<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%to_do_list}}`.
 */
class m211012_074344_create_to_do_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%to_do_list}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'order_number'=> $this->integer(),
            'name' => $this->string()->notNull()
        ]);

        $this->addForeignKey(
            'fk-to-do-list-user_id',
            'to_do_list',
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
            'fk-to-do-list-user_id',
            'to_do_list'
        );

        $this->dropTable('{{%to_do_list}}');
    }
}
