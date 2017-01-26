<?php

namespace backend\models;

use Yii;

class  RegisterAdminOrganization extends \yii\db\ActiveRecord
{

    public $First_Name;
    public $Last_Name;
    public $E_mail;
    public $Date_Birth;
    public $Phone;
    public $Street_Address;
    public $City;
    public $Postal;
    public $Country;
    public $Documents;

    public static function tableName()
    {
        return 'register-admin-organization';
    }

    public function rules()
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'First_Name' => Yii::t('app', 'First Name'),
            'Last_Name' => Yii::t('app', 'Last Name'),
            'E_mail' => Yii::t('app', 'Email'),
            'Date_Birth' => Yii::t('app', 'Date of Birth'),
            'Phone' => Yii::t('app', 'Phone'),
            'Street_Address' => Yii::t('app', 'Street Address'),
            'City' => Yii::t('app', 'City'),
            'Postal' => Yii::t('app', 'Postal'),
            'Country' => Yii::t('app', 'Country'),
            'Documents' => Yii::t('app', 'Documents'),
        ];
    }
}
