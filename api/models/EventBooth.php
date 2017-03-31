<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "event_booth".
 *
 * @property integer $event_booth_id
 * @property integer $event_id
 * @property string $event_booth_name
 *
 * @property Event $event
 * @property ReservedBooth[] $reservedBooths
 */
class EventBooth extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event_booth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_id', 'event_booth_name'], 'required'],
            [['event_id'], 'integer'],
            [['event_booth_name'], 'string', 'max' => 50],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'event_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_booth_id' => 'Event Booth ID',
            'event_id' => 'Event ID',
            'event_booth_name' => 'Event Booth Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['event_id' => 'event_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservedBooths()
    {
        return $this->hasMany(ReservedBooth::className(), ['event_booth_id' => 'event_booth_id']);
    }
}
