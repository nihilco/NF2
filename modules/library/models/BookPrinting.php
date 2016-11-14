<?php

namespace app\modules\library\models;

use Yii;

/**
 * This is the model class for table "library_book_printings".
 *
 * @property integer $id
 * @property integer $book_id
 * @property integer $publisher_id
 * @property integer $edition_id
 * @property integer $format_id
 * @property string $printing
 * @property string $number_line
 * @property string $paid
 * @property string $price
 * @property string $value
 * @property string $sell
 * @property integer $quantity
 * @property integer $signed
 * @property integer $personalized
 * @property string $date_published
 * @property string $date_bought
 * @property string $date_created
 * @property string $date_updated
 *
 * @property Format $format
 * @property Book $book
 * @property Publisher $publisher
 * @property Edition $edition
 */
class BookPrinting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'library_book_printings';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'publisher_id', 'edition_id', 'format_id', 'printing', 'quantity', 'date_published'], 'required'],
            [['book_id', 'publisher_id', 'edition_id', 'format_id', 'quantity', 'signed', 'personalized'], 'integer'],
            [['paid', 'price', 'value', 'sell'], 'number'],
            [['date_published', 'date_bought', 'date_created', 'date_updated'], 'safe'],
            [['printing', 'number_line'], 'string', 'max' => 100],
            [['format_id'], 'exist', 'skipOnError' => true, 'targetClass' => Format::className(), 'targetAttribute' => ['format_id' => 'id']],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
            [['publisher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Publisher::className(), 'targetAttribute' => ['publisher_id' => 'id']],
            [['edition_id'], 'exist', 'skipOnError' => true, 'targetClass' => Edition::className(), 'targetAttribute' => ['edition_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'publisher_id' => 'Publisher ID',
            'edition_id' => 'Edition ID',
            'format_id' => 'Format ID',
            'printing' => 'Printing',
            'number_line' => 'Number Line',
            'paid' => 'Paid',
            'price' => 'Price',
            'value' => 'Value',
            'sell' => 'Sell',
            'quantity' => 'Quantity',
            'signed' => 'Signed',
            'personalized' => 'Personalized',
            'date_published' => 'Date Published',
            'date_bought' => 'Date Bought',
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
    public function getFormat()
    {
        return $this->hasOne(Format::className(), ['id' => 'format_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPublisher()
    {
        return $this->hasOne(Publisher::className(), ['id' => 'publisher_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEdition()
    {
        return $this->hasOne(Edition::className(), ['id' => 'edition_id']);
    }
}
