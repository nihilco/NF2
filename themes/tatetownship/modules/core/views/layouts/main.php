<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\TatetownshipAsset;

TatetownshipAsset::register($this);
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
<body id="home">
<?php $this->beginBody() ?>

<header class="navbar navbar-inverse hero" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a href="/" class="navbar-brand">Tate Township</a>
    </div>
    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Government <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/government/board-of-trustees">Board of Trustees</a></li>
            <li><a href="/government/meeting-minutes">Meetinging Minutes</a></li>
            <li><a href="/government/jobs-and-employment">Jobs & Employment</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Departments <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="/departments/maintenance-and-cemetary">Maintenance & Cemetary</a></li>
            <li><a href="/departments/zoning-and-planning">Zoning & Planning</a></li>
            <li><a href="/departments/fire-and-ems">Fire & Emergency Services</a></li>
            <li><a href="/departments/deputy-and-sheriff">Deputy & Sheriff</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="/about" class="">
            About
          </a>
        </li>
        <li class="dropdown">
          <a href="/calendar" class="">
            Calendar
          </a>
        </li>
        <li class="dropdown">
          <a href="/contact" class="">
            Contact
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>
    
<?= $content ?>

<div id="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 menu">
        <h3>Menu</h3>
        <ul>
          <li>
            <a href="/news">News</a>
          </li>
          <li>
            <a href="/about">About us</a>
          </li>
          <li>
            <a href="/contact">Contact us</a>
          </li>
          <li>
            <a href="/calendar">Calendar</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-3 menu">
        <h3>Government</h3>
        <ul>
          <li>
            <a href="/government/board-of-trustees">Board of Trustees</a>
          </li>
          <li>
            <a href="/government/meeting-minutes">Meeting Minutes</a>
          </li>
          <li><a href="/government/jobs-and-employemnt">Jobs & Employment</a></li>
        </ul>
      </div>
      <div class="col-sm-3 menu">
        <h3>Departments</h3>
        <ul>
          <li>
            <a href="/departments/maintenance-and-cemetary">Mainenance & Cemetary</a>
          </li>
          <li>
            <a href="/departments/zoning-and-planning">Zoning & Planning</a>
          </li>
          <li>
            <a href="/departments/fire-and-ems">Fire & Emergency Services</a>
          </li>
          <li>
            <a href="/departments/deputy-and-sheriff">Deputy & Sheriff</a>
          </li>
        </ul>
      </div>
      <div class="col-sm-2 menu">
        <h3>Social</h3>
        <ul>
          <li>
            <a href="#">Facebook</a>
          </li>
        </ul>
      </div>
    </div>
    <div class="row credits">
      <div class="col-md-6">
        Copyright © 2016 Tate Township. All rights reserved.
      </div>
      <div class="col-md-6 text-right">
        Powered by <a href="https://nihil.co" target="_blank">NIHIL</a>
      </div>
    </div>
  </div>
</div>
    
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>