<?php
$params = array_merge(
	require(__DIR__ . '/../../common/config/params.php'),
	require(__DIR__ . '/../../common/config/params-local.php'),
	require(__DIR__ . '/params.php'),
	require(__DIR__ . '/params-local.php')
);

use \yii\web\Request;
use yii\web\UrlNormalizer;

$baseUrl = str_replace('/frontend/web', '', (new Request)->getBaseUrl());

return [
	'id' => 'app-frontend',
	'name' => 'DoctorAZ',
	'basePath' => dirname(__DIR__),
	'language' => 'ro-RO',
	'sourceLanguage' => 'en-US',
	'bootstrap' => [
		'log',
		'translatemanager',
		'frontend\components\MultilanguageUrlRules'
	],
	'controllerNamespace' => 'frontend\controllers',
	'components' => [
		'request' => [
			'csrfParam' => '_csrf-frontend',
			'baseUrl' => $baseUrl,
		],
		'user' => [
			'identityClass' => 'frontend\models\User',
			'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
			'enableAutoLogin' => true,
			'loginUrl' => ['user/login']
		],
		'session' => [
			// this is the name of the session cookie used for login on the frontend
			'name' => 'advanced-frontend',
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
		'urlManager' => [
			'class' => 'codemix\localeurls\UrlManager',
			'languages' => ['en' => 'en-US'], 				// This is overwritten by MultilanguageUrlRules in bootstrap phase
			'enableLanguageDetection' => false,				// Detects and sets the language of the browser
			'enableDefaultLanguageUrlCode' => false,	// Removes the language from URL if is default language
			'enableLanguagePersistence' => false,			// Keep the last language in a cookie
			'enableStrictParsing' => true, 						// This does not allow other rules than defined ones
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'baseUrl' => $baseUrl,
			'normalizer' => [
				'class' => 'yii\web\UrlNormalizer',
				'action' => UrlNormalizer::ACTION_REDIRECT_PERMANENT,
			],
			'rules' => [
				// Hardcoded Routes
				[
					'pattern' => 'rss',
					'route' => 'site/rss'
				],
				[
					'pattern' => '/change-language/<params>',
					'route' => 'site/change-language'
				],
				[
					'pattern' => '/logout',
					'route' => 'user/logout'
				],

//				'<controller:\w+>/<id:\d+>' => '<controller>/view',
//				'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
//				'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
//				'/' => 'site/index',
			],
		],
		'translatemanager' => [
			'class' => 'lajax\translatemanager\Component'
		],
		'assetManager' => [
			'bundles' => [
				'dosamigos\google\maps\MapAsset' => [
					'options' => [
						'key' => $params['googleMapsApiKey'],
						'language' => Yii::$app->language,
						'version' => '3.1.18'
					]
				]
			]
		],
	],
	'params' => $params,
];