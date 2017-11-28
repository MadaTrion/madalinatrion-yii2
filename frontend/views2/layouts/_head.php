<?php
use yii\helpers\Html;
?>

<meta charset="<?= Yii::$app->charset ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?= Html::encode($this->title) ?></title>
<?= Html::csrfMetaTags() ?>

<meta name="keywords" content="<?= Html::encode(Yii::$app->params['keywords']) ?>" />
<meta name="description" content="<?= Html::encode(Yii::$app->params['description']) ?>" />
<meta name="author" content="<?= Html::encode(Yii::$app->params['author']) ?>" />
<meta name="robots" content="all, index, follow" />

<!-- Twitter Cards Metadata -->
<meta name="twitter:card" content="<?= Yii::$app->params['tw_card'] ?>" />
<meta name="twitter:site" content="<?= Yii::$app->params['tw_site'] ?>" />
<meta name="twitter:title" content="<?= Html::encode(Yii::$app->params['tw_title']) ?>" />
<meta name="twitter:description" content="<?= Html::encode(Yii::$app->params['tw_description']) ?>" />
<meta name="twitter:creator" content="<?= Yii::$app->params['tw_creator'] ?>" />
<meta name="twitter:image" content="<?= Yii::$app->params['tw_image'] ?>" />
<meta name="twitter:domain" content="<?= Yii::$app->params['tw_domain'] ?>" />
<?= Yii::$app->params['tw_video_url'] ?>
<?= Yii::$app->params['tw_video_stream'] ?>
<?= Yii::$app->params['tw_video_width'] ?>
<?= Yii::$app->params['tw_video_height'] ?>
<?= Yii::$app->params['tw_label1'] ?>
<?= Yii::$app->params['tw_data1'] ?>
<?= Yii::$app->params['tw_label2'] ?>
<?= Yii::$app->params['tw_data2'] ?>

<!-- Open Graph ProtocolMeta Values -->
<meta property="og:type" content="<?= Yii::$app->params['og_type'] ?>" />
<meta property="og:title" content="<?= Html::encode(Yii::$app->params['og_title']) ?>" />
<meta property="og:description" content="<?= Html::encode(Yii::$app->params['og_description']) ?>" />
<meta property="og:url" content="<?= Yii::$app->params['og_url'] ?>" />
<meta property="og:image" content="<?= Yii::$app->params['og_image'] ?>" />
<meta property="og:site_name" content="<?= Yii::$app->params['og_site_name'] ?>" />
<meta property="fb:app_id" content="<?= Yii::$app->params['fb_app_id'] ?>" />
<?= Yii::$app->params['og_video_flash_url'] ?>
<?= Yii::$app->params['og_video_flash_secure_url'] ?>
<?= Yii::$app->params['og_video_flash_type'] ?>
<?= Yii::$app->params['og_video_other_url'] ?>
<?= Yii::$app->params['og_video_other_secure_url'] ?>
<?= Yii::$app->params['og_video_other_type'] ?>
<?= Yii::$app->params['og_video_width'] ?>
<?= Yii::$app->params['og_video_height'] ?>

<!-- Update your html tag to include the itemscope and itemtype attributes. -->
<!-- Add the following three tags inside head. -->
<meta itemprop="name" content="<?= Html::encode(Yii::$app->params['itemprop_name']) ?>" />
<meta itemprop="description" content="<?= Html::encode(Yii::$app->params['itemprop_description']) ?>" />
<meta itemprop="image" content="<?= Yii::$app->params['itemprop_image'] ?>" />

<!-- Pinterest Verification Code -->
<meta name="p:domain_verify" content="<?= Yii::$app->params['pinterest_verification'] ?>" />

<!-- Google Webmaster Tools Verification Code -->
<meta name="google-site-verification" content="<?= Yii::$app->params['google_verification'] ?>" />

<!-- Microsoft Bing Webmaster Tools Verification Code -->
<meta name="msvalidate.01" content="<?= Yii::$app->params['bing_verification'] ?>" />

<!-- Canonical Url -->
<link rel="canonical" href="<?= Yii::$app->params['canonical_url'] ?>" />

<!-- Feeds -->
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?= Yii::$app->params['rss'] ?>" />