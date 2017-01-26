<?php

namespace backend\models;

use Yii;

class RegisterOrganization extends \yii\db\ActiveRecord
{

    public $Name;
    public $Registration_Number;
    public $Street;
    public $Address;
    public $Type;
    public $City;
    public $Postal;
    public $Country;
    public $Documents;

    public static function tableName()
    {
        return 'register-organization';
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
            'id' => Yii::t('app', 'ID'),
            'Name' => Yii::t('app', 'Name'),
            'Registration_Number' => Yii::t('app', 'Registration Number'),
            'Street' => Yii::t('app', 'Street'),
            'Address' => Yii::t('app', 'Address'),
            'Type' => Yii::t('app', 'Type'),
            'City' => Yii::t('app', 'City'),
            'Postal' => Yii::t('app', 'Postal'),
            'Country' => Yii::t('app', 'Country'),
            'Documents' => Yii::t('app', 'Documents'),
        ];
    }
}
