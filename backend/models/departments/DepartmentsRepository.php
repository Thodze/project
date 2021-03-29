<?php
namespace backend\models\departments;

use common\models\Departments;
use common\models\Products;
use Yii;
use backend\components\Repository;
use backend\components\RepositoryInterface;
use common\models\Categories;
use yii\web\NotFoundHttpException;

class DepartmentsRepository extends Repository implements RepositoryInterface
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
        return Departments::find()->orderBy(['id' => 'DESC'])->asArray()->all();
    }

    /**
     * @param $id
     * @return Categories|null
     */
    public function findById($id)
    {
        return Departments::findOne($id);
    }

    /**
     * @param $data
     * @return Categories
     */
    public function create($data)
    {
        $model = new Departments();
        if (Yii::$app->request->isPost) {
            $model->name = $data['name'];
            $model->save();
            return $model;
        }
        return $model;
    }

    /**
     * @param $id
     * @param $data
     * @return Categories|null
     */
    public function update($id, $data)
    {
        $model = Departments::findOne($id);
        if ($model && Yii::$app->request->isPost) {
            $model->name = $data['name'];
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
            ->delete('departments', ['id' => $id])
            ->execute();
    }
}