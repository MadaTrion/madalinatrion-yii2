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
            <form action="/contact" method="POST">
                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="basic-url">Selectati data dorita:</label>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="basic-url">Selectati ora dorita:</label>
                    </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div id="datetimepicker12"></div>
                    </div>
                <br>
                <br>
                <br>
                <br>

                <div class="row">
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="basic-url">Prenume:</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="basic-url">Nume :</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="basic-url">Nr telefon: </label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="basic-url">E-mail:</label>
                        <a href="#"><span class="glyphicon glyphicon-envelope"></span></a>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="basic-url">Nume locatie:</label>
                        <span class="glyphicon glyphicon-search"></span>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="basic-url">Nr. aprox. persoane care participa la eveniment:</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label for="basic-url">Membrii formatiei sunt:</label>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="basic-url">Pincipali</label>
                        <div class="checkbox">
                            <label>Solistul principal</label><br>
                            <label>Solistul secundar</label><br>
                            <label>Orga</label><br>
                            <label>Acordeon</label><br>
                            <label>Saxafon</label><br>
                            <label>Inginer de sunet</label><br>
                        </div>
                    </div>

                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <label for="basic-url">Secundari(Puteti bifa daca mai doiti in plus si alti instrumentisti)</label>
                        <div class="checkbox">
                            <label><input type="checkbox">Sopran</label><br>
                            <label><input type="checkbox">Vioara</label><br>
                            <label><input type="checkbox">Sxafon2 </label><br>
                            <label><input type="checkbox">Dj</label><br>
                        </div>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label for="basic-url">Tipul evenimentului:</label>
                        <select  class="form-control">
                            <option value="1">Nunta</option>
                            <option value="1">Botez</option>
                            <option value="1">Nunta&Botez</option>
                            <option value="1">Majorat</option>
                            <option value="1">Zi onomastica</option>
                            <option value="1">Seara banateana</option>
                            <option value="1">Ruga</option>
                            <option value="1">Petrecere privata</option>
                            <option value="1">Spectacole</option>
                            <option value="1">Filmari Televiziune</option>
                            <option value="1">Alt tip de eveniment</option>
                        </select>
                    </div>
                    <br>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <label for="basic-url">Alte specificatii:</label>

                        <label form action="/action_page.php"></label>
                            <textarea name="message" rows="10" cols="30" color="blue"></textarea>
                    </div>

                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <button type="submit" >Trimite</button>
                        <button type="reset"> Reseteaza</button>
                    </div>

                    </div>
            </form>
        </section>

    </div>
    <!-- end : inner-wrap -->


</section>
<!-- end : mastwrap -->

