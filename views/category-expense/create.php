<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryExpense */

$this->title = 'Kategoriya qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Kategoriyalar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-expense-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
