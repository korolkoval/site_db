<?php
use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m241108_152525_create_products
 */
class m241108_152525_create_products extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable("news", [
            'id' => Schema::TYPE_PK,
        ]);
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m241108_152525_create_products cannot be reverted.\n";
        $this->dropTable("news");
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241108_152525_create_products cannot be reverted.\n";

        return false;
    }
    */
}
