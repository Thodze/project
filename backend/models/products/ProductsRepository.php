<?php
namespace backend\models\products;

use backend\components\Repository;
use backend\components\RepositoryInterface;

class ProductsRepository extends Repository implements RepositoryInterface
{
    protected static $self;
}