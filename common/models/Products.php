<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $name
 * @property bool|null $published
 * @property float $price
 * @property int $total
 * @property string $start_date
 * @property string $update_date
 * @property string $description
 * @property int $id_cat
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'total', 'start_date', 'update_date', 'description', 'id_cat'], 'required'],
            [['published'], 'boolean'],
            [['price'], 'number'],
            [['total', 'id_cat'], 'default', 'value' => null],
            [['total', 'id_cat'], 'integer'],
            [['start_date', 'update_date'], 'safe'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'published' => 'Published',
            'price' => 'Price',
            'total' => 'Total',
            'start_date' => 'Start Date',
            'update_date' => 'Update Date',
            'description' => 'Description',
            'id_cat' => 'Id Cat',
        ];
    }
}
