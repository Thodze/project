<?php
namespace backend\models\products;

use Yii;
use backend\components\Service;
use yii\web\NotFoundHttpException;

class ProductsService extends Service
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
        return ProductsRepository::getInstance()->getLists();
    }
    /**
     * @param $id
     * @return \common\models\Products|null
     */
    public function findById($id)
    {
        return ProductsRepository::getInstance()->findById($id);
    }

    /**
     * @param $data
     * @return \common\models\Products
     */
    public function create($data)
    {
        try {
            return ProductsRepository::getInstance()->create($data);
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
        return ProductsRepository::getInstance()->update($id, $data);
    }

    /**
     * @param $id
     * @return int
     * @throws \yii\db\Exception
     */
    public function delete($id)
    {
        return ProductsRepository::getInstance()->delete($id);
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