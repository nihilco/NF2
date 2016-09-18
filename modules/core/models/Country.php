<?php

namespace app\modules\core\models;

use Yii;

/**
 * This is the model class for table "core_countries".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $date_created
 * @property string $timestamp
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_countries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'date_created'], 'required'],
            [['date_created', 'timestamp'], 'safe'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Name',
            'date_created' => 'Date Created',
            'timestamp' => 'Timestamp',
        ];
    }
}
