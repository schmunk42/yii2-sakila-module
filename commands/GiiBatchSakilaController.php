<?php

namespace schmunk42\sakila\commands;

use schmunk42\giiant\crud\providers\CallbackProvider;
use schmunk42\giiant\crud\providers\DateTimeProvider;
use schmunk42\giiant\crud\providers\EditorProvider;
use schmunk42\giiant\crud\providers\RangeProvider;
use schmunk42\giiant\crud\providers\RelationProvider;
use schmunk42\giiant\crud\providers\SelectProvider;
use yii\console\Controller;
use yii\helpers\Inflector;

/**
 * @author Tobias Munk <schmunk@usrbin.de>
 */
class GiiBatchSakilaController extends Controller
{

    public $generate = false;

    /**
     * @inheritdoc
     */
    public function options($id)
    {
        return array_merge(
            parent::options($id),
            ['generate']
        );
    }

    /**
     * This command echoes what you have entered as the message.
     *
     * @param string $message the message to be echoed.
     */
    public function actionIndex()
    {
        echo "Running batch...\n";

        \Yii::setAlias('schmunk42/sakila', '@vendor/schmunk42/yii2-sakila-module');

        $baseNamespace = 'schmunk42\\sakila\\';

        $tables = [
            'actor',
            'address',
            'category',
            'city',
            'country',
            'film_actor',
            'film',
            'customer',
            'staff',
            'store',
            'film_category',
            'language',
            'inventory',
            'payment',
            'rental'
        ];

        // works nice with IDE autocompleteion
        $providers = [
            CallbackProvider::className(),
            EditorProvider::className(),
            SelectProvider::className(),
            DateTimeProvider::className(),
            RangeProvider::className(),
            RelationProvider::className()
        ];

        foreach ($tables AS $table) {
            $params = [
                'generate'   => $this->generate,
                'template'   => 'default',
                'ns'         => 'schmunk42\\sakila\\models',
                'tableName'  => $table,
                'modelClass' => Inflector::camelize($table),
            ];
            $route  = 'giic/giiant-model';
            \Yii::$app->runAction(ltrim($route, '/'), $params);
        }

        foreach ($tables AS $table) {
            $params = [
                'generate'         => $this->generate,
                'template'         => 'default',
                'moduleID'         => 'sakila',
                'modelClass'       => $baseNamespace . 'models\\' . Inflector::camelize($table),
                'searchModelClass' => $baseNamespace . 'models\\' . Inflector::camelize($table) . 'Search',
                'controllerClass'  => $baseNamespace . 'controllers\\' . Inflector::camelize($table) . 'Controller',
                'providerList'     => implode(',', $providers),
                #'pathPrefix'       => 'sakila/',
            ];
            $route  = 'giic/giiant-crud';
            \Yii::$app->runAction(ltrim($route, '/'), $params);
        }
    }
}
