<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:31
 */

namespace app\api\modules\v1\controllers;


use yii\rest\ActiveController;

class UploadController extends ActiveController
{
    public $modelClass = 'app\api\modules\v1\models\UPLOADSMODEL';
}