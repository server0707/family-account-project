<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FamilyAccount */

$this->title = 'Tahrirlash: ';
$this->params['breadcrumbs'][] = ['label' => 'Oilaviy kirim chiqimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->fullName . ' => ' . array('Kirim', 'Chiqim')[$model->type], 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Tahrirlash';
?>
<div class="family-account-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
