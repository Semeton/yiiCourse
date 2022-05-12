<?php
use \yii\helpers\Html;
use \yii\helpers\HtmlPurifier;
use \yii\helpers\StringHelper;
use \yii\helpers\Url;
/**@var $model \app\models\Article **/

// var_dump($model->createdBy->username);
// die;
?>


<div>
    <a href="<?=Url::to(['/notebook/view', 'id'=>$model->id]) ?>">
        <h3><?= Html::encode($model->topic) ?></h3>
    </a>

    <div>
        <span><?= StringHelper::truncateWords($model->getEncodedBody(), 60); ?></span>
        <span> <a href="<?=Url::to(['/notebook/view', 'id'=>$model->id]) ?>">
                <h6>Read More...</h6>
            </a> </span>
    </div>

    <p class="text-muted text-right ">
        <small>Created at: <b><?= Yii::$app->formatter->asRelativetime($model->created_at) ?></b>
            <br>
            By:<b><?= $model->createdBy->username; ?></b>

        </small>

    </p>

    <hr>

</div>