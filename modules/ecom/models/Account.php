<?php

namespace app\modules\ecom\models;

use Yii;
use app\modules\ac\models\User;

/**
 * This is the model class for table "ecom_accounts".
 *
 * @property integer $id
 * @property integer $account_status_id
 * @property integer $user_id
 * @property string $stripe_account_id
 * @property string $secret_key
 * @property string $publishable_key
 * @property string $date_created
 * @property string $date_updated
 * @property string $timestamp
 *
 * @property User $user
 * @property AccountStatus $accountStatus
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ecom_accounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['account_status_id', 'user_id', 'stripe_account_id', 'secret_key', 'publishable_key', 'date_created'], 'required'],
            [['account_status_id', 'user_id'], 'integer'],
            [['date_created', 'date_updated', 'timestamp'], 'safe'],
            [['stripe_account_id', 'secret_key', 'publishable_key'], 'string', 'max' => 128],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['account_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => AccountStatus::className(), 'targetAttribute' => ['account_status_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'account_status_id' => 'Account Status ID',
            'user_id' => 'User ID',
            'stripe_account_id' => 'Stripe Account ID',
            'secret_key' => 'Secret Key',
            'publishable_key' => 'Publishable Key',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
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
    public function getAccountStatus()
    {
        return $this->hasOne(AccountStatus::className(), ['id' => 'account_status_id']);
    }
}
