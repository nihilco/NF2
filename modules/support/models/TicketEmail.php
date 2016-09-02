<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_ticket_emails".
 *
 * @property integer $id
 * @property string $recipient_email
 * @property string $sender_name
 * @property string $sender_email
 * @property string $timestamp
 * @property string $subject
 * @property string $message
 */
class TicketEmail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_ticket_emails';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recipient_email', 'sender_name', 'sender_email', 'timestamp', 'subject', 'message'], 'required'],
            [['recipient_email', 'sender_name', 'sender_email', 'subject', 'message'], 'string'],
            [['timestamp'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'recipient_email' => 'Recipient Email',
            'sender_name' => 'Sender Name',
            'sender_email' => 'Sender Email',
            'timestamp' => 'Timestamp',
            'subject' => 'Subject',
            'message' => 'Message',
        ];
    }
}
