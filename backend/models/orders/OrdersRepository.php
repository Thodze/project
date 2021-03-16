<?php
namespace backend\models\orders;

use backend\components\Repository;
use backend\components\RepositoryInterface;

class OrdersRepository extends Repository implements RepositoryInterface
{
    protected static $self;
}