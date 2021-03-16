<?php
namespace backend\models\employees;

use backend\components\Repository;
use backend\components\RepositoryInterface;

class EmployeesRepository extends Repository implements RepositoryInterface
{
    protected static $self;
}