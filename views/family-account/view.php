<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FamilyAccount */

$this->title = array('Kirim', 'Chiqim')[$model->type];
$this->params['breadcrumbs'][] = ['label' => 'Oilaviy kirim chiqimlar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="family-account-view">

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
            [
                'attribute' => 'type',
                'value' => array('Kirim', 'Chiqim')[$model->type]
            ],
            [
                'attribute' => 'user_id',
                'label' => 'Oila a\'zosi',
                'value' => $model->user->fullName
            ],
            [
                'attribute' => 'quantity',
                'value' => $model->getQuantum()
            ],
            [
                'attribute' => 'category_id',
                'label' => 'Categoriya nomi',
                'value' => $model->category->name,
            ],
            'date',
            'comment:raw',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]) ?>

</div>
