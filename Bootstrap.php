<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace schmunk42\sakila;

use yii\base\BootstrapInterface;

/**
 * Bootstrap class registers module and user application component. It also creates some url rules which will be applied
 * when UrlManager.enablePrettyUrl is enabled.
 *
 * @author Dmitry Erofeev <dmeroff@gmail.com>
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        if ($app->hasModule('sakila')) {

        } else {
            $app->setModule(
                'sakila',
                [
                    'class' => 'schmunk42\sakila\Module'
                ]
            );
            if ($app instanceof \yii\console\Application) {
                $app->getModule('sakila')->controllerNamespace = 'schmunk42\sakila\commands';
            }

        }


        // provider class-based config
        \Yii::$container->set(
            'schmunk42\giiant\crud\providers\CallbackProvider',
            [
                'activeFields' => [
                    'last_update' => function () {
                            return false;
                        }
                ],
                'columnFormats' => [
                    'last_update' => function () {
                            return false;
                        }
                ],
            ]
        );
        \Yii::$container->set(
            'schmunk42\giiant\crud\providers\EditorProvider',
            [
                'columnNames' => ['description']
            ]
        );
        \Yii::$container->set(
            'schmunk42\giiant\crud\providers\SelectProvider',
            [
                'columnNames' => ['amount', 'rating']
            ]
        );
        \Yii::$container->set(
            'schmunk42\giiant\crud\providers\DateTimeProvider',
            [
                'columnNames' => ['last_update']
            ]
        );
        \Yii::$container->set(
            'schmunk42\giiant\crud\providers\RangeProvider',
            [
                'columnNames' => ['rental_duration']
            ]
        );
    }
}