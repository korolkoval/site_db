<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Items".
 *
 * @property int $id
 * @property string $serial_number
 * @property string $type
 * @property string $date
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['serial_number', 'type', 'date'], 'required'],
            [['date'], 'safe'],
            [['serial_number'], 'string', 'max' => 50],
            [['type'], 'string', 'max' => 100],
            [['status'], 'string', 'max' => 20], // Статус - строка длиной до 20 символов
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'serial_number' => 'Serial Number',
            'type' => 'Type',
            'date' => 'Date',
            'status' => 'Status', // Новое поле
        ];
    }
}
