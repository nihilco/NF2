<?php

namespace app\modules\ecom\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ecom\models\Account;

/**
 * AccountSearch represents the model behind the search form about `app\modules\ecom\models\Account`.
 */
class AccountSearch extends Account
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'account_status_id', 'user_id'], 'integer'],
            [['stripe_account_id', 'secret_key', 'publishable_key', 'date_created', 'date_updated', 'timestamp'], 'safe'],
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
        $query = Account::find();

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
            'account_status_id' => $this->account_status_id,
            'user_id' => $this->user_id,
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'stripe_account_id', $this->stripe_account_id]);
        $query->andFilterWhere(['like', 'secret_key', $this->secret_key]);
        $query->andFilterWhere(['like', 'publishable_key', $this->publishable_key]);

        return $dataProvider;
    }
}
