<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "reserved_booth".
 *
 * @property int $reserved_booth_id
 * @property int $event_booth_id
 * @property int $user_id
 * @property bool $reserved
 *
 * @property EventBooth $eventBooth
 * @property User $user
 */
class ReservedBooth extends EventBooth
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reserved_booth';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_booth_id', 'user_id'], 'required'],
            [['event_booth_id', 'user_id'], 'integer'],
            [['reserved'], 'boolean'],
            [['event_booth_id'], 'exist', 'skipOnError' => true, 'targetClass' => EventBooth::className(), 'targetAttribute' => ['event_booth_id' => 'event_booth_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'reserved_booth_id' => 'Reserved Booth ID',
            'event_booth_id' => 'Event Booth ID',
            'user_id' => 'User ID',
            'reserved' => 'Reserved',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventBooth()
    {
        return $this->hasOne(EventBooth::className(), ['event_booth_id' => 'event_booth_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['user_id' => 'user_id']);
    }
}
