<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property int $id
 * @property string|null $name
 * @property bool $gender
 * @property string $date_of_birth
 * @property string $address
 * @property string $phone
 * @property string $mail
 * @property int $id_department
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender', 'date_of_birth', 'address', 'phone', 'mail', 'id_department'], 'required'],
            [['gender'], 'boolean'],
            [['date_of_birth'], 'safe'],
            [['address'], 'string'],
            [['id_department'], 'default', 'value' => null],
            [['id_department'], 'integer'],
            [['name'], 'string', 'max' => 200],
            [['phone'], 'string', 'max' => 20],
            [['mail'], 'string', 'max' => 100],
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
            'gender' => 'Gender',
            'date_of_birth' => 'Date Of Birth',
            'address' => 'Address',
            'phone' => 'Phone',
            'mail' => 'Mail',
            'id_department' => 'Id Department',
        ];
    }
}
