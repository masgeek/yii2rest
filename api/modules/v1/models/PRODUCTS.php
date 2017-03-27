<?php

namespace app\api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "fry_products".
 *
 * @property integer $productid
 * @property string $name
 * @property string $category
 * @property string $brand
 * @property string $sku
 * @property string $desc
 * @property string $price
 * @property string $buyitnow
 * @property string $cost_price
 * @property string $sale_price
 * @property string $retail_price
 * @property integer $allow_auction
 * @property integer $allow_purchase
 * @property integer $available
 * @property integer $visible
 * @property integer $track_inventory
 * @property integer $stock_level
 * @property integer $allow_bid_request
 * @property string $min_stock
 * @property string $weight
 * @property string $page_title
 * @property string $search_keywords
 * @property string $meta_keywords
 * @property string $meta_desc
 * @property string $condition
 * @property string $show_condition
 * @property string $upc
 * @property string $Attribute1
 * @property string $Attribute2
 * @property string $Attribute3
 * @property string $Attribute4
 * @property string $Attribute5
 * @property string $Attribute6
 * @property string $Attribute7
 * @property string $Attribute8
 * @property string $Attribute9
 * @property string $Attribute10
 * @property string $Attribute11
 * @property string $Attribute12
 * @property string $Attribute13
 * @property string $Attribute14
 * @property string $Attribute15
 * @property string $Attribute16
 * @property string $Attribute17
 * @property string $Attribute18
 * @property string $Attribute19
 * @property string $Attribute20
 * @property string $Attribute21
 * @property string $Attribute22
 * @property string $Attribute23
 * @property string $Attribute24
 * @property string $Attribute25
 * @property string $Attribute26
 * @property string $Attribute27
 * @property string $Attribute28
 * @property string $Attribute29
 * @property string $Attribute30
 * @property string $Attribute31
 * @property string $Attribute32
 * @property string $ebay_cat_id1
 * @property string $ebay_cat_id2
 * @property string $notes
 * @property string $stock_type
 * @property string $stock_location
 * @property string $image1
 * @property string $image2
 * @property string $image3
 * @property string $image4
 *
 * @property BidExclusion $bidExclusion
 * @property BidRequests $bidRequests
 * @property TbActiveBids $tbActiveBids
 * @property TbBidActivity[] $tbBidActivities
 * @property TbItemsCart[] $tbItemsCarts
 */
class PRODUCTS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'fry_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['allow_auction', 'allow_purchase', 'available', 'visible', 'track_inventory', 'stock_level', 'allow_bid_request'], 'integer'],
            [['name', 'category', 'brand', 'sku', 'desc', 'price', 'buyitnow', 'cost_price', 'sale_price', 'retail_price', 'min_stock', 'weight', 'page_title', 'search_keywords', 'meta_keywords', 'meta_desc', 'condition', 'upc', 'Attribute1', 'Attribute2', 'Attribute3', 'Attribute4', 'Attribute5', 'Attribute6', 'Attribute7', 'Attribute8', 'Attribute9', 'Attribute10', 'Attribute11', 'Attribute12', 'Attribute13', 'Attribute14', 'Attribute15', 'Attribute16', 'Attribute17', 'Attribute18', 'Attribute19', 'Attribute20', 'Attribute21', 'Attribute22', 'Attribute23', 'Attribute24', 'Attribute25', 'Attribute26', 'Attribute27', 'Attribute28', 'Attribute29', 'Attribute30', 'Attribute31', 'Attribute32', 'ebay_cat_id1', 'ebay_cat_id2', 'notes', 'stock_type', 'stock_location', 'image1', 'image2', 'image3', 'image4'], 'string', 'max' => 255],
            [['show_condition'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productid' => 'Productid',
            'name' => 'Name',
            'category' => 'Category',
            'brand' => 'Brand',
            'sku' => 'Sku',
            'desc' => 'Desc',
            'price' => 'Price',
            'buyitnow' => 'Buyitnow',
            'cost_price' => 'Cost Price',
            'sale_price' => 'Sale Price',
            'retail_price' => 'Retail Price',
            'allow_auction' => 'Allow Auction',
            'allow_purchase' => 'Allow Purchase',
            'available' => 'Available',
            'visible' => 'Visible',
            'track_inventory' => 'Track Inventory',
            'stock_level' => 'Stock Level',
            'allow_bid_request' => 'Allow Bid Request',
            'min_stock' => 'Min Stock',
            'weight' => 'Weight',
            'page_title' => 'Page Title',
            'search_keywords' => 'Search Keywords',
            'meta_keywords' => 'Meta Keywords',
            'meta_desc' => 'Meta Desc',
            'condition' => 'Condition',
            'show_condition' => 'Show Condition',
            'upc' => 'Upc',
            'Attribute1' => 'Attribute1',
            'Attribute2' => 'Attribute2',
            'Attribute3' => 'Attribute3',
            'Attribute4' => 'Attribute4',
            'Attribute5' => 'Attribute5',
            'Attribute6' => 'Attribute6',
            'Attribute7' => 'Attribute7',
            'Attribute8' => 'Attribute8',
            'Attribute9' => 'Attribute9',
            'Attribute10' => 'Attribute10',
            'Attribute11' => 'Attribute11',
            'Attribute12' => 'Attribute12',
            'Attribute13' => 'Attribute13',
            'Attribute14' => 'Attribute14',
            'Attribute15' => 'Attribute15',
            'Attribute16' => 'Attribute16',
            'Attribute17' => 'Attribute17',
            'Attribute18' => 'Attribute18',
            'Attribute19' => 'Attribute19',
            'Attribute20' => 'Attribute20',
            'Attribute21' => 'Attribute21',
            'Attribute22' => 'Attribute22',
            'Attribute23' => 'Attribute23',
            'Attribute24' => 'Attribute24',
            'Attribute25' => 'Attribute25',
            'Attribute26' => 'Attribute26',
            'Attribute27' => 'Attribute27',
            'Attribute28' => 'Attribute28',
            'Attribute29' => 'Attribute29',
            'Attribute30' => 'Attribute30',
            'Attribute31' => 'Attribute31',
            'Attribute32' => 'Attribute32',
            'ebay_cat_id1' => 'Ebay Cat Id1',
            'ebay_cat_id2' => 'Ebay Cat Id2',
            'notes' => 'Notes',
            'stock_type' => 'Stock Type',
            'stock_location' => 'Stock Location',
            'image1' => 'Image1',
            'image2' => 'Image2',
            'image3' => 'Image3',
            'image4' => 'Image4',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBidExclusion()
    {
        return $this->hasOne(BidExclusion::className(), ['PRODUCT_ID' => 'productid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBidRequests()
    {
        return $this->hasOne(BidRequests::className(), ['REQUESTED_PRODUCT_ID' => 'productid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbActiveBids()
    {
        return $this->hasOne(TbActiveBids::className(), ['PRODUCT_ID' => 'productid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbBidActivities()
    {
        return $this->hasMany(TbBidActivity::className(), ['PRODUCT_ID' => 'productid']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTbItemsCarts()
    {
        return $this->hasMany(TbItemsCart::className(), ['PRODUCT_ID' => 'productid']);
    }
}
