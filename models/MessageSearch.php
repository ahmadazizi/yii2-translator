<?php

namespace amdz\yii2Translator\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use amdz\yii2Translator\models\Message;

/**
 * MessageSearch represents the model behind the search form about `app\modules\translator\models\Message`.
 */
class MessageSearch extends Message
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['lang', 'category', 'key', 'value'], 'safe'],
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
        $query = Message::find();

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
        ]);

        $query->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'category', $this->category])
            ->andFilterWhere(['like', 'key', $this->key])
            ->andFilterWhere(['like', 'value', $this->value]);
        
       $query->andFilterWhere(['lang' => \Yii::$app->controller->module->defaultLanguage]);
       $query->orderBy(['id' => SORT_DESC]);
<<<<<<< HEAD
        
=======
>>>>>>> 774cac1ad91008f3f58e40dcea5cf93c569cdd05
        

        return $dataProvider;
    }
}
