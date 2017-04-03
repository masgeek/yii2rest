<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 13:40
 */

namespace app\api\modules\v1\controllers;


use yii\rest\ActiveController;

/**
 * Class UserController
 * @package app\api\modules\v1\controllers
 */
class UserController extends ActiveController
{
    /**
     * @var string
     */
    public $modelClass = 'app\api\modules\v1\models\USERMODEL';
}