<?php

namespace app\modules\core\models;

use Yii;

/**
 * This is the model class for table "core_themes".
 *
 * @property integer $id
 * @property integer $active
 * @property string $name
 * @property string $slug
 * @property string $image
 * @property string $description
 * @property string $date_created
 * @property string $version
 * @property string $timestamp
 */
class Theme extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'core_themes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['name', 'slug', 'description', 'date_created'], 'required'],
            [['description'], 'string'],
            [['date_created', 'timestamp'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['slug'], 'string', 'max' => 50],
            [['image'], 'string', 'max' => 128],
            [['version'], 'string', 'max' => 8],
            [['slug'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Active',
            'name' => 'Name',
            'slug' => 'Slug',
            'image' => 'Image',
            'description' => 'Description',
            'date_created' => 'Date Created',
            'version' => 'Version',
            'timestamp' => 'Timestamp',
        ];
    }
}
