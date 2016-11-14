<?php

namespace app\modules\library\models;

use Yii;

/**
 * This is the model class for table "library_images".
 *
 * @property integer $id
 * @property integer $image_type_id
 * @property string $image
 * @property string $description
 * @property string $date_created
 * @property string $date_updated
 *
 * @property Author[] $author
 * @property BookImage[] $bookImages
 * @property ImageTypes $imageType
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_images';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['image_type_id', 'image', 'description', 'date_created'], 'required'],
            [['image_type_id'], 'integer'],
            [['description'], 'string'],
            [['date_created', 'date_updated'], 'safe'],
            [['image'], 'string', 'max' => 255],
            [['image_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImageType::className(), 'targetAttribute' => ['image_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'image_type_id' => 'Image Type ID',
            'image' => 'Image',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'date_updated' => 'Date Updated',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibraryAuthors()
    {
        return $this->hasMany(Author::className(), ['image_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLibraryBookImages()
    {
        return $this->hasMany(BookImage::className(), ['image_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImageType()
    {
        return $this->hasOne(ImageType::className(), ['id' => 'image_type_id']);
    }
}
