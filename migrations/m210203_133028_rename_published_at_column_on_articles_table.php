<?php

use yii\db\Migration;

/**
 * Class m210203_133028_rename_published_at_column_on_articles_table
 */
class m210203_133028_rename_published_at_column_on_articles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('articles', 'published_at', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210203_133028_rename_published_at_column_on_articles_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210203_133028_rename_published_at_column_on_articles_table cannot be reverted.\n";

        return false;
    }
    */
}
