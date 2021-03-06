<?php
namespace backend\models\orders;

use Yii;
use backend\components\Service;
use yii\web\NotFoundHttpException;

class OrdersService extends Service
{
    /**
     * @var $self
     */
    protected static $self;

    /**
     * @return \common\models\Products[]
     */
    public function getLists()
    {
        return OrdersRepository::getInstance()->getLists();
    }
    /**
     * @param $id
     * @return \common\models\Products|null
     */
    public function findById($id)
    {
        return OrdersRepository::getInstance()->findById($id);
    }

    /**
     * @param $data
     * @return \common\models\Products
     */
    public function create($data)
    {
        try {
            return OrdersRepository::getInstance()->create($data);
        } catch (\Exception $exception) {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @param $id
     * @param $data
     * @return \common\models\Products|null
     */
    public function update($id, $data)
    {
        return OrdersRepository::getInstance()->update($id, $data);
    }

    /**
     * @param $id
     * @return int
     * @throws \yii\db\Exception
     */
    public function delete($id)
    {
        return OrdersRepository::getInstance()->delete($id);
    }

    /**
     * @param $id
     * @return int|string
     */
    public function getCountProducts($id)
    {
        return EmployeesRepository::getInstance()->getCountProducts($id);
    }
}