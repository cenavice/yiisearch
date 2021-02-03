<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%articles}}`.
 */
class m210203_130805_create_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%articles}}', [
            'article_id' => $this->primaryKey(),
            'published' => $this->tinyInteger()->defaultValue(0)->notNull(),
            'author' => $this->string()->notNull(),
            'title' => $this->string()->notNull(),
            'content' => $this->text()->notNull(),
            'published_at' => $this->timestamp()->notNull()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%articles}}');
    }
}
