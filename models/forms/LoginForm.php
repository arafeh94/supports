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

class LoginForm extends Model
{
    private $_user;
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required', 'message' => 'هذه الخانة إجبارية'],
            [['username', 'password'], 'string', 'max' => 255],
            [['password'], 'validatePassword'],
        ];
    }

    public function load($data, $formName = null)
    {
        return parent::load($data, $formName);
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app', 'اسم المستخدم أو كلمة المرور غير صحيحة.'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), 3600 * 24 * 30);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }
        return $this->_user;
    }
}
