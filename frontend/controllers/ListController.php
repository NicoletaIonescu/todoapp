<?php

namespace frontend\controllers;

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
            return $this->goHome();
        }

        return $this->render('add', [
            'model' => $model,
            'user_id' => $user_id
        ]);
    }
}