<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Simple Calculator';
?>

<div class="container">
    <div class="row">
        <div class="col-lg-5">

            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'first_number')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'second_number')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'operator')->dropdownList([
        'Add' => 'Add', 
        'Subtract' => 'Subtract',
        'Divide' => 'Divide',
        'Multiply' => 'Multiply'
    ],
    ['prompt'=>'Select Operator']
    );
    ?>


            <div class="form-group">
                <?= Html::submitButton('Calculate', ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>

    <div>
        <?php 
          if(Yii::$app->request->post()){
            echo '<h2><small>Your answer: </small>'. $result . '</h2>';
          }
       ?>
    </div>
</div>