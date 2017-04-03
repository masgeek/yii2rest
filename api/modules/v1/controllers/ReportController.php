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

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // remove authentication filter
        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
        ];

        // re-add authentication filter
        $behaviors['authenticator'] = $auth;
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];

        return $behaviors;
    }
}