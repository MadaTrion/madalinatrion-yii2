<?php
return [
	'language' => 'ro-RO',
	'sourceLanguage' => 'en-US',
	'timeZone' => 'Europe/Bucharest', // TODO: "UTC" solves the formatter issue, but is it correct?
	'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
	'components' => [
		'cache' => [
			'class' => 'yii\caching\FileCache',
		],
		'session' => [
			'class' => 'yii\web\DbSession',
		],
		'authManager' => [
			'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\PhpManager'
		],
		'i18n' => [
			'translations' => [
				'*' => [
					'class' => 'yii\i18n\DbMessageSource',
					'db' => 'db',
					'sourceLanguage' => 'en-US', // Developer language
					'sourceMessageTable' => '{{%language_source}}',
					'messageTable' => '{{%language_translate}}',
					'cachingDuration' => 86400,
					'enableCaching' => true,
					'forceTranslation' => true
				],
			],
		]
	],
	'modules' => [
		'translatemanager' => [
			'class' => 'lajax\translatemanager\Module',
		]
	],
];
