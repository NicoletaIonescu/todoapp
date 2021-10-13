<?php

namespace app\models;

use Yii;
use yii\web\User;

/**
 * This is the model class for table "{{%to_do_list}}".
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $order_number
 * @property string $name
 *
 * @property User $user
 */
class ToDoList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%to_do_list}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['user_id', 'user_id'],  'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'order_number' => 'Order Number',
            'name' => 'Name',
        ];
    }

//    /**
//     * Gets query for [[User]].
//     *
//     * @return \yii\db\ActiveQuery
//     */
//    public function getUser()
//    {
//        return $this->hasOne(User::className(), ['id' => 'user_id']);
//    }

    public function getAllByUserId(User $user)
    {
        $user_id = $user->getId();
        $toDoLists = $this->find()->where(["user_id" => $user_id])->all();
        return $toDoLists;
    }
}
