<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-8">
            <?= $form->field($model, 'fullName')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

            <?php
            echo $form->field($model, 'image')->widget(\kartik\file\FileInput::classname(['resizeImages' => true]), [
                'options' => ['accept' => 'image/*'],
            ]);
            ?>
        </div>
        <div class="col-4">
            <?= (!$model->isNewRecord) ? \yii\bootstrap4\Html::img($model->getImage()->getUrl(), ['class' => 'img-fluid']) : '' ?>
        </div>
    </div>

    <!--    --><? //= $form->field($model, 'password_hash')->textInput(['maxlength' => true]) ?>

    <!--    --><? //= $form->field($model, 'auth_key')->textInput(['maxlength' => true]) ?>

    <!--    --><? //= $form->field($model, 'created_at')->textInput() ?>

    <!--    --><? //= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
