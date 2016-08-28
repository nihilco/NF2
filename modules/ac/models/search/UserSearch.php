<?php

namespace app\modules\ac\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ac\models\User;

/**
 * UserSearch represents the model behind the search form about `app\modules\ac\models\User`.
 */
class UserSearch extends User
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'login_attempts'], 'integer'],
            [['stripe_customer_id', 'email', 'password', 'nickname', 'date_registered', 'date_updated', 'date_last_login', 'auth_key', 'timestamp'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
    public function search($params)
    {
        $query = User::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'date_registered' => $this->date_registered,
            'date_updated' => $this->date_updated,
            'date_last_login' => $this->date_last_login,
            'login_attempts' => $this->login_attempts,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'stripe_customer_id', $this->stripe_customer_id])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'nickname', $this->nickname])
            ->andFilterWhere(['like', 'auth_key', $this->auth_key]);

        return $dataProvider;
    }
}
