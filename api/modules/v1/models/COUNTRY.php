<?php

namespace app\api\modules\v1\models;

use Yii;
use yii\filters\RateLimitInterface;

/**
 * This is the model class for table "country".
 *
 * @property string $code
 * @property string $name
 * @property integer $population
 *
 * @property CITIZEN[] $citizens
 */
class COUNTRY extends \yii\db\ActiveRecord implements RateLimitInterface
{
    public $rateLimit = 1;

    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'population'], 'required'],
            [['population'], 'integer'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 52],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Country Code',
            'name' => 'Country Name',
            'population' => 'Population',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCitizens()
    {
        return $this->hasMany(CITIZEN::className(), ['country_code' => 'code']);
    }


    /**
     * Filter out fields that should not be included in the data return
     * @return array
     */
    public function fields()
    {
        $fields = parent::fields();

        // remove fields that contain sensitive information
        //unset($fields['population']);

        return $fields;
    }

    public function extraFields()
    {
        return ['citizens'];
    }

    /**
     * Rate limiting functions
     */

    public function getRateLimit($request, $action)
    {
        return [$this->rateLimit, 10]; // $rateLimit requests per second
    }

    public function loadAllowance($request, $action)
    {
        return [$this->allowance, $this->allowance_updated_at];
    }

    public function saveAllowance($request, $action, $allowance, $timestamp)
    {
        $this->allowance = $allowance;
        $this->allowance_updated_at = $timestamp;
        $this->save();
    }
}