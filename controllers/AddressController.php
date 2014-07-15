<?php

namespace schmunk42\sakila\controllers;

use schmunk42\sakila\models\Address;
use schmunk42\sakila\models\AddressSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * AddressController implements the CRUD actions for Address model.
 */
class AddressController extends Controller
{
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
            'access' => [
                'class' => AccessControl::className(),
                    'rules' => [
                    [
                        'actions' => [
                            'index',
                            'create',
                            'update',
                            'delete',
                            'view'
                        ],
                        'allow'   => true,
                        'roles'   => ['@'],
                    ],
                ],
            ]
		];
	}

	/**
	 * Lists all Address models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new AddressSearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single Address model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Address model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new Address;

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(Url::previous());
		} else {
            $model->load($_GET);
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing Address model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Address model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$this->findModel($id)->delete();
		return $this->redirect(Url::previous());
	}

	/**
	 * Finds the Address model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return Address the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = Address::findOne($id)) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
