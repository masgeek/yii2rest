<?php

namespace app\api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property string $product_name
 * @property string $country
 * @property string $warehouse
 * @property string $date_added
 * @property string $date_modified
 */
class PRODUCTS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     **/
    public function rules()
    {
        return [
            [['product_name', 'country', 'warehouse', 'date_added'], 'required'],
            [['date_added', 'date_modified'], 'safe'],
            [['product_name', 'country', 'warehouse'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'country' => 'Country',
            'warehouse' => 'Warehouse',
            'date_added' => 'Date Added',
            'date_modified' => 'Date Modified',
        ];
    }
}
