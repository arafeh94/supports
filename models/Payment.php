<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int $supportId
 * @property string $type
 * @property double $value
 * @property string $donor
 * @property int $month
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['supportId', 'month', 'type', 'donor', 'value', 'payed'], 'required', 'message' => 'هذه الخانة إجبارية'],
            [['supportId', 'month'], 'integer'],
            [['type', 'donor'], 'string'],
            [['value', 'payed'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supportId' => 'Support ID',
            'type' => 'Type',
            'value' => 'Value',
            'donor' => 'Donor',
            'month' => 'Month',
        ];
    }
}
