<?php

namespace frontend\models\todomodels;


use yii\base\Model;

class ToDoItemForm extends Model
{
    public $id;
    public $name;
    public $status;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['id', 'integer'],
            ['name', 'required'],
            ['status', 'boolean']
        ];
    }

    public function saveToDoItem()
    {
        if (!$this->validate()) {
            return null;
        }

        return true;
    }

}