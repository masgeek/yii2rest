<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $event_id
 * @property string $event_name
 * @property string $event_country
 * @property string $event_location City of the event
 * @property string $event_start_date
 * @property string $event_end_date
 * @property double $event_lat Map lattitude
 * @property double $event_long Map longitude
 *
 * @property EventBooth[] $eventBooths
 */
class Event extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_name', 'event_country', 'event_location', 'event_start_date', 'event_end_date', 'event_lat', 'event_long'], 'required'],
            [['event_start_date', 'event_end_date'], 'safe'],
            [['event_lat', 'event_long'], 'number'],
            [['event_name', 'event_country', 'event_location'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'event_name' => 'Event Name',
            'event_country' => 'Event Country',
            'event_location' => 'Event Location',
            'event_start_date' => 'Event Start Date',
            'event_end_date' => 'Event End Date',
            'event_lat' => 'Event Lat',
            'event_long' => 'Event Long',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventBooths()
    {
        return $this->hasMany(EventBooth::className(), ['event_id' => 'event_id']);
    }
}
