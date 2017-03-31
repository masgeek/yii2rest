<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:11
 */

namespace app\api\modules\v1\controllers;


use app\api\modules\v1\models\BOOTHMODEL;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class BoothController extends ActiveController
{
    public $modelClass = 'app\api\modules\v1\models\BOOTHMODEL';

    public function actionAll($id)
    {
        //\Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        /*   $data = new ActiveDataProvider([
               'query' => BOOTHMODEL::find(),
           ]);*/


        //$data = BOOTHMODEL::findOne($id);
        $data = BOOTHMODEL::find()
            ->where(['event_id' => $id])
            ->all();//::findAll(['event_id' => $id]);


        return $data;
    }
}