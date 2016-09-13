<?php

namespace app\modules\pa\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\pa\models\Email;

/**
 * EmailSearch represents the model behind the search form about `app\modules\pa\models\Email`.
 */
class EmailSearch extends Email
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'email_type_id', 'user_id', 'total_views'], 'integer'],
            [['auth_key', 'subject', 'text', 'html', 'date_created', 'date_opened', 'date_last_viewed', 'timestamp'], 'safe'],
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
        $query = Email::find();

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
            'email_type_id' => $this->email_type_id,
            'user_id' => $this->user_id,
            'date_created' => $this->date_created,
            'date_opened' => $this->date_opened,
            'date_last_viewed' => $this->date_last_viewed,
            'total_views' => $this->total_views,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'text', $this->text])
            ->andFilterWhere(['like', 'html', $this->html]);

        return $dataProvider;
    }
}
