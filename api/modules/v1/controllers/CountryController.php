<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/25/2017
 * Time: 20:22
 */

namespace app\api\modules\v1\controllers;


use app\api\modules\v1\models\COUNTRY;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;

class CountryController extends ActiveController
{
    public $modelClass = 'app\api\modules\v1\models\COUNTRY';

    /*public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['rateLimiter']['enableRateLimitHeaders'] = false;
        return $behaviors;
    }*/


    public function actionQuery()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data =  new ActiveDataProvider([
            'query' => COUNTRY::find(),
        ]);

        return $data->count;
    }
}