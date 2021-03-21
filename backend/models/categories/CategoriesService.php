<?php
namespace backend\models\categories;

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
     * @return \common\models\Categories[]
     */
    public function getLists()
    {
        return CategoriesRepository::getInstance()->getLists();
    }
    /**
     * @param $id
     * @return \common\models\Categories|null
     */
    public function findById($id)
    {
        return CategoriesRepository::getInstance()->findById($id);
    }

    /**
     * @param $data
     * @return \common\models\Categories
     */
    public function create($data)
    {
        try {
            return CategoriesRepository::getInstance()->create($data);
        } catch (\Exception $exception) {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @param $id
     * @param $data
     * @return \common\models\Categories|null
     */
    public function update($id, $data)
    {
        return CategoriesRepository::getInstance()->update($id, $data);
    }

    /**
     * @param $id
     * @return int
     * @throws \yii\db\Exception
     */
    public function delete($id)
    {
        return CategoriesRepository::getInstance()->delete($id);
    }

    /**
     * @param $id
     * @return int|string
     */
    public function getCountProducts($id)
    {
        return CategoriesRepository::getInstance()->getCountProducts($id);
    }
}