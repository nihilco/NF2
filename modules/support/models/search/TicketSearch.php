<?php

namespace app\modules\support\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\support\models\Ticket;

/**
 * TicketSearch represents the model behind the search form about `app\modules\support\models\Ticket`.
 */
class TicketSearch extends Ticket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'parent_id', 'type_id', 'status_id', 'priority_id', 'reporter_id', 'assignee_id', 'resolution_id'], 'integer'],
            [['ref_code', 'name', 'slug', 'date_reported', 'date_assigned', 'date_edited', 'date_estimated', 'date_resolved', 'time_estimated', 'time_actual', 'message', 'details', 'timestamp'], 'safe'],
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
        $query = Ticket::find();

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
            'parent_id' => $this->parent_id,
            'type_id' => $this->type_id,
            'status_id' => $this->status_id,
            'priority_id' => $this->priority_id,
            'reporter_id' => $this->reporter_id,
            'assignee_id' => $this->assignee_id,
            'date_reported' => $this->date_reported,
            'date_assigned' => $this->date_assigned,
            'date_edited' => $this->date_edited,
            'date_estimated' => $this->date_estimated,
            'date_resolved' => $this->date_resolved,
            'time_estimated' => $this->time_estimated,
            'time_actual' => $this->time_actual,
            'resolution_id' => $this->resolution_id,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'ref_code', $this->ref_code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'details', $this->details]);

        return $dataProvider;
    }
}
