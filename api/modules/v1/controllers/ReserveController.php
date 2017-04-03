<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:20
 */

namespace app\api\modules\v1\controllers;


use app\api\models\VwReserveSummary;
use yii\rest\ActiveController;

/**
 * Class ReserveController
 * @package app\api\modules\v1\controllers
 */
class ReserveController extends ActiveController
{
    /**
     * @var string
     */
    public $modelClass = 'app\api\modules\v1\models\RESERVEDMODEL';


    /**
     * @param $id company id
     * @return array|\yii\db\ActiveRecord[]
     */
    public function actionSummary($id)
    {
        $data = VwReserveSummary::find()
            ->where(['company_id' => $id])
            ->one();


        return $data;
    }
}