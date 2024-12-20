<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Модель для таблицы `type_options`.
 */
class TypeOptions extends ActiveRecord
{
    /**
     * Указывает имя таблицы, с которой связана эта модель.
     *
     * @return string
     */
    public static function tableName()
    {
        return 'type_options'; // Имя таблицы в базе данных
    }
}
