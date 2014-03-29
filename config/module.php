<?php

// class-based config
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