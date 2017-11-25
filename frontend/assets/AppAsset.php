<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '//fonts.googleapis.com/css?family=Raleway:400,300,600%7CMontserrat:400,700%7COpen+Sans:400,300,700,800',
        'css/ionicons.min.css',
        'fonts/fonts.css',
        'css/isotope.css',
        'css/venobox.css',
        'css/vegas.css',
        'css/sinister.css',
        'css/slimmenu.css',
        'css/main.css',
        'css/main-bg.css',
        'css/main-responsive.css',
    ];
    public $js = [
        'js/libs/common.js',
        'js/libs/bootstrap.min.js',
        'js/custom/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
