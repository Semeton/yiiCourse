<?php


use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Note Book';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?php
        echo 'Welcome, '.Yii::$app->user->identity->username;
        ?></h1>
    <p>Here is your personalized online notebook/journal. Ensure you protect it jealously</p>
    <small><i>You can creat a new note by clicking the button below</i></small>

    <br>
    <br>
    <br>

    <?php if(!Yii::$app->user->isGuest): ?>

    <p>
        <?= Html::a('Create New Note', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php endif; ?>

    <hr>


    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'itemView'=> '_notebook_item'
        
    ]); ?>


</div>