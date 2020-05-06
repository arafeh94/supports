<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suplist".
 *
 * @property int $id
 * @property string $firstName
 * @property string $lastName
 * @property string $fatherName
 * @property int $idNumber
 * @property int $familyCount
 * @property string $phone
 * @property string $city
 * @property string $address
 * @property string $status
 * @property string $maritalStatus
 * @property string $motherName
 * @property string $fixNumber
 * @property string $idLoc
 * @property string $gender
 * @property bool $familyHead
 * @property string $familyHeadScLevel
 * @property string $workType
 * @property int $countLess5
 * @property int $countLess18
 * @property int $countMore64
 * @property int $countMore75
 * @property int $countSick
 * @property string $sickConditions
 * @property string $workValue
 * @property string $birth
 * @property string $idType
 * @property string $currency
 * @property string $governorate
 * @property string $idSejel
 *
 *
 *
 */
class Suplist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'suplist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'fatherName', 'phone', 'city', 'birth', 'address', 'maritalStatus', 'motherName', 'fixNumber', 'idLoc', 'gender', 'familyHeadScLevel', 'workType', 'sickConditions', 'idNumber', 'familyCount', 'countLess5', 'countLess18', 'countMore64', 'countMore75', 'countSick', 'idType', 'governorate', 'idSejel'], 'required', 'message' => 'هذه الخانة إجبارية'],
            [['firstName', 'lastName', 'fatherName', 'phone', 'city', 'address', 'status', 'maritalStatus', 'motherName', 'fixNumber', 'idLoc', 'gender', 'familyHeadScLevel', 'workType', 'sickConditions'], 'string'],
            [['idNumber', 'familyCount', 'countLess5', 'countLess18', 'countMore64', 'countMore75', 'countSick'], 'integer'],
            [['workValue', 'currency'], 'safe'],
            [['status'], 'default', 'value' => 'قيد التنفيذ'],
            [['familyHead'], 'boolean'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'fatherName' => 'Father Name',
            'idNumber' => 'Id Number',
            'familyCount' => 'Family Count',
            'phone' => 'Phone',
            'city' => 'City',
            'address' => 'Address',
            'status' => 'Status',
            'maritalStatus' => 'Marital Status',
            'motherName' => 'Mother Name',
            'fixNumber' => 'Fix Number',
            'idLoc' => 'Id Loc',
            'gender' => 'Gender',
            'familyHead' => 'Family Head',
            'familyHeadScLevel' => 'Family Head Sc Level',
            'workType' => 'Work Type',
            'countLess5' => 'Count Less5',
            'countLess18' => 'Count Less18',
            'countMore64' => 'Count More64',
            'countMore75' => 'Count More75',
            'countSick' => 'Count Sick',
            'sickConditions' => 'Sick Conditions',
        ];
    }

    public function getFullName()
    {
        return $this->firstName . ' ' . $this->fatherName . ' ' . $this->lastName;
    }
}
