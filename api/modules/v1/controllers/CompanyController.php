<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:27
 */

namespace app\api\modules\v1\controllers;

use app\api\modules\v1\models\COMPANYMODEL;
use Yii;
use yii\rest\ActiveController;
use yii\web\UploadedFile;

/**
 * Class CompanyController
 * @package app\api\modules\v1\controllers
 */
class CompanyController extends ActiveController
{
    /**
     * @var string
     */
    public $modelClass = 'app\api\modules\v1\models\COMPANYMODEL';

    /**
     * Endpoint for uploading the company logo
     * @return array
     */
    public function actionLogo()
    {
        //upload the company logo
        $output = ['error' => 'No files were processed.'];
        $logo_folder = Yii::$app->request->post('logo_folder');


        $model = new COMPANYMODEL();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstancesByName('file'); //getInstances($model, 'file');

            $t = $model->uploadLogo($logo_folder);

            $output = ['file_path' => $t];
        }

        return $output; //return as array, it is encoded to json automatically
    }


}