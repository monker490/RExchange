<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

use yii\web\Response;

use yii\filters\auth\HttpBasicAuth;

/**
 * Borrower Controller API
 *
 * @Author Arslan
 */

/*
GET /propertys: list all propertys
HEAD /propertys: show the overview information of property listing
POST /propertys: create a new property
GET /propertys/12345: return the details of the property 12345
HEAD /propertys/12345: show the overview information of property 12345
PATCH /propertys/12345: update the property 12345
PUT /propertys/12345: update the property 12345
DELETE /propertys/12345: delete the property 12345
OPTIONS /propertys: show the supported verbs regarding endpoint /propertys
OPTIONS /propertys/12345: show the supported verbs regarding endpoint /propertys/12345.
*/

class PropertyController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Property';

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