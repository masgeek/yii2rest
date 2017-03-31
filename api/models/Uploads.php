<?php

namespace app\api\models;

use Yii;

/**
 * This is the model class for table "uploads".
 *
 * @property integer $upload_id
 * @property integer $company_id
 * @property string $document_name
 * @property string $document_path
 *
 * @property Company $company
 */
class Uploads extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'uploads';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'document_name', 'document_path'], 'required'],
            [['company_id'], 'integer'],
            [['document_name'], 'string', 'max' => 30],
            [['document_path'], 'string', 'max' => 150],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Company::className(), 'targetAttribute' => ['company_id' => 'company_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'upload_id' => 'Upload ID',
            'company_id' => 'Company ID',
            'document_name' => 'Document Name',
            'document_path' => 'Document Path',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['company_id' => 'company_id']);
    }
}
