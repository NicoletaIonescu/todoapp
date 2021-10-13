<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%to_do_items}}`.
 */
class m211013_163813_create_to_do_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%to_do_item}}', [
            'id' => $this->primaryKey(),
            'list_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'status' => $this->boolean()->notNull()->defaultValue(0)
        ]);

        $this->addForeignKey(
            'fk-to-do-item-list_id',
            'to_do_item',
            'list_id',
            'to_do_list',
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
            'fk-to-do-item-list_id',
            'to_do_item'
        );

        $this->dropTable('{{%to_do_item}}');
    }
}
