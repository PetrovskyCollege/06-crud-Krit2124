<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
* Signup form
*/

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $created_at;
    public $id_access_type = 2;
    public $auth_key;
    public $access_token;
    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['created_at'], 'safe'],
            [['id_access_type'], 'integer'],
            [['username', 'password'], 'string', 'max' => 63],
            [['email'], 'string', 'max' => 127],
            [['auth_key', 'access_token'], 'string', 'max' => 255],
            [['id_access_type'], 'exist', 'skipOnError' => true, 'targetClass' => AccessType::class, 'targetAttribute' => ['id_access_type' => 'id']],
        ];
    }
    /**
    * Signs user up.
    *
    * @return User|null the saved model or null if saving fails
    */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->password =  $user->setPassword($this->password);
        $user->auth_key = $user->generateAuthKey();
        $user->created_at = date('Y-m-d H:i:s');
        $user->id_access_type = $this->id_access_type;
       
        return $user->save() ? $user : null;
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'email' => 'Email',
            'password' => 'Пароль',
        ];
    }
}