<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:27
 */

namespace app\api\modules\v1\controllers;


use yii\rest\ActiveController;

class CompanyController extends ActiveController
{
    public $modelClass = 'app\api\modules\v1\models\COMPANYMODEL';
}