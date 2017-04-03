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

/**
 * Class BoothController
 * @package app\api\modules\v1\controllers
 */
class BoothController extends ActiveController
{
    /**
     * @var string
     */
    public $modelClass = 'app\api\modules\v1\models\BOOTHMODEL';

    /**
     * Get all booths under a particular event
     * @param $id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function actionAll($id)
    {
        $data = BOOTHMODEL::find()
            ->where(['event_id' => $id])
            ->all();


        return $data;
    }
}