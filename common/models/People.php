<?php

namespace common\models;

use Yii;

use yii\db\ActiveRecord;

use yii\web\IdentityInterface;

/**
 * This is the model class for table "people".
 *
 * @property integer $user_id
 * @property string $access_token
 */

class People extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'people';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'access_token'], 'required'],
            [['user_id'], 'integer'],
            [['access_token'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'access_token' => 'Access Token',
        ];
    }
	
	public static function findIdentity($id){
		return static::findOne($id);
	}
 
	public static function findIdentityByAccessToken($token, $type = null){
		 $apiUser = ApiAccess::find()
			->where(['access_token' => $token])
			->one();
     return static::findOne(['id' => $apiUser->user_id, 'status' => self::STATUS_ACTIVE]);

	}
 
	public function getId(){
		return $this->id;
	}
 
	public function getAuthKey(){
		return $this->authKey;//Here I return a value of my authKey column
	}
 
	public function validateAuthKey($authKey){
		return $this->authKey === $authKey;
	}
	public static function findByUsername($username){
		return self::findOne(['username'=>$username]);
	}
 
	public function validatePassword($password){
		return $this->password === $password;
	}
}

