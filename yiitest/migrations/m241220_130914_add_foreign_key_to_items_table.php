<?php

use yii\db\Migration;

/**
 * Class m241220_130914_add_foreign_key_to_items_table
 */
class m241220_130914_add_foreign_key_to_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Изменяем колонку type, чтобы она стала внешним ключом
        $this->alterColumn('{{%items}}', 'type', $this->integer()->notNull());

        // Добавляем внешний ключ
        $this->addForeignKey(
            'fk-items-type',      // Название внешнего ключа (удобно для чтения и отладки)
            '{{%items}}',         // Таблица, в которой создаётся внешний ключ
            'type',               // Поле, которое будет внешним ключом
            '{{%type_options}}',  // Таблица, на которую будет ссылаться внешний ключ
            'id',                 // Поле, на которое ссылается внешний ключ
            'CASCADE'             // Действие при удалении/обновлении связанных записей
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // Удаляем внешний ключ
        $this->dropForeignKey('fk-items-type', '{{%items}}');

        // Возвращаем поле в исходное состояние
        $this->alterColumn('{{%items}}', 'type', $this->string(100)->notNull());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m241220_130914_add_foreign_key_to_items_table cannot be reverted.\n";

        return false;
    }
    */
}
