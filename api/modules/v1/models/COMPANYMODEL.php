<?php
/**
 * Created by PhpStorm.
 * User: KRONOS
 * Date: 3/31/2017
 * Time: 14:26
 */

namespace app\api\modules\v1\models;


use Yii;
use app\api\models\Company;
use app\api\models\User;

class COMPANYMODEL extends Company
{
    public $imageFiles;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'company_name', 'company_admin', 'email', 'phone', 'address', 'logo_path'], 'required'],
            [['user_id'], 'integer'],
            [['address'], 'string'],
            [['company_name'], 'string', 'max' => 50],
            [['company_admin', 'email'], 'string', 'max' => 30],
            [['phone'], 'string', 'max' => 25],
            [['logo_path'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'user_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'email' => 'Company Email',
        ];
    }

    /**
     * Define fields and objects to be returned in the API response
     * @return array
     */
    public function fields()
    {
        return [
            'company_id',
            'user_id',
            'company_name',
            'company_admin',
            'email',
            'phone',
            'address',
            'logo_path',
            'uploads' => function ($model) { //return tru if booth is reserved and false if not
                return $model->uploads;
            },
        ];
    }

    public function uploadLogo($logo_folder)
    {
        $uploadsFolder = Yii::$app->params['uploadsFolder'];
        $rel_folder = $uploadsFolder . $logo_folder . '/';
        $path = Yii::$app->basePath . $rel_folder;
        if (!file_exists($path)) {
            mkdir($path, 0777); //if directory does not exists create it with full permissions
        }


        foreach ($this->imageFiles as $file) {
            $file_base_name = $file->baseName;
            $file_name = uniqid('logo_') . '.' . $file->extension; //lets rename the file to prevent name clashes
            $relative_path = $rel_folder . $file_name;
            $save_path = $path . $file_name;

            $file->saveAs($save_path);

            return $relative_path;

        }
    }
}