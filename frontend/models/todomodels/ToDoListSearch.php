<?php

namespace frontend\models\todomodels;

use common\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Exception;

/**
 * ToDoListSearch represents the model behind the search form of `frontend\models\ToDoList`.
 */
class ToDoListSearch extends ToDoList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, User $user)
    {
        if(!$user) {
            throw new Exception("no user for lists");
        }

        $pageSize = isset($params['per-page']) ? intval($params['per-page']) : 2;

        $query = $user->getToDoLists();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
