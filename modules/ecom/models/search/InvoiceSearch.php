<?php

namespace app\modules\ecom\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ecom\models\Invoice;

/**
 * InvoiceSearch represents the model behind the search form about `app\modules\ecom\models\Invoice`.
 */
class InvoiceSearch extends Invoice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'invoice_type_id', 'invoice_status_id', 'user_id', 'currency_id', 'billing_address_id', 'shipping_address_id'], 'integer'],
            [['auth_key', 'number', 'date_created', 'date_due', 'date_updated', 'date_closed', 'notes', 'timestamp'], 'safe'],
            [['total', 'shipping', 'vat', 'vat_rate'], 'number'],
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
        $query = Invoice::find();

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
            'invoice_type_id' => $this->invoice_type_id,
            'invoice_status_id' => $this->invoice_status_id,
            'user_id' => $this->user_id,
            'currency_id' => $this->currency_id,
            'billing_address_id' => $this->billing_address_id,
            'shipping_address_id' => $this->shipping_address_id,
            'total' => $this->total,
            'shipping' => $this->shipping,
            'vat' => $this->vat,
            'vat_rate' => $this->vat_rate,
            'date_created' => $this->date_created,
            'date_due' => $this->date_due,
            'date_updated' => $this->date_updated,
            'date_closed' => $this->date_closed,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
