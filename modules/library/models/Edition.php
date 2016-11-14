<?php

namespace app\modules\library\models;

use Yii;

/**
 * This is the model class for table "library_book_editions".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $date_created
 * @property string $date_updated
 *
 * @property BookPrinting[] $bookPrintings
 */
class Edition extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_editions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
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
            'name' => 'Name',
            'description' => 'Description',
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
        return $this->hasMany(BookPrinting::className(), ['edition_id' => 'id']);
    }
}
