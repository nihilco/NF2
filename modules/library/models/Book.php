<?php

namespace app\modules\library\models;

use Yii;

/**
 * This is the model class for table "library_books".
 *
 * @property integer $id
 * @property integer $language_id
 * @property integer $series_id
 * @property string $isbn
 * @property string $title
 * @property string $subtitle
 * @property string $date_first_published
 * @property string $rating
 * @property integer $order_in_series
 * @property string $date_created
 * @property string $date_updated
 *
 * @property Author[] $authors
 * @property Image[] $images
 * @property Printing[] $printings
 * @property Language $language
 * @property Series $series
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'isbn', 'title', 'date_first_published'], 'required'],
            [['language_id', 'series_id', 'order_in_series'], 'integer'],
            [['date_first_published', 'date_created', 'date_updated'], 'safe'],
            [['rating'], 'number'],
            [['isbn'], 'string', 'max' => 13],
            [['title', 'subtitle'], 'string', 'max' => 100],
            [['isbn'], 'unique'],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Language::className(), 'targetAttribute' => ['language_id' => 'id']],
            [['series_id'], 'exist', 'skipOnError' => true, 'targetClass' => Series::className(), 'targetAttribute' => ['series_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'language_id' => 'Language ID',
            'series_id' => 'Series ID',
            'isbn' => 'Isbn',
            'title' => 'Title',
            'subtitle' => 'Subtitle',
            'date_first_published' => 'Date First Published',
            'rating' => 'Rating',
            'order_in_series' => 'Order In Series',
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
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrintings()
    {
        return $this->hasMany(Printing::className(), ['book_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLanguage()
    {
        return $this->hasOne(Language::className(), ['id' => 'language_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeries()
    {
        return $this->hasOne(Series::className(), ['id' => 'series_id']);
    }
}
