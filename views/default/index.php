<div class="sakila-default-index">
    <h1>Sakila
        <small>Giiant Demo CRUDs</small>
    </h1>
    <?php
    foreach ($controllers AS $name => $route) {
        echo "<li>" . \yii\helpers\Html::a($name, $route) . "</li>";
    }
    ?>
</div>

