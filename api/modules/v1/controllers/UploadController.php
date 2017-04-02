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

class UploadController extends ActiveController
{
    public $modelClass = 'app\api\modules\v1\models\UPLOADSMODEL';

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