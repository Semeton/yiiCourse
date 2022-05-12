<?php

namespace app\models;

use Yii;
use \yii\helpers\Html;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;

/**
 * This is the model class for table "notebook".
 *
 * @property int $id
 * @property string|null $topic
 * @property string|null $notes
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 */
class Notebook extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notebook';
    }

    
    public function behaviors()
    {

        return [
                    TimestampBehavior::class,
                [
                    'class' => BlameableBehavior::class,
                    'updatedByAttribute' => false
                ],   
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'created_by'], 'integer'],
            [['topic', 'notes'], 'required'],
            [['topic'], 'string', 'max' => 255],
            [['notes'], 'string', 'max' => 10000],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => NewUser::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'topic' => 'Topic',
            'notes' => 'Notes',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(NewUser::className(), ['id' => 'created_by']);
    }

    public function getEncodedBody()
    {
        return Html::encode($this->notes);
    }
}