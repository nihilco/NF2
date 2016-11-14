<?php

namespace app\modules\library\models;

use Yii;

/**
 * This is the model class for table "library_book_formats".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $date_created
 * @property string $date_update
 *
 * @property BookPrinting[] $bookPrintings
 */
class Format extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_formats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'date_created'], 'required'],
            [['description'], 'string'],
            [['date_created', 'date_update'], 'safe'],
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
            'date_update' => 'Date Update',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookPrintings()
    {
        return $this->hasMany(BookPrinting::className(), ['format_id' => 'id']);
    }
}
