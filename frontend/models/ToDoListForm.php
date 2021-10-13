<?php

namespace app\models;

use common\models\User;
use yii\base\Model;

class ToDoListForm extends Model
{
    public $name;
    public $user_id;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['user_id', 'trim'],
            ['user_id', 'required'],

        ];
    }

    /**
     * Adds list.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function addToDoList()
    {
        if (!$this->validate()) {
            return null;
        }

        $toDoList = new ToDoList();
        $toDoList->name = $this->name;
        $toDoList->user_id = $this->user_id;

        return $toDoList->save();
    }
}