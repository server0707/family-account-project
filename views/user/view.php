<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Oila a\'zolari', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'fullName',
            'username',
//            'password_hash',
//            'auth_key',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

    <p class="text-center">
        <?php
            echo \yii\bootstrap4\Html::img($model->getImage()->getUrl(), ['class' => 'img-fluid']);
        ?>
    </p>

</div>
