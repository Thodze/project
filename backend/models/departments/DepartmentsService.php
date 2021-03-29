<?php
namespace backend\models\departments;

use Yii;
use backend\components\Service;
use yii\web\NotFoundHttpException;

class DepartmentsService extends Service
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
        return DepartmentsRepository::getInstance()->getLists();
    }
    /**
     * @param $id
     * @return \common\models\Categories|null
     */
    public function findById($id)
    {
        return DepartmentsRepository::getInstance()->findById($id);
    }

    /**
     * @param $data
     * @return \common\models\Categories
     */
    public function create($data)
    {
        try {
            return DepartmentsRepository::getInstance()->create($data);
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
        return DepartmentsRepository::getInstance()->update($id, $data);
    }

    /**
     * @param $id
     * @return int
     * @throws \yii\db\Exception
     */
    public function delete($id)
    {
        return DepartmentsRepository::getInstance()->delete($id);
    }

    /**
     * @param $id
     * @return int|string
     */
    public function getCountProducts($id)
    {
        return DepartmentsRepository::getInstance()->getCountProducts($id);
    }
}