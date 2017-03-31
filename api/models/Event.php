<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "event".
 *
 * @property int $event_id
 * @property string $event_name
 * @property string $event_location City of the event
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
            [['event_name', 'event_location', 'event_lat', 'event_long'], 'required'],
            [['event_lat', 'event_long'], 'number'],
            [['event_name', 'event_location'], 'string', 'max' => 50],
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
            'event_location' => 'Event Location',
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
