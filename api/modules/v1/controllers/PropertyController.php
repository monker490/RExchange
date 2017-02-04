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

class PropertyController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Property';

 // Default actions
 // GET /borrowers: list all borrowers
 // HEAD /borrowers: show the overview information of borrower listing
 // POST /borrowers: create a new borrower
 // GET /borrowers/10001: return the details of the borrower 12345
 // HEAD /borrowers/10001: show the overview information of borrower 12345
 // PATCH /borrowers/10001: update the borrower 12345
 // PUT /borrowers/10001: update the borrower 12345
 // DELETE /borrowers/10001: delete the borrower 12345
 // OPTIONS /borrowers: show the supported verbs regarding endpoint /borrowers
 // OPTIONS /borrowers/10001: show the supported verbs regarding endpoint /borrowers/12345.

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