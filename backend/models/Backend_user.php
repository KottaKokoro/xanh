<?php

namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "backend_user".
 *
 * @property int $id
 * @property string $nama
 * @property string $username
 * @property string $password
 */
class Backend_user extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'backend_user';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'username', 'password'], 'required'],
            [['nama', 'username', 'password'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
    public static function findIdentity($id)
    {
        // TODO: Implement findIdentity() method.
        return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
        $result = static::findOne(['accessToken'=>$token]);
        return new static($result);
    }
    public static function findByUsername($username){
        $result = self::find()->where(['username'=>$username])->one();
        return new static($result);
    }
    public function getId()
    {
        // TODO: Implement getId() method.
        return $this->id;
    }
    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.

    }
    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
        return $this->authKey === $authKey;
    }
    public function validatePassword($password){
        return $this -> password === $password;
    }
}
