<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;

Yii::$app->params['map_latitude'] = '45.768720';
Yii::$app->params['map_longitude'] = '21.251571';
Yii::$app->params['contact_address'] = 'Bd. Vasile Parvan No. 2';
Yii::$app->params['contact_zip_code'] = '300223';
Yii::$app->params['contact_city'] = 'Timisoara';
Yii::$app->params['contact_country'] = 'Romania';
Yii::$app->params['contact_phone'] = '+40(0)256-403291';
Yii::$app->params['contact_fax'] = '+40(0)256-403291';
Yii::$app->params['contact_email'] = 'simpo.etc@upt.ro';
?>
<!-- MASTER CONTENT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<section class="mastwrap signature-claus">

    <section class="first-fold signature-claus fullheight contact-bg parallax" data-stellar-background-ratio="0.5">
        <section class="main-heading fixed-top">
            <h1 class="black font3bold"><?= $this->title ?></h1>
            <div class="liner color-bg"></div>
        </section>
    </section>

    <div class="inner-wrap silver-bg">

        <section class="hero-text signature-claus">
            <div class="row">
                <article class="col-md-6">
                    <?php if (Yii::$app->params['contact_address']) : ?>
                        <?= Yii::$app->params['contact_address'] ?>,
                        <br>
                    <?php endif; ?>
                    <?php if (Yii::$app->params['contact_zip_code']) : ?> <?= Yii::$app->params['contact_zip_code'] ?>,<?php endif; ?> <?php if (Yii::$app->params['contact_city']) : ?><?= Yii::$app->params['contact_city'] ?>,<?php endif; ?> <?php if (Yii::$app->params['contact_country']) : ?> <?= Yii::$app->params['contact_country']; ?><br> <?php endif; ?>
                    <?php if (Yii::$app->params['contact_phone']) : ?>
                        <abbr title="Phone"><i class="fa fa-phone"></i></abbr>  <?= Yii::$app->params['contact_phone'] ?>
                        <br>
                    <?php endif; ?>
                    <?php if (Yii::$app->params['contact_fax']) : ?>
                        <abbr title="Phone"><i class="fa fa-fax"></i></abbr>  <?= Yii::$app->params['contact_fax']; ?>
                        <br>
                    <?php endif; ?>
                    <?php if (Yii::$app->params['contact_email']) : ?>
                        <abbr title="Phone"><i class="fa fa-envelope"></i></abbr> <?= Yii::$app->params['contact_email']; ?>
                    <?php endif; ?>

                    <ul class="team-social add-top-quarter">
                        <li><a href="#"><img data-no-retina alt="" title="" src="img/social/01.svg"/></a></li>
                        <li><a href="#"><img data-no-retina alt="" title="" src="img/social/02.svg"/></a></li>
                        <li><a href="#"><img data-no-retina alt="" title="" src="img/social/03.svg"/></a></li>
                        <li><a href="#"><img data-no-retina alt="" title="" src="img/social/04.svg"/></a></li>
                    </ul>
                </article>
                <article class="col-md-6">

                    <div class="contact-item">
                        <?php

                        $form = ActiveForm::begin([
                            'id' => 'contactForm',
                            'method' => 'POST',
                            'action' => ['site/contact'],
                        ]); ?>
                        <?= $form->field($model, 'honeypot')->textInput(['class' => 'honeypot'])->label(false) ?>
                        <article>
                            <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => 'border-form white font4light']) ?>
                        </article>
                        <article>
                            <?= $form->field($model, 'name')->textInput(['class' => 'border-form white font4light']) ?>
                        </article>
                        <article>
                            <?= $form->field($model, 'subject')->textInput(['class' => 'border-form white font4light']) ?>
                        </article>
                        <article>
                            <?= $form->field($model, 'message')->textarea([['class' => 'border-form white font4light']]) ?>
                        </article>
                        <article>
                            <div class="btn-wrap  text-left">
                                <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-signature btn-signature-claus btn-signature-color', 'name' => 'contact-button']) ?>
                            </div>
                        </article>
                        <?php ActiveForm::end() ?>
                    </div>




                </article>
            </div>
        </section>



    </div>
    <!-- end : inner-wrap -->




    <div class="container-fluid">
        <div class="row">
            <article class="col-md-12 map-wrap no-pad">
                <div id="map" class="signature-claus fullheight"></div>
            </article>
        </div>
    </div>


</section>
<!-- end : mastwrap -->
