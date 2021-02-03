<?php

namespace app\modules\article\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\article\models\Article as ArticleModel;

/**
 * Article represents the model behind the search form of `app\modules\article\models\Article`.
 */
class Article extends ArticleModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['article_id', 'published', 'publishedSearch'], 'integer'],
            [['startCreatedSearch', 'endCreatedSearch'], 'date', 'format' => 'Y-m-d'],
            [['author', 'title', 'content', 'created_at', 'publishedSearch', 'textSearch', 'startCreatedSearch', 'endCreatedSearch'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = ArticleModel::find();

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
            'article_id' => $this->article_id,
            'published' => $this->published,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'content', $this->content]);
        
        // custom search
        $query->andFilterWhere([
            'published' => $this->publishedSearch == 1 ? 1 : '',
        ]);

        if (isset($this->startCreatedSearch) && $this->startCreatedSearch != '') {
            $query->andFilterWhere(['>=', 'created_at', $this->startCreatedSearch.' 00:00:00']);
        }

        if (isset($this->endCreatedSearch) && $this->endCreatedSearch != '') {
            $query->andFilterWhere(['<=', 'created_at', $this->endCreatedSearch.' 23:59:59']);
        }

        $query->andFilterWhere(['or',
            ['like', 'author', $this->textSearch],
            ['like', 'title', $this->textSearch],
            ['like', 'content', $this->textSearch]
        ]);

        return $dataProvider;
    }
}
