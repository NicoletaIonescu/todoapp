<?php

namespace frontend\controllers;

use app\models\ToDoItem;
use app\models\ToDoList;
use app\models\ToDoListForm;
use frontend\models\SignupForm;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class ListController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $toDoListsModel = new ToDoList();
        $toDoLists = $toDoListsModel->getAllByUserId(Yii::$app->user);

        return $this->render('index', [ 'lists' => $toDoLists ]);
    }

    public function actionAdd()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new ToDoListForm();
        $user_id = Yii::$app->user->getId();

        if ($model->load(Yii::$app->request->post()) && $model->addToDoList()) {
            Yii::$app->session->setFlash('success', 'You created a list!');
            return $this->redirect( Url::to(['list/index']));
        }

        return $this->render('add', [
            'model' => $model,
            'user_id' => $user_id
        ]);
    }

    public function actionEdit($list_id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $list = ToDoList::findOne($list_id);
        $itemsModel = new ToDoItem();
        $itemsList = $itemsModel->getAllByListId($list);
        $items=[];
        foreach($itemsList as $item){
            $items[] = $item->name;
        }

        $model = new ToDoListForm();
        $model->list_id = $list_id;
        $model->name = $list->name;
        $model->user_id = $list->user_id;
        $model->items = $items;
        $user_id = Yii::$app->user->getId();


        if ($model->load(Yii::$app->request->post()) && $model->editToDoList()) {
            Yii::$app->session->setFlash('success', 'You created a list!');
            return $this->redirect( Url::to(['list/index']));
        }

        return $this->render('edit', [
            'model' => $model,
            'user_id' => $user_id,
            'list_id' => $list_id
        ]);
    }

}