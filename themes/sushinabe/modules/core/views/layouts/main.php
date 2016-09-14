<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\SushiNabeAsset;

SushiNabeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

  <!--/*|||||||||||||||||||header ||||||||||||||||||||*/-->
  <header id="top-header">
    <div class="container">
      <div class="row">
        <div class="col-md-2 col-sm-4 logo text-left">
          <img src="/themes/sushinabe/img/logo01.png" alt="#"  class="img-responsive" >
        </div>
        <nav class="navbar col-md-10 col-sm-8 headerbar text-right ">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle border-white" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar bg-pink"></span>
              <span class="icon-bar bg-pink"></span>
              <span class="icon-bar bg-pink"></span>
            </button>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav ">
              <li class="active"><a href="#top-header">Home</a></li>
              <li><a href="#about" class="page-scroll">About Us</a></li>
              <li><a href="#menu" class="page-scroll">Menu</a></li>
              <li><a href="#gallery" class="page-scroll">Gallery</a></li>
              <li><a href="#reservations" class="page-scroll">Reservations</a></li>
            </ul>
          </div>
        </nav>
      </div>

    </div>
  </header>
    
<?= $content ?>

  <footer>
    <div class="footer-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-left">
            <p>Copyright 2016 © Sushi Nabe of Chattanooga. All rights reserved.</p>
          </div>
          <div class="col-md-6 text-right">
            <p>Powered by <a href="https://nihil.co" target="_blank" rel="dofollow">NIHIL</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>