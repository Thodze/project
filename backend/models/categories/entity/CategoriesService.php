<?php
namespace backend\models\categories\entity;

use Yii;
use backend\components\Service;
use yii\web\NotFoundHttpException;

class CategoriesService extends Service
{
    /**
     * @var $self
     */
    protected static $self;

    /**
     * @param $id
     * @return \backend\models\categories\Categories|null
     */
    public function findById($id)
    {
        return CategoriesRepository::getInstance()->findById($id);
    }

    /**
     * @param $data
     * @return \backend\models\categories\Categories
     */
    public function create($data)
    {
        return CategoriesRepository::getInstance()->create($data);
    }

    /**
     * @param $id
     * @param $data
     * @return \backend\models\categories\Categories|null
     */
    public function update($id, $data)
    {
        return CategoriesRepository::getInstance()->update($id, $data);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return CategoriesRepository::getInstance()->delete($id);
    }
}