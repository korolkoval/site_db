<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%type_options}}`.
 */
class m241220_130624_create_type_options_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%type_options}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(), // Название типа
        ]);

        // Добавляем начальные варианты
        $this->batchInsert('{{%type_options}}', ['name'], [
            ['Оборудование'],
            ['Деталь'],
            ['Расходник'],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%type_options}}');
    }
}
