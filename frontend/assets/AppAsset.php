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
        '//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css',
    ];
    public $js = [
        'js/libs/common.js',
        'js/libs/bootstrap.min.js',
        'js/custom/main.js',
        '//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js',
        '//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
