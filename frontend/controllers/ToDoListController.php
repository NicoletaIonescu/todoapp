<?php

namespace frontend\controllers;

use frontend\models\todomodels\ToDoList;
use frontend\models\todomodels\ToDoListForm;
use frontend\models\todomodels\ToDoListSearch;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ToDoListController implements the CRUD actions for ToDoList model.
 */
class ToDoListController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all ToDoList models.
     * @return mixed
     */
    public function actionIndex($pageSize = 2)
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $searchModel = new ToDoListSearch();
        $dataProvider = $searchModel->search($this->request->queryParams, Yii::$app->user->identity);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'pageSize' => $pageSize,
        ]);
    }

    /**
     * Displays a single ToDoList model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ToDoList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new ToDoListForm();
        $user_id = Yii::$app->user->identity->id;

        if ($model->load(Yii::$app->request->post()) && $model->addToDoList()) {
            Yii::$app->session->setFlash('success', 'You created a list!');
            return $this->redirect( Url::to(['to-do-list/index']));
        }

        return $this->render('create', [
            'model' => $model,
            'user_id' => $user_id
        ]);
    }

    /**
     * Updates an existing ToDoList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ToDoList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ToDoList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ToDoList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ToDoList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
