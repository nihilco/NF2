<?php

namespace app\modules\tatetownship\models;

use Yii;
use app\modules\ac\models\User;
/**
 * This is the model class for table "tate_news".
 *
 * @property integer $id
 * @property integer $author_id
 * @property string $message
 * @property string $date_created
 * @property string $timestamp
 *
 * @property User $author
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tate_news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['author_id', 'message', 'date_created'], 'required'],
            [['author_id'], 'integer'],
            [['message'], 'string'],
            [['date_created', 'timestamp'], 'safe'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'message' => 'Message',
            'date_created' => 'Date Created',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }
}
