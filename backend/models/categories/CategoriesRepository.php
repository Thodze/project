<?php
namespace backend\models\categories;

use common\models\Products;
use Yii;
use backend\components\Repository;
use backend\components\RepositoryInterface;
use common\models\Categories;
use yii\web\NotFoundHttpException;

class CategoriesRepository extends Repository implements RepositoryInterface
{
    /**
     * @var $self
     */
    protected static $self;

    /**
     * @return Categories[]
     */
    public function getLists()
    {
        return Categories::find()->orderBy(['id' => 'DESC'])->asArray()->all();
    }

    /**
     * @param $id
     * @return Categories|null
     */
    public function findById($id)
    {
        return Categories::findOne($id);
    }

    /**
     * @param $data
     * @return Categories
     */
    public function create($data)
    {
        $model = new Categories();
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
        $model = Categories::findOne($id);
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
            ->delete('categories', ['id' => $id])
            ->execute();
    }

    /**
     * @param $id
     * @return int|string
     */
    public function getCountProducts($id)
    {
        return Products::find()->where(['id_cat' => $id])->count();
    }
}