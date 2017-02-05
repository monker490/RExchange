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
 
 /*
 
GET /educations: list all educations
HEAD /educations: show the overview information of education listing
POST /educations: create a new education
GET /educations/12345: return the details of the education 12345
HEAD /educations/12345: show the overview information of education 12345
PATCH /educations/12345: update the education 12345
PUT /educations/12345: update the education 12345
DELETE /educations/12345: delete the education 12345
OPTIONS /educations: show the supported verbs regarding endpoint /educations
OPTIONS /educations/12345: show the supported verbs regarding endpoint /educations/12345.

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