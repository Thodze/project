<?php

namespace backend\controllers;

use backend\models\departments\DepartmentsService;
use Yii;
use common\models\Departments;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class DepartmentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * @param $categories
     * @return string
     */
    public function actionIndex()
    {
        $departments = DepartmentsService::getInstance()->getLists();
        return $this->render('index', [
            'departments' => $departments,
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $status = false;
        $json = array();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model = DepartmentsService::getInstance()->create($data);
            if ($model) {
                $status = true;
                $json = $model;
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
        }
        return [
            'status' => $status,
            'json' => $json
        ];
    }

    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $status = false;
        $json = array();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $model = DepartmentsService::getInstance()->update($id, $data);
            if ($model) {
                $status = true;
                $json = $model;
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
        }
        return [
            'status' => $status,
            'json' => $json
        ];
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $status = false;
        if (Yii::$app->request->isAjax) {
            $model = DepartmentsService::getInstance()->delete($id);
            if ($model) {
                $status = true;
            }
            Yii::$app->response->format = Response::FORMAT_JSON;
        }
        return [
            'status' => $status
        ];
    }
}
