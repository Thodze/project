<?php


namespace backend\controllers;


use yii\web\Controller;

class OrdersController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [

        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}