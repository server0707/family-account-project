<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FamilyAccount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="family-account-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-4">
            <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\User::find()->all(), 'id', 'fullName'), ['prompt' => '']) ?>
            <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\CategoryExpense::find()->all(), 'id', 'name'), ['prompt' => '']) ?>
            <?= $form->field($model, 'date')->input('date') ?>
            <div class="row">
                <div class="col-6">
                    <?= $form->field($model, 'quantity')->input('number') ?>
                </div>
                <div class="col-6">
                    <?= $form->field($model, 'currency')->dropDownList(['UZS', 'USD']) ?>
                </div>
            </div>
            <?= $form->field($model, 'type')->dropDownList(['Kirim', 'Chiqim']) ?>
            <div class="form-group">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="col-8">
            <?= $form->field($model, 'comment')->widget(\dosamigos\tinymce\TinyMce::className()) ?>
        </div>
    </div>
    <!--    --><? //= $form->field($model, 'created_at')->textInput() ?>
    <!---->
    <!--    --><? //= $form->field($model, 'updated_at')->textInput() ?>


    <?php ActiveForm::end(); ?>

</div>
