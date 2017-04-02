<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "vw_stand_summary".
 *
 * @property string $event_location City of the event
 * @property string $event_start_date
 * @property string $event_end_date
 * @property string $event_booth_name
 * @property string $booth_price
 * @property string $booth_image
 * @property string $description
 * @property string $full_names Full names
 * @property string $user_email Email address
 * @property string $company_name
 * @property string $company_admin
 * @property string $company_email
 * @property string $phone
 * @property string $address
 * @property string $logo_path
 * @property string $event_name
 */
class VwStandSummary extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vw_stand_summary';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['event_location', 'event_booth_name', 'booth_image', 'full_names', 'user_email', 'company_name', 'company_admin', 'company_email', 'phone', 'address', 'logo_path', 'event_name'], 'required'],
            [['event_start_date', 'event_end_date'], 'safe'],
            [['booth_price'], 'number'],
            [['description', 'address'], 'string'],
            [['event_location', 'event_booth_name', 'company_name', 'event_name'], 'string', 'max' => 50],
            [['booth_image', 'logo_path'], 'string', 'max' => 255],
            [['full_names', 'user_email', 'company_admin', 'company_email'], 'string', 'max' => 30],
            [['phone'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'event_location' => 'Event Location',
            'event_start_date' => 'Event Start Date',
            'event_end_date' => 'Event End Date',
            'event_booth_name' => 'Event Booth Name',
            'booth_price' => 'Booth Price',
            'booth_image' => 'Booth Image',
            'description' => 'Description',
            'full_names' => 'Full Names',
            'user_email' => 'User Email',
            'company_name' => 'Company Name',
            'company_admin' => 'Company Admin',
            'company_email' => 'Company Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'logo_path' => 'Logo Path',
            'event_name' => 'Event Name',
        ];
    }
}
