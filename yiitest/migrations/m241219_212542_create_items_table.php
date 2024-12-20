<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%items}}`.
 */
class m241219_212542_create_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%items}}', [
            'id' => $this->primaryKey(),
            'serial_number' => $this->string(50)->notNull(), // Серийный номер
            'type' => $this->string(100)->notNull(),         // Тип объекта
            'date' => $this->date()->notNull(),              // Дата
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%items}}');
    }
}
