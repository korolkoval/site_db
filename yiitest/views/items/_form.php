<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm; // Для создания форм
use yii\helpers\ArrayHelper;
use app\models\TypeOptions; // Подключаем модель TypeOptions

/** @var yii\web\View $this */
/** @var app\models\Items $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'serial_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(
        ArrayHelper::map(TypeOptions::find()->all(), 'id', 'name'), // Формируем массив для выпадающего списка id - name
        ['prompt' => 'Select Type'] // Опция "Выберите тип"
    ) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
        'active' => 'Active',
        'inactive' => 'Inactive',
    ], ['prompt' => 'Select Status']) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
