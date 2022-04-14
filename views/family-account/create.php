<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FamilyAccount */

$this->title = 'Oilaviy kirim chiqim qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Oilaviy kirim chiqimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-account-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
