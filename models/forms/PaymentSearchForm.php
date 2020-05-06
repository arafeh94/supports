<?php
/**
 * Created by PhpStorm.
 * User: Arafeh
 * Date: 5/16/2018
 * Time: 3:34 AM
 */

namespace app\models\forms;

use app\models\User;
use Yii;
use yii\base\Model;

class PaymentSearchForm extends Model
{

    public $firstName;
    public $lastName;
    public $fatherName;
    public $idNumber;


    public function rules()
    {
        return [
            [['firstName', 'lastName', 'fatherName', 'idNumber'], 'safe']
        ];
    }


}
