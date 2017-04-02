<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 4/2/2017
 * Time: 02:51
 */

namespace app\api\modules\v1\controllers;


use yii\rest\ActiveController;

class DayController extends ActiveController
{
    public $modelClass = 'app\api\modules\v1\models\RESERVEDMODEL';
}