<?php

namespace app\modules\library\models;

use Yii;

/**
 * This is the model class for table "library_publishers".
 *
 * @property integer $id
 * @property string $name
 * @property string $parent
 * @property string $description
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $zipcode
 * @property string $country
 * @property string $website
 * @property string $date_created
 * @property string $date_updated
 *
 * @property Printing[] $printings
 */
class Publisher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_publishers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'address1', 'city', 'state', 'zipcode', 'country', 'website'], 'required'],
            [['description'], 'string'],
            [['parent', 'date_created', 'date_updated'], 'safe'],
            [['name', 'parent', 'website'], 'string', 'max' => 100],
            [['address1', 'address2', 'city'], 'string', 'max' => 150],
            [['state', 'country'], 'string', 'max' => 2],
            [['zipcode'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'country' => 'Country',
            'website' => 'Website',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->date_created = date("Y-m-d H:i:s");
            }
            $this->date_updated = date("Y-m-d H:i:s");
            return true;
        }
        return false;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookPrintings()
    {
        return $this->hasMany(BookPrinting::className(), ['publisher_id' => 'id']);
    }
}
