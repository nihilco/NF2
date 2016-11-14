<?php

namespace app\modules\library\models;

use Yii;

/**
 * This is the model class for table "library_authors".
 *
 * @property integer $id
 * @property integer $image_id
 * @property string $prefix
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $suffix
 * @property string $description
 * @property string $website
 * @property string $date_created
 *
 * @property Image $image
 * @property BookAuthor[] $bookAuthors
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_authors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_id'], 'integer'],
            [['first_name', 'last_name'], 'required'],
            [['description'], 'string'],
            [['date_created'], 'safe'],
            [['prefix', 'suffix'], 'string', 'max' => 3],
            [['first_name', 'middle_name', 'last_name', 'website'], 'string', 'max' => 100],
            [['image_id'], 'exist', 'skipOnError' => true, 'targetClass' => Image::className(), 'targetAttribute' => ['image_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_id' => 'Image ID',
            'prefix' => 'Prefix',
            'first_name' => 'First Name',
            'middle_name' => 'Middle Name',
            'last_name' => 'Last Name',
            'suffix' => 'Suffix',
            'description' => 'Description',
            'website' => 'Website',
            'date_created' => 'Date Created',
            'timestamp' => 'Timestamp',
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->date_created = date("Y-m-d H:i:s");
            }
            return true;
        }
        return false;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::className(), ['id' => 'image_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookAuthors()
    {
        return $this->hasMany(BookAuthors::className(), ['author_id' => 'id']);
    }
}
