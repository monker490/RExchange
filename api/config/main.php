<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
		'v1' => [
			'basePath' => '@app/modules/v1',
			'class' => 'api\modules\v1\Module'
		]
	],
    'components' => [
		'response' => [
			'formatters' => [
				\yii\web\Response::FORMAT_JSON => [
					'class' => 'yii\web\JsonResponseFormatter',
					'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
					'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
				],
			],
		],
        'request' => [
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			]
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'enableStrictParsing' => true,
			'showScriptName' => false,
			'rules' => [
				[
					'class' => 'yii\rest\UrlRule', 
					'controller' => 'v1/loan',
					'tokens' => [
							'{id}' => '<id:\\w+>'
					],
					'extraPatterns' => [
					 'GET {id}/borrowers' => 'bazo',
					],
				],
				[
					'class' => 'yii\rest\UrlRule', 
					'controller' => 'v1/borrower',
					'tokens' => [
							'{id}' => '<id:\\w+>'
					],
					'extraPatterns' => [
					'GET {id}/type' => 'type',
					]
				],
				[
					'class' => 'yii\rest\UrlRule', 
					'controller' => 'v1/property',
					'tokens' => [
							'{id}' => '<id:\\w+>'
					],
				],
				[
					'class' => 'yii\rest\UrlRule', 
					'controller' => 'v1/vehicle',
					'tokens' => [
							'{id}' => '<id:\\w+>'
					],
				],
				[
					'class' => 'yii\rest\UrlRule', 
					'controller' => 'v1/education',
					'tokens' => [
							'{id}' => '<id:\\w+>'
					],
				]
			],
		],
		'user' => [
			'identityClass' => 'common\models\People',
			'enableAutoLogin' => false,
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
	],
	'params' => $params,
];
