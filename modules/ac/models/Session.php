<?php

namespace app\modules\ac\models;

use Yii;

/**
 * This is the model class for table "ac_sessions".
 *
 * @property string $id
 * @property integer $user_id
 * @property integer $start
 * @property integer $last_action
 * @property integer $expire
 * @property resource $data
 * @property string $ip_address
 * @property string $user_agent
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ac_sessions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'expire', 'data', 'ip_address', 'user_agent'], 'required'],
            [['user_id', 'start', 'last_action', 'expire'], 'integer'],
            [['data'], 'string'],
            [['id'], 'string', 'max' => 40],
            [['ip_address'], 'string', 'max' => 64],
            [['user_agent'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'start' => 'Start',
            'last_action' => 'Last Action',
            'expire' => 'Expire',
            'data' => 'Data',
            'ip_address' => 'IP Address',
            'user_agent' => 'User Agent',
        ];
    }
}
