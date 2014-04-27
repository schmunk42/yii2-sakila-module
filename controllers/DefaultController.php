<?php

namespace schmunk42\sakila\controllers;

use yii\helpers\FileHelper;
use yii\helpers\Inflector;
use yii\web\Controller;

class DefaultController extends Controller
{
    public function actionIndex()
    {
        foreach (FileHelper::findFiles($this->module->getControllerPath()) as $file) {
            $id = lcfirst(substr(basename($file), 0, -14));
            $name = Inflector::camel2words($id);
            $route = ['/'.$this->module->id.'/'.Inflector::camel2id($name)];
            $controllers[$name] = $route;
        };
        return $this->render('index', ['controllers'=>$controllers]);
    }
}
