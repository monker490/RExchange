<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

use yii\web\Response;

use yii\filters\auth\HttpBasicAuth;

/**
 * Education Controller API
 *
 * @Author Arslan
 */

class EducationController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Education';

 	public function actions()
	{
        $actions = parent::actions();
		// Possibility to unset default actions
        // unset($actions['index']);
        return $actions;
	}
	
	public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];
	
	public function auth($username, $password)
	{
		return \common\models\People::findOne(['user_id' => $username, 'access_token' => $password]);
	}
	 
	public function behaviors()
	{
		$behaviors = parent::behaviors();
		#Formats output to JSON
		$behaviors['contentNegotiator'] = [
			'class' => 'yii\filters\ContentNegotiator',
			'formats' => [
				'application/json' => Response::FORMAT_JSON,
			],
		];
		#BASIC HTTP AUTH
		$behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => [$this, 'auth']
		];
		
		
		return $behaviors;
	}
	
	
 
}