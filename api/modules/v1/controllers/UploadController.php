<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:31
 */

namespace app\api\modules\v1\controllers;

use Yii;
use app\api\modules\v1\models\UPLOADSMODEL;
use yii\rest\ActiveController;
use yii\web\UploadedFile;

/**
 * Class UploadController
 * @package app\api\modules\v1\controllers
 */
class UploadController extends ActiveController
{
    /**
     * @var string
     */
    public $modelClass = 'app\api\modules\v1\models\UPLOADSMODEL';

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

    /**
     * endpoint for uploading the marketing documents
     * @return array
     */
    public function actionDocument()
    {
        $output = []; //empty if successful
        $company_id = Yii::$app->request->post('company_id');


        $model = new UPLOADSMODEL();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstancesByName('file'); //getInstances($model, 'file');

            $model->uploadDocument($company_id);
            $model->save();
        } else {
            $output = ['error' => 'No files were processed.'];
        }
        // return a json encoded response for plugin to process successfully
        return $output;
    }
}