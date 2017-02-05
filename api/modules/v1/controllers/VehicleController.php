<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

use yii\web\Response;

use yii\filters\auth\HttpBasicAuth;

/**
 * Vehicle Controller API
 *
 * @Author Arslan
 */
 
/*
GET /vehicles: list all vehicles
HEAD /vehicles: show the overview information of vehicle listing
POST /vehicles: create a new vehicle
GET /vehicles/12345: return the details of the vehicle 12345
HEAD /vehicles/12345: show the overview information of vehicle 12345
PATCH /vehicles/12345: update the vehicle 12345
PUT /vehicles/12345: update the vehicle 12345
DELETE /vehicles/12345: delete the vehicle 12345
OPTIONS /vehicles: show the supported verbs regarding endpoint /vehicles
OPTIONS /vehicles/12345: show the supported verbs regarding endpoint /vehicles/12345.
*/


class VehicleController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Vehicle';

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

	/*public function actionBorrower()
	{
		
		// Define custom actions
		/*public function actionBorrower()
		{
			return[];
			/*return new ActiveDataProvider([
				//'query' => Proxy::find()->where(['Alive' => 1]),
				//'pagination' => false,
      ]);
    }

	 
	}*/
	
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