<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string|null $email
 * @property string $password
 * @property string $created_at Дата создания аккаунта
 * @property int $id_access_type Тип доступа пользователя
 * @property string|null $auth_key
 * @property string|null $access_token
 *
 * @property AccessType $accessType
 * @property ListOfFavoriteNpc[] $listOfFavoriteNpcs
 * @property Npc[] $npcs
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'created_at', 'id_access_type'], 'required'],
            [['created_at'], 'safe'],
            [['id_access_type'], 'integer'],
            [['username', 'password'], 'string', 'max' => 63],
            [['email'], 'string', 'max' => 127],
            [['auth_key', 'access_token'], 'string', 'max' => 255],
            [['id_access_type'], 'exist', 'skipOnError' => true, 'targetClass' => AccessType::class, 'targetAttribute' => ['id_access_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'email' => 'Email',
            'password' => 'Пароль',
            'created_at' => 'Дата создания',
            'id_access_type' => 'Тип доступа',
            'auth_key' => 'Auth Key',
            'access_token' => 'Access Token',
        ];
    }

    /**
     * Gets query for [[AccessType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAccessType()
    {
        return $this->hasOne(AccessType::class, ['id' => 'id_access_type']);
    }

    /**
     * Gets query for [[ListOfFavoriteNpcs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getListOfFavoriteNpcs()
    {
        return $this->hasMany(ListOfFavoriteNpc::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Npcs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNpcs()
    {
        return $this->hasMany(Npc::class, ['id_created_by' => 'id']);
    }

    // Методы для избежания ошибок
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        return $this->auth_key = Yii::$app->security->generateRandomString();
    }
    public function setPassword($password)
    {
        return $this->password = md5($password);
    }
}
