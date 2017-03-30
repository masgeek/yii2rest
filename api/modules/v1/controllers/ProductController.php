<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/25/2017
 * Time: 21:21
 */

namespace app\api\modules\v1\controllers;


use app\api\modules\v1\models\CITIZEN;
use app\api\modules\v1\models\PRODUCTS;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $modelClass = 'app\api\modules\v1\models\PRODUCTS';

    public function actionProducts()
    {
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data =  new ActiveDataProvider([
            'query' => PRODUCTS::find(),
        ]);

        return $data->count;
    }
}