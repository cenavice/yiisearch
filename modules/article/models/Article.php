<?php

namespace app\modules\article\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $article_id
 * @property int $published
 * @property string $author
 * @property string $title
 * @property string $content
 * @property string $published_at
 */
class Article extends \yii\db\ActiveRecord
{
    public $publishedSearch;
    public $textSearch;
    public $startCreatedSearch;
    public $endCreatedSearch;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['published'], 'integer'],
            [['author', 'title', 'content'], 'required'],
            [['content'], 'string'],
            [['published_at'], 'safe'],
            [['author', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'Article ID',
            'published' => 'Published',
            'author' => 'Author',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
        ];
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            if (!$this->isNewRecord)
                $this->created_at = $this->created_at;
            
            return true;
        }
        return false;
    }
}
