<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $customer
 * @property float $quantity
 * @property string $buy_date
 * @property int $id_product
 * @property int $id_employee
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer', 'quantity', 'buy_date', 'id_product', 'id_employee'], 'required'],
            [['quantity'], 'number'],
            [['buy_date'], 'safe'],
            [['id_product', 'id_employee'], 'default', 'value' => null],
            [['id_product', 'id_employee'], 'integer'],
            [['customer'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer' => 'Customer',
            'quantity' => 'Quantity',
            'buy_date' => 'Buy Date',
            'id_product' => 'Id Product',
            'id_employee' => 'Id Employee',
        ];
    }
}
