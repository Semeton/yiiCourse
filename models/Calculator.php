<?php

namespace app\models;

use Yii;
use yii\base\Model;
use \yii\helpers\Html;

/**
 * Calculator is the model behind the contact form.
 */

class Calculator extends Model
{ 
    public $first_number;
    public $second_number;
    public $operator;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_number', 'second_number'], 'integer'],
            [['operator'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'first_number' => 'First Number',
            'second_number' => 'Second Number',
            'operator' => 'Operator',
        ];
    }

    public function getFirstNumber()
    {
        return $this->first_number;
    }

    public function getSecondNumber()
    {
        return $this->second_number;
    }

    public function getOperator()
    {
        return $this->operator;
    }

    // public function getEncodedBody()
    // {
    //     return Html::encode($this->body);
    // }
}