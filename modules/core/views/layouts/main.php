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
                      <li><a href="/core/default/contact">Contact</a>
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
<?php if(!\Yii::$app->user->isGuest) { ?>
    <!-- START Alert menu-->
                      <li class="dropdown dropdown-list">
                         <a href="#" data-toggle="dropdown">
                            <em class="fa fa-bell"></em>
                            <div class="label label-danger">11</div>
                         </a>
                         <!-- START Dropdown menu-->
                         <ul class="dropdown-menu animated flipInX">
                            <li>
                               <!-- START list group-->
                               <div class="list-group">
                                  <!-- list item-->
                                  <a href="#" class="list-group-item">
                                     <div class="media-box">
                                        <div class="pull-left">
                                           <em class="fa fa-twitter fa-2x text-info"></em>
                                        </div>
                                        <div class="media-box-body clearfix">
                                           <p class="m0">New followers</p>
                                           <p class="m0 text-muted">
                                              <small>1 new follower</small>
                                           </p>
                                        </div>
                                     </div>
                                  </a>
                                  <!-- list item-->
                                  <a href="#" class="list-group-item">
                                     <div class="media-box">
                                        <div class="pull-left">
                                           <em class="fa fa-envelope fa-2x text-warning"></em>
                                        </div>
                                        <div class="media-box-body clearfix">
                                           <p class="m0">New e-mails</p>
                                           <p class="m0 text-muted">
                                              <small>You have 10 new emails</small>
                                           </p>
                                        </div>
                                     </div>
                                  </a>
                                  <!-- list item-->
                                  <a href="#" class="list-group-item">
                                     <div class="media-box">
                                        <div class="pull-left">
                                           <em class="fa fa-tasks fa-2x text-success"></em>
                                        </div>
                                        <div class="media-box-body clearfix">
                                           <p class="m0">Pending Tasks</p>
                                           <p class="m0 text-muted">
                                              <small>11 pending task</small>
                                           </p>
                                        </div>
                                     </div>
                                  </a>
                                  <!-- last list item-->
                                  <a href="#" class="list-group-item">
                                     <small>More notifications</small>
                                     <span class="label label-danger pull-right">14</span>
                                  </a>
                               </div>
                               <!-- END list group-->
                            </li>
                         </ul>
                         <!-- END Dropdown menu-->
                      </li>
                      <!-- END Alert menu-->
<?php } ?>

<?php
    if (\Yii::$app->user->isGuest) {
?>
<li>
                         <a href="/ac/users/signup">Signup</a>
                      </li>
                      <li>
                         <a href="/ac/users/login">Login</a>
                      </li>
<?php
    } else {
?>

                                                          <li>
                                                             <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                                                                <em class="fa fa-gear"></em>
                                                             </a>
                                                          </li>

<?php
    }
?>    
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

                                              <!-- offsidebar-->
                                              <aside class="offsidebar hide">
                                        <!-- START Off Sidebar (right)-->
                                                 <nav>
                                                    <div role="tabpanel">
                                                       <!-- Nav tabs-->
                                                       <ul role="tablist" class="nav nav-tabs nav-justified">
                                                          <li role="presentation" class="active">
                                                             <a href="#app-settings" aria-controls="app-settings" role="tab" data-toggle="tab">
                                                                <em class="fa fa-user fa-lg"></em>
                                                             </a>
                                                          </li>
                                                          <li role="presentation">
                                                             <a href="#app-chat" aria-controls="app-chat" role="tab" data-toggle="tab">
                                                                <em class="fa fa-comments fa-lg"></em>
                                                             </a>
                                                          </li>
                                                       </ul>
                                                       <!-- Tab panes-->
                                                       <div class="tab-content">
                                                          <div id="app-settings" role="tabpanel" class="tab-pane fade in active">

<?php
    if(!\Yii::$app->user->isGuest) {
?>

    <h3 class="text-center text-thin"><?php echo \Yii::$app->user->identity->nickname; ?></h3>

<div class="p">
            <a href="/ac/users/logout" class="btn btn-danger btn-block">Logout</a>
</div>

<?php
    }
?>

                                                          </div>
                                                          <div id="app-chat" role="tabpanel" class="tab-pane fade">
                                                             <h3 class="text-center text-thin">Tab 2</h3>
                                                          </div>
                                                       </div>
                                                    </div>
                                                 </nav>
                                        <!-- END Off Sidebar (right)-->
                                              </aside>
    
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
                                                                                                                                                  <li><a href="/core/default/contact">Contact</a></li>
                                                                                                                                                  </ul>
      </footer>
   </div>

<?php $this->endBody() ?>
<!-- Piwik -->
<script type="text/javascript">
var _paq = _paq || [];
// tracker methods like "setCustomDimension" should be called before "trackPageView"
_paq.push(['trackPageView']);
_paq.push(['enableLinkTracking']);
(function() {
    var u="//pluto.nihil.co/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '2']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
})();
</script>
<!-- End Piwik Code -->
</body>
</html>
<?php $this->endPage() ?>