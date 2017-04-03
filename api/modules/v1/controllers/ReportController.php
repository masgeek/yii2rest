<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 4/2/2017
 * Time: 10:52
 */

namespace app\api\modules\v1\controllers;


use yii\rest\ActiveController;

/**
 * Class ReportController
 * @package app\api\modules\v1\controllers
 */
class ReportController extends ActiveController
{
    /**
     * @var string
     */
    public $modelClass = 'app\api\models\VwStandSummary';
}