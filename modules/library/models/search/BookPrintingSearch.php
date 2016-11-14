<?php

namespace app\modules\library\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\library\models\BookPrinting;

/**
 * BookPrintingSearch represents the model behind the search form about `app\modules\library\models\BookPrinting`.
 */
class BookPrintingSearch extends BookPrinting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'book_id', 'publisher_id', 'edition_id', 'format_id', 'quantity', 'signed', 'personalized'], 'integer'],
            [['printing', 'number_line', 'date_published', 'date_bought', 'date_created', 'date_updated'], 'safe'],
            [['paid', 'value', 'sell'], 'number'],
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
        $query = BookPrinting::find();

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
            'book_id' => $this->book_id,
            'publisher_id' => $this->publisher_id,
            'edition_id' => $this->edition_id,
            'format_id' => $this->format_id,
            'paid' => $this->paid,
            'value' => $this->value,
            'sell' => $this->sell,
            'quantity' => $this->quantity,
            'signed' => $this->signed,
            'personalized' => $this->personalized,
            'date_published' => $this->date_published,
            'date_bought' => $this->date_bought,
            'date_created' => $this->date_created,
            'date_updated' => $this->date_updated,
        ]);

        $query->andFilterWhere(['like', 'printing', $this->printing])
            ->andFilterWhere(['like', 'number_line', $this->number_line]);

        return $dataProvider;
    }
}
