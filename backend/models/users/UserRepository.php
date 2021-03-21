<?php
namespace backend\models\users\user;

use backend\components\Repository;
use backend\components\RepositoryInterface;
use Yii;

class UserRepository extends Repository implements RepositoryInterface
{
    protected static $self;
}