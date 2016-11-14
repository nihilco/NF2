<?php

namespace app\modules\library\models;

use Yii;

/**
 * This is the model class for table "library_languages".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property string $date_created
 * @property string $date_updated
 *
 * @property Book[] $books
 */
class Language extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'description', 'date_created'], 'required'],
            [['description'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
            [['code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 100],
            [['code'], 'unique'],
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
            'description' => 'Description',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['language_id' => 'id']);
    }
}
