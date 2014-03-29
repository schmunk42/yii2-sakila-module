<?php

namespace schmunk42\sakila\controllers;

use schmunk42\sakila\models\FilmActor;
use schmunk42\sakila\models\FilmActorSearch;
use yii\web\Controller;
use yii\web\HttpException;
use yii\web\VerbFilter;

/**
 * FilmActorController implements the CRUD actions for FilmActor model.
 */
class FilmActorController extends Controller
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
		];
	}

	/**
	 * Lists all FilmActor models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new FilmActorSearch;
		$dataProvider = $searchModel->search($_GET);

		return $this->render('index', [
			'dataProvider' => $dataProvider,
			'searchModel' => $searchModel,
		]);
	}

	/**
	 * Displays a single FilmActor model.
	 * @param integer $actor_id
	 * @param integer $film_id
	 * @return mixed
	 */
	public function actionView($actor_id, $film_id)
	{
		return $this->render('view', [
			'model' => $this->findModel($actor_id, $film_id),
		]);
	}

	/**
	 * Creates a new FilmActor model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new FilmActor;

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['view', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing FilmActor model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $actor_id
	 * @param integer $film_id
	 * @return mixed
	 */
	public function actionUpdate($actor_id, $film_id)
	{
		$model = $this->findModel($actor_id, $film_id);

		if ($model->load($_POST) && $model->save()) {
			return $this->redirect(['view', 'actor_id' => $model->actor_id, 'film_id' => $model->film_id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing FilmActor model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $actor_id
	 * @param integer $film_id
	 * @return mixed
	 */
	public function actionDelete($actor_id, $film_id)
	{
		$this->findModel($actor_id, $film_id)->delete();
		return $this->redirect(['index']);
	}

	/**
	 * Finds the FilmActor model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $actor_id
	 * @param integer $film_id
	 * @return FilmActor the loaded model
	 * @throws HttpException if the model cannot be found
	 */
	protected function findModel($actor_id, $film_id)
	{
		if (($model = FilmActor::find(['actor_id' => $actor_id, 'film_id' => $film_id])) !== null) {
			return $model;
		} else {
			throw new HttpException(404, 'The requested page does not exist.');
		}
	}
}
