<?php
namespace backend\models\employees;

use Yii;
use backend\components\Service;
use yii\web\NotFoundHttpException;

class EmployeesService extends Service
{
    /**
     * @var $self
     */
    protected static $self;

    /**
     * @return \common\models\Employees[]
     */
    public function getLists()
    {
        return EmployeesRepository::getInstance()->getLists();
    }
    /**
     * @param $id
     * @return \common\models\Employees|null
     */
    public function findById($id)
    {
        return EmployeesRepository::getInstance()->findById($id);
    }

    /**
     * @param $data
     * @return \common\models\Employees
     */
    public function create($data)
    {
        try {
            return EmployeesRepository::getInstance()->create($data);
        } catch (\Exception $exception) {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @param $id
     * @param $data
     * @return \common\models\Employees|null
     */
    public function update($id, $data)
    {
        return EmployeesRepository::getInstance()->update($id, $data);
    }

    /**
     * @param $id
     * @return int
     * @throws \yii\db\Exception
     */
    public function delete($id)
    {
        return EmployeesRepository::getInstance()->delete($id);
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