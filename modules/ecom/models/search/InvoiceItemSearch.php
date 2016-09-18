<?php

namespace app\modules\ecom\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\ecom\models\InvoiceItem;

/**
 * InvoiceItemSearch represents the model behind the search form about `app\modules\ecom\models\InvoiceItem`.
 */
class InvoiceItemSearch extends InvoiceItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'invoice_id', 'invoice_item_type_id', 'quantity', 'add_vat'], 'integer'],
            [['invoice_item_reference_number', 'description', 'date_created', 'timestamp'], 'safe'],
            [['unit_price', 'subtotal'], 'number'],
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
        $query = InvoiceItem::find();

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
            'invoice_id' => $this->invoice_id,
            'invoice_item_type_id' => $this->invoice_item_type_id,
            'quantity' => $this->quantity,
            'add_vat' => $this->add_vat,
            'unit_price' => $this->unit_price,
            'subtotal' => $this->subtotal,
            'date_created' => $this->date_created,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'invoice_item_reference_number', $this->invoice_item_reference_number])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
