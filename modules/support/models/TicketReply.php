<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_ticket_replies".
 *
 * @property integer $id
 * @property integer $ticket_id
 * @property integer $user_id
 * @property string $timestamp
 * @property string $message
 * @property string $rating
 */
class TicketReply extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_ticket_replies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id', 'user_id', 'timestamp', 'message', 'rating'], 'required'],
            [['ticket_id', 'user_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['message'], 'string'],
            [['rating'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ticket_id' => 'Ticket ID',
            'user_id' => 'User ID',
            'timestamp' => 'Timestamp',
            'message' => 'Message',
            'rating' => 'Rating',
        ];
    }
}
