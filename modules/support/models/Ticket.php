<?php

namespace app\modules\support\models;

use Yii;

/**
 * This is the model class for table "support_tickets".
 *
 * @property integer $id
 * @property string $ref_code
 * @property integer $parent_id
 * @property integer $type_id
 * @property integer $status_id
 * @property integer $priority_id
 * @property string $name
 * @property string $slug
 * @property integer $reporter_id
 * @property integer $assignee_id
 * @property string $date_reported
 * @property string $date_assigned
 * @property string $date_edited
 * @property string $date_estimated
 * @property string $date_resolved
 * @property string $time_estimated
 * @property string $time_actual
 * @property integer $resolution_id
 * @property string $message
 * @property string $details
 * @property string $timestamp
 */
class Ticket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_tickets';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ref_code', 'type_id', 'status_id', 'priority_id', 'name', 'slug', 'reporter_id', 'date_reported', 'time_estimated', 'resolution_id', 'message', 'details'], 'required'],
            [['parent_id', 'type_id', 'status_id', 'priority_id', 'reporter_id', 'assignee_id', 'resolution_id'], 'integer'],
            [['date_reported', 'date_assigned', 'date_edited', 'date_estimated', 'date_resolved', 'time_estimated', 'time_actual', 'timestamp'], 'safe'],
            [['details'], 'string'],
            [['ref_code'], 'string', 'max' => 32],
            [['name', 'slug'], 'string', 'max' => 100],
            [['message'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref_code' => 'Ref Code',
            'parent_id' => 'Parent ID',
            'type_id' => 'Type ID',
            'status_id' => 'Status ID',
            'priority_id' => 'Priority ID',
            'name' => 'Name',
            'slug' => 'Slug',
            'reporter_id' => 'Reporter ID',
            'assignee_id' => 'Assignee ID',
            'date_reported' => 'Date Reported',
            'date_assigned' => 'Date Assigned',
            'date_edited' => 'Date Edited',
            'date_estimated' => 'Date Estimated',
            'date_resolved' => 'Date Resolved',
            'time_estimated' => 'Time Estimated',
            'time_actual' => 'Time Actual',
            'resolution_id' => 'Resolution ID',
            'message' => 'Message',
            'details' => 'Details',
            'timestamp' => 'Timestamp',
        ];
    }
}
