<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;

use yii\web\Response;

use yii\filters\auth\HttpBasicAuth;

use yii\data\ActiveDataProvider;

use yii\db\Query;


/**
 * Loan Controller API
 *
 * @Author Arslan
 */

class LoanController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Loan';

 // Default actions
 // GET /loans: list all loans
 // HEAD /loans: show the overview information of loan listing
 // POST /loans: create a new loan
 // GET /loans/12345: return the details of the loan 12345
 // GET /loans/12345/borrowers: return the borrower details of the loan 12345
 // HEAD /loans/12345: show the overview information of loan 12345
 // PATCH /loans/12345: update the loan 12345
 // PUT /loans/12345: update the loan 12345
 // DELETE /loans/12345: delete the loan 12345
 // OPTIONS /loans: show the supported verbs regarding endpoint /loans
 // OPTIONS /loans/12345: show the supported verbs regarding endpoint /loans/12345.

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

	public function actionBazo($id)
	{
		return new ActiveDataProvider([
			'query' => (new \yii\db\Query())->select('*')->from('borrower b')->join('INNER JOIN','loan l',['and', 'b.bid=l.borrower_id', 'l.lid='.$id]),
			'pagination' => false,
      ]);
    }
	
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