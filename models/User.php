<?php

namespace app\models;

use app\components\rbac\RbacInterface;
use Yii;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class User extends ActiveRecord implements \yii\web\IdentityInterface, RbacInterface
{
    /**
     * @return User
     */
    public static function get()
    {
        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return Yii::$app->user->identity;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['id', 'safe'],
            [['username', 'password'], 'string'],
        ];
    }


    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return array|ActiveRecord
     */
    public static function findByUsername($username)
    {
        return self::find()->where(['username' => $username])->one();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return "";
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return true;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * @return int|string
     */
    function getRole()
    {
        return "admin";
    }
}
