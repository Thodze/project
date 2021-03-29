<?php
namespace backend\models\orders;

use common\models\Departments;
use common\models\Employees;
use common\models\Orders;
use Yii;
use backend\components\Repository;
use backend\components\RepositoryInterface;
use common\models\Categories;
use yii\web\NotFoundHttpException;

class OrdersRepository extends Repository implements RepositoryInterface
{
    /**
     * @var $self
     */
    protected static $self;

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function getLists()
    {
        return Orders::find()->orderBy(['id' => 'DESC'])->asArray()->all();
    }

    /**
     * @param $id
     * @return Orders|null
     */
    public function findById($id)
    {
        return Orders::findOne($id);
    }

    /**
     * @param $data
     * @return Orders
     */
    public function create($data)
    {
        $model = new Orders();
        if (Yii::$app->request->isPost) {
            $model->name = $data['name'];
            $model->gender = $data['gender'];
            $model->date_of_birth = $data['date_of_birth'];
            $model->address = $data['address'];
            $model->phone = $data['phone'];
            $model->mail = $data['mail'];
            $model->id_department = $data['id_department'];
            $model->save();
            return $model;
        }
        return $model;
    }

    /**
     * @param $id
     * @param $data
     * @return Orders|null
     */
    public function update($id, $data)
    {
        $model = Orders::findOne($id);
        if ($model && Yii::$app->request->isPost) {
            $model->name = $data['name'];
            $model->gender = $data['gender'];
            $model->date_of_birth = $data['date_of_birth'];
            $model->address = $data['address'];
            $model->phone = $data['phone'];
            $model->mail = $data['mail'];
            $model->id_department = $data['id_department'];
            $model->save();
            return $model;
        }
        return $model;
    }

    /**
     * @param $id
     * @return int
     * @throws \yii\db\Exception
     */
    public function delete($id)
    {
        return Yii::$app
            ->db
            ->createCommand()
            ->delete('orders', ['id' => $id])
            ->execute();
    }
}