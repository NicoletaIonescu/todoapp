<?php

namespace frontend\models\todomodels;

use yii\web\User;

class ToDoItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%to_do_item}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['list_id'],  'required']

        ];
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status'
        ];
    }


    public function getAllByListId(ToDoList $list)
    {
        $list_id = $list->getId();
        $toDoItems = $this->find()->where(["list_id" => $list_id])->all();
        return $toDoItems;
    }
}