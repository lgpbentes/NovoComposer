<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ObjVideo;

/**
 * ObjvideoSearch represents the model behind the search form about `common\models\ObjVideo`.
 */
class ObjvideoSearch extends ObjVideo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'exerciciosResolvidos', 'duracao', 'avaliacao'], 'integer'],
            [['assunto', 'caminho', 'topicos', 'tipo', 'serie', 'referencias'], 'safe'],
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
        $query = ObjVideo::find();

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
            'exerciciosResolvidos' => $this->exerciciosResolvidos,
            'duracao' => $this->duracao,
            'avaliacao' => $this->avaliacao,
        ]);

        $query->andFilterWhere(['like', 'assunto', $this->assunto])
            ->andFilterWhere(['like', 'caminho', $this->caminho])
            ->andFilterWhere(['like', 'topicos', $this->topicos])
            ->andFilterWhere(['like', 'tipo', $this->tipo])
            ->andFilterWhere(['like', 'serie', $this->serie])
            ->andFilterWhere(['like', 'referencias', $this->referencias]);

        return $dataProvider;
    }
}
