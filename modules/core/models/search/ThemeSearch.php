<?php

namespace app\modules\core\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\core\models\Theme;

/**
 * ThemeSearch represents the model behind the search form about `app\modules\core\models\Theme`.
 */
class ThemeSearch extends Theme
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['name', 'slug', 'image', 'description', 'date_created', 'version', 'timestamp'], 'safe'],
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
        $query = Theme::find();

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
            'active' => $this->active,
            'date_created' => $this->date_created,
            'timestamp' => $this->timestamp,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'version', $this->version]);

        return $dataProvider;
    }
}
