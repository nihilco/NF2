<?php

namespace app\modules\ecom\models;

use Yii;

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
 */
class Account extends \yii\db\ActiveRecord
{
    private $_key = 'rSJDZ5esCu8QAVykp5LpKyw8QNsW8oI0rjr0DLRFynhi5gGlvqOnlhS5vsMQlB9u';

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
            [['account_status_id', 'user_id', 'stripe_account_id', 'secret_key', 'publishable_key'], 'required'],
            [['account_status_id', 'user_id'], 'integer'],
            [['date_created', 'date_updated', 'timestamp'], 'safe'],
            [['stripe_account_id', 'secret_key', 'publishable_key'], 'string', 'max' => 128],
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
            'stripe_account_id' => 'Stripe Account ID',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
            'timestamp' => 'Timestamp',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                //$this->encryptKey();
                $this->date_created = date("Y-m-d H:i:s");
            }
            return true;
        }
        return false;
    }

    public function encryptKey()
    {
        $this->secret_key = utf8_encode(\Yii::$app->security->encryptByKey($this->secret_key, $this->_key));
    }

        public function decryptKey()
    {
        $this->secret_key = \Yii::$app->security->encryptByKey(utf8_decode($this->secret_key), $this->_key);
    }
}
