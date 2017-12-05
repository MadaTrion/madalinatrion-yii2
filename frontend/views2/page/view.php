<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
?>
<!-- MASTER CONTENT
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<section class="mastwrap signature-claus">

    <section class="first-fold signature-claus fullheight about-bg parallax" data-stellar-background-ratio="0.5">
        <section class="main-heading fixed-top">
            <h1 class="black font3bold"><?= $this->title ?></h1>
            <div class="liner color-bg"></div>
        </section>
    </section>

    <div class="inner-wrap silver-bg">

        <section class="hero-text text-center">
            <div class="row add-top-quarter">
                <article class="col-md-8 col-md-offset-2">
                    <?= $page->content ?>
                </article>
            </div>
        </section>




    </div>
    <!-- end : inner-wrap -->


</section>
<!-- end : mastwrap -->