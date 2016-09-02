<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_ticket_logs".
 *
 * @property integer $id
 * @property integer $ticket_id
 * @property integer $user_id
 * @property integer $resource_id
 * @property string $timestamp
 * @property string $ip_address
 * @property string $user_agent
 */
class TicketLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_ticket_logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ticket_id', 'resource_id', 'timestamp', 'ip_address', 'user_agent'], 'required'],
            [['ticket_id', 'user_id', 'resource_id'], 'integer'],
            [['timestamp'], 'safe'],
            [['ip_address'], 'string', 'max' => 64],
            [['user_agent'], 'string', 'max' => 255],
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
            'resource_id' => 'Resource ID',
            'timestamp' => 'Timestamp',
            'ip_address' => 'Ip Address',
            'user_agent' => 'User Agent',
        ];
    }
}
