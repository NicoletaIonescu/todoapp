<?php

namespace app\models;

use common\models\User;
use yii\base\Model;

class ToDoListForm extends Model
{
    public $list_id;
    public $name;
    public $user_id;
    public $items;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['list_id', 'integer'],
            ['name', 'trim'],
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],

            ['user_id', 'trim'],
            ['user_id', 'required'],

            ['items', 'each', 'rule' => ['string']]
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
        $toDoList->save();


        foreach($this->items as $item){
            $toDoListItem = new ToDoItem();
            $toDoListItem->list_id = $toDoList->getId();
            $toDoListItem->name = $item;
            $toDoListItem->status = 0;

            $toDoListItem->save();
        }

        return true;
    }

    /**
     * Adds list.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function editToDoList()
    {
        if (!$this->validate()) {
            return null;
        }
        $toDoList = ToDoList::findOne($this->list_id);
        $toDoList->name = $this->name;
        $toDoList->user_id = $this->user_id;
        $toDoList->save();

        $itemsModel = new ToDoItem();
        $itemsList = $itemsModel->getAllByListId($toDoList);
        foreach($itemsList as $item){
            $item->delete();
        }

        foreach($this->items as $item){
            $toDoListItem = new ToDoItem();
            $toDoListItem->list_id = $toDoList->getId();
            $toDoListItem->name = $item;
            $toDoListItem->status = 0;

            $toDoListItem->save();
        }

        return true;
    }
}