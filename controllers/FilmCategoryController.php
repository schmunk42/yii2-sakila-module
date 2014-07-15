<?php

namespace schmunk42\sakila\controllers;

use schmunk42\sakila\models\FilmCategory;
use schmunk42\sakila\models\FilmCategorySearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Url;

/**
 * FilmCategoryController implements the CRUD actions for FilmCategory model.
 */
class FilmCategoryController extends Controller
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
	 * Lists all FilmCategory models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new FilmCategorySearch;
		$dataProvider = $searchModel->search($_GET);

        Url::remember();
		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single FilmCategory model.
	 * @param integer $film_id
	 * @param integer $category_id
	 * @return mixed
	 */
	public function actionView($film_id, $category_id)
	{
        Url::remember();
        return $this->render('view', [
			'model' => $this->findModel($film_id, $category_id),
		]);
	}

	/**
	 * Creates a new FilmCategory model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new FilmCategory;

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
	 * Updates an existing FilmCategory model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $film_id
	 * @param integer $category_id
	 * @return mixed
	 */
	public function actionUpdate($film_id, $category_id)
	{
		$model = $this->findModel($film_id, $category_id);

		if ($model->load($_POST) && $model->save()) {
            return $this->redirect(Url::previous());
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing FilmCategory model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $film_id
	 * @param integer $category_id
	 * @return mixed
	 */
	public function actionDelete($film_id, $category_id)
	{
		$this->findModel($film_id, $category_id)->delete();
		return $this->redirect(Url::previous());
	}

	/**
	 * Finds the FilmCategory model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $film_id
	 * @param integer $category_id
	 * @return FilmCategory the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($film_id, $category_id)
	{
		if (($model = FilmCategory::findOne(['film_id' => $film_id, 'category_id' => $category_id])) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
