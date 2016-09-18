<?php

namespace app\modules\ac\models;

use Yii;

/**
 * This is the model class for table "ac_users".
 *
 * @property integer $id
 * @property string $stripe_customer_id
 * @property string $email
 * @property string $password
 * @property string $nickname
 * @property string $date_registered
 * @property string $date_updated
 * @property string $date_last_login
 * @property integer $login_attempts
 * @property string $auth_key
 * @property string $timestamp
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ac_users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stripe_customer_id', 'email', 'password', 'nickname'], 'required'],
            [['date_registered', 'date_updated', 'date_last_login', 'timestamp'], 'safe'],
            [['login_attempts'], 'integer'],
            [['stripe_customer_id'], 'string', 'max' => 64],
            [['nickname'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 150],
            [['password'], 'string', 'max' => 256],
            [['auth_key'], 'string', 'max' => 32],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'stripe_customer_id' => 'Stripe Customer ID',
            'email' => 'Email',
            'password' => 'Password',
            'nickname' => 'Nickname',
            'date_registered' => 'Date Registered',
            'date_updated' => 'Date Updated',
            'date_last_login' => 'Date Last Login',
            'login_attempts' => 'Login Attempts',
            'auth_key' => 'Auth Key',
            'timestamp' => 'Timestamp',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->generateAuthKey();
                $this->date_registered = date("Y-m-d H:i:s");
            }
            return true;
        }
        return false;
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = \Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = \Yii::$app->security->generateRandomString();
    }

    /**
     * Finds user by email
     *
     * @param string $email
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public function logLogin()
    {
        $this->login_attempts = 0;
        $this->date_last_login = date("Y-m-d H:i:s");

        if(!$this->save()) {
            throw new Exception("Failed to update login attempts.");  
        } 
    }

    public function logAttempt()
    {
        $la = $this->login_attempts;
        $this->login_attempts = $la + 1;
        if(!$this->save()) {
            throw new Exception("Failed to update login attempts.");
        }
    }
}
