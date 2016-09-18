<?php

namespace app\modules\pa\models;

use Yii;
use app\modules\ac\models\User;

/**
 * This is the model class for table "pa_emails".
 *
 * @property integer $id
 * @property integer $email_type_id
 * @property integer $user_id
 * @property string $auth_key
 * @property string $subject
 * @property string $text
 * @property string $html
 * @property string $date_created
 * @property string $date_opened
 * @property string $date_last_viewed
 * @property integer $total_views
 * @property string $timestamp
 *
 * @property User $user
 * @property EmailType $emailType
 */
class Email extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pa_emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email_type_id', 'user_id', 'auth_key', 'subject', 'text', 'html', 'date_created'], 'required'],
            [['email_type_id', 'user_id', 'total_views'], 'integer'],
            [['text', 'html'], 'string'],
            [['date_created', 'date_opened', 'date_last_viewed', 'timestamp'], 'safe'],
            [['auth_key'], 'string', 'max' => 128],
            [['subject'], 'string', 'max' => 200],
            [['auth_key'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['email_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => EmailType::className(), 'targetAttribute' => ['email_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email_type_id' => 'Email Type ID',
            'user_id' => 'User ID',
            'auth_key' => 'Auth Key',
            'subject' => 'Subject',
            'text' => 'Text',
            'html' => 'Html',
            'date_created' => 'Date Created',
            'date_opened' => 'Date Opened',
            'date_last_viewed' => 'Date Last Viewed',
            'total_views' => 'Total Views',
            'timestamp' => 'Timestamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmailType()
    {
        return $this->hasOne(EmailType::className(), ['id' => 'email_type_id']);
    }
}
