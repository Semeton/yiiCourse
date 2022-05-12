<?php

namespace app\controllers;

use Yii;
use app\models\Calculator;

class CalculatorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Calculator();
        return $this->render('index', ['model' => $model]);
    }

    /*
    * Calculate funtion
    */

    public function actionCalculate()
    {
        $model = new Calculator();

        $result = '';

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            
            switch($model->operator){
                case 'Add':
                    $result = $model->first_number + $model->second_number;
                    break;
                case 'Subtract':
                    $result = $model->first_number - $model->second_number;
                    break;
                case 'Divide':
                    $result = $model->first_number / $model->second_number;
                    break;
                case 'Multiply':
                    $result = $model->first_number * $model->second_number;
                    break;
                default:
                    $result = 'Error! Enter a valid operator';
            
            } 
            // $model->first_number = '';
            // $model->second_number = '';
            // $model->operator = '';
            return $this->render('calculate', [ 'model' => $model, 'result' => $result]);
        }
        return $this->render('calculate', [
            'model' => $model,
        ]);
    }

}