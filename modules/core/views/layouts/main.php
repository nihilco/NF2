<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\NF2Asset;

NF2Asset::register($this);
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
<body class="layout-h">
<?php $this->beginBody() ?>

<div class="wrapper">
          <!-- top navbar-->
          <header class="topnavbar-wrapper">
             <!-- START Top Navbar-->
             <nav role="navigation" class="navbar topnavbar">
                <!-- START navbar header-->
                <div class="navbar-header">
                   <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                   </button>
                   <a href="/" class="navbar-brand">
                      <div class="brand-logo">
                          NIHIL Framework
                      </div>
                      <div class="brand-logo-collapsed">
                          NF
                      </div>
                   </a>
                </div>
                <!-- END navbar header-->
                <!-- START Nav wrapper-->
                <div class="navbar-collapse collapse">
                   <!-- START Left navbar-->
                   <ul class="nav navbar-nav">
                      <li></li>
                      <li><a href="#dashboard" data-toggle="dropdown">Services</a>
                         <ul class="dropdown-menu animated fadeIn">
                            <li><a href="#">Dashboard v1</a>
                            </li>
                            <li><a href="#">Dashboard v2</a>
                            </li>
                            <li><a href="#">Dashboard v3</a>
                            </li>
                         </ul>
                      </li>
                      <li><a href="/pricing">Pricing</a>
                      <li><a href="/contact">Contact</a>
                      </li>
                   </ul>
                   <!-- END Left navbar-->
                   <!-- START Right Navbar-->
                   <ul class="nav navbar-nav navbar-right">
                      <!-- Search icon-->
                      <li>
                         <a href="#" data-search-open="">
                            <em class="fa fa-search"></em>
                         </a>
                      </li>
                      <li>
                         <a href="/ac/users/signup">Signup</a>
                      </li>
                      <li>
                         <a href="/ac/users/login">Login</a>
                      </li>
                   </ul>
                   <!-- END Right Navbar-->
                </div>
                <!-- END Nav wrapper-->
                <!-- START Search form-->
                <form role="search" action="/search" class="navbar-form">
                   <div class="form-group has-feedback">
                      <input type="text" placeholder="Type and hit enter ..." class="form-control">
                      <div data-search-dismiss="" class="fa fa-times form-control-feedback"></div>
                   </div>
                   <button type="submit" class="hidden btn btn-default">Submit</button>
                </form>
                <!-- END Search form-->
             </nav>
             <!-- END Top Navbar-->
          </header>
          <!-- offsidebar-->

          <!-- Main section-->
          <section>
             <!-- Page content-->
             <div class="content-wrapper">
<?= $content ?>
                </div>
                                                                                                                             </section>
                                                                                                                             <!-- Page footer-->
                                                                                                                             <footer>
                                                                                                                       <span>Copyright &copy; 2010-2016 The NIHIL Corporation.  All rights reserved.</span>
<ul class="pull-right list-inline">
                                                                                                                                                  <li><a href="/core/legal">Legal</a></li>
                                                                                                                                                  <li><a href="/contact">Contact</a></li>
                                                                                                                                                  </ul>
      </footer>
   </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>