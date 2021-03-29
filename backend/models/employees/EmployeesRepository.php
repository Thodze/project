<?php
namespace backend\models\employees;

use common\models\Departments;
use common\models\Employees;
use common\models\Products;
use Yii;
use backend\components\Repository;
use backend\components\RepositoryInterface;
use common\models\Categories;
use yii\web\NotFoundHttpException;

class EmployeesRepository extends Repository implements RepositoryInterface
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
        return Employees::find()->orderBy(['id' => 'DESC'])->asArray()->all();
    }

    /**
     * @param $id
     * @return Employees|null
     */
    public function findById($id)
    {
        return Employees::findOne($id);
    }

    /**
     * @param $data
     * @return Employees
     */
    public function create($data)
    {
        $model = new Employees();
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
     * @return Employees|null
     */
    public function update($id, $data)
    {
        $model = Employees::findOne($id);
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
            ->delete('employees', ['id' => $id])
            ->execute();
    }
}