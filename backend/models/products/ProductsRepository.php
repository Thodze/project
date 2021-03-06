<?php
namespace backend\models\products;

use common\models\Departments;
use common\models\Employees;
use common\models\Products;
use Yii;
use backend\components\Repository;
use backend\components\RepositoryInterface;
use common\models\Categories;
use yii\web\NotFoundHttpException;

class ProductsRepository extends Repository implements RepositoryInterface
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
        return Products::find()->orderBy(['id' => 'DESC'])->asArray()->all();
    }

    /**
     * @param $id
     * @return Products|null
     */
    public function findById($id)
    {
        return Products::findOne($id);
    }

    /**
     * @param $data
     * @return Products
     */
    public function create($data)
    {
        $model = new Products();
        if (Yii::$app->request->isPost) {
            $model->name = $data['name'];
            $model->published = $data['published'];
            $model->price = $data['price'];
            $model->total = $data['total'];
            $model->id_cat = $data['id_category'];
            $model->description = $data['description'];
            $model->start_date = $data['start_date'];
            $model->update_date = $data['update_date'];
            $model->save();
            return $model;
        }
        return $model;
    }

    /**
     * @param $id
     * @param $data
     * @return Products|null
     */
    public function update($id, $data)
    {
        $model = Products::findOne($id);
        if ($model && Yii::$app->request->isPost) {
            $model->name = $data['name'];
            $model->published = $data['published'];
            $model->price = $data['price'];
            $model->total = $data['total'];
            $model->id_cat = $data['id_category'];
            $model->description = $data['description'];
            $model->start_date = $data['start_date'];
            $model->update_date = $data['update_date'];
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
            ->delete('products', ['id' => $id])
            ->execute();
    }
}