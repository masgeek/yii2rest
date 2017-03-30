<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/25/2017
 * Time: 21:21
 */

namespace app\api\modules\v1\controllers;


use app\api\modules\v1\models\CITIZEN;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class CitizenController extends ActiveController
{
    public $modelClass = 'app\api\modules\v1\models\CITIZEN';

    public function actionCitizens()
    {
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $data =  new ActiveDataProvider([
            'query' => CITIZEN::find(),
        ]);

        return $data->count;
    }
}