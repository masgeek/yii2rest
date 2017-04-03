<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "vw_reserve_summary".
 *
 * @property int $company_id
 * @property int $reserved_booth_id
 * @property string $company_name
 * @property string $event_booth_name
 * @property string $event_name
 * @property bool $reserved
 * @property int $event_booth_id
 * @property int $event_id
 */
class VwReserveSummary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vw_reserve_summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'reserved_booth_id', 'event_booth_id', 'event_id'], 'integer'],
            [['company_name', 'event_booth_name', 'event_name'], 'required'],
            [['reserved'], 'boolean'],
            [['company_name', 'event_booth_name', 'event_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'reserved_booth_id' => 'Reserved Booth ID',
            'company_name' => 'Company Name',
            'event_booth_name' => 'Event Booth Name',
            'event_name' => 'Event Name',
            'reserved' => 'Reserved',
            'event_booth_id' => 'Event Booth ID',
            'event_id' => 'Event ID',
        ];
    }
}
