<?php
use yii\helpers\Html;
use common\widgets\PageMenu;
use common\models\Page;
?>
<!-- mobile only navigation : starts -->
<nav class="mobile-nav signature-claus">
    <ul class="slimmenu">
        <li>
            <a class="sub-collapser" href="#">Home</a>
            <ul>
                <li><a href="index.html">fullscreen slider</a></li>
                <li><a href="index02.html">fullscreen video</a></li>
            </ul>
        </li>
        <li>
            <a class="sub-collapser" href="#">Biography</a>
        </li>

        <li>
            <a class="sub-collapser" href="#"> Awards</a>
        </li>
        <li>
            <a class="sub-collapser" href="#">Gallery </a>
        <li>
            <a class="sub-collapser" href="#">Portfolio </a>
        </li>

        <li>
            <a class="sub-collapser" href="#"> Events </a>
            <ul>
                <li><a href="works01.html">Audio</a></li>
                <li><a href="works02.html">Video</a></li>

            </ul>
        </li>
        <li>
            <a class="sub-collapser" href="#">Contact </a>
        </li>


        <li><a href="about.html">about</a></li>
        <li><a href="journal.html">journal</a></li>
        <li><a href="contact.html">contact</a></li>
        <li>
            <a class="sub-collapser" href="#">project</a>
        </li>
    </ul>
</nav>
<!-- mobile only navigation : ends -->



<!-- Header
–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<header class="masthead signature-claus">
    <div class="masthead-inner">
        <?=
            Html::a(
                Html::img('@web/img/logo-gold.png', ['alt' => Yii::$app->params['siteTitle'], 'height' => 60]),
                ['site/index'],
                [
                    'title' => Yii::$app->params['siteTitle'],
                ]
            )
        ?>
        <nav class="mastnav signature-claus">
            <ul class="main-menu signature-claus">
                <li>
                    <a class="main-link font3bold sub-menu-trigger" href="index.html">Home</a>
                    <div class="sub-menu font3bold">
                        <a href="index.html">fullscreen slider</a>
                        <a href="index02.html">fullscreen video</a>
                    </div>
                </li>
                <li>
                    <a class="main-link font3bold sub-menu-trigger" href="biography.html">Biography</a>
                </li>

                <li>
                    <a class="main-link font3bold sub-menu-trigger" href="awards.html"> Awards</a>
                </li>

                <li>
                    <a class="main-link font3bold sub-menu-trigger" href="gallery.html">Gallery</a>
                </li>

                <li>
                    <a class="main-link font3bold sub-menu-trigger" href="portofolio.html">Portofolio</a>
                    <div class="sub-menu font3bold">
                        <a href="audio.html">Audio</a>
                        <a href="video.html">Video</a>

                    </div>
                </li>


                <li>
                    <a class="main-link font3bold sub-menu-trigger" href="events.html">Events</a>
                </li>

                <li>
                    <a class="main-link font3bold sub-menu-trigger" href="contact.html">Contact</a>
                </li>

            </ul>
        </nav>
    </div>
</header>
<!-- end : masthead -->