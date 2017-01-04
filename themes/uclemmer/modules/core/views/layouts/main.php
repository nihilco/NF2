<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\UclemmerAsset;

UclemmerAsset::register($this);
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
    <!-- Piwik -->
    <script type="text/javascript">
    var _paq = _paq || [];
    // tracker methods like "setCustomDimension" should be called before "trackPageView"
    _paq.push(['trackPageView']);
    _paq.push(['enableLinkTracking']);
    (function() {
        var u="http://pluto.nihil.co/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '5']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
    })();
    </script>
    <!-- End Piwik Code -->
</head>
<body>
<?php $this->beginBody() ?>

  <div id="site-wrapper">
    <header id="site-header">
      <nav class="navbar navbar-default">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><span class="uclemmer"><em>u</em>clemmer</span></a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
              <li><a href="/about">About</a></li>
              <li><a href="/contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </nav>
    </header>
    
    <?= $content ?>

  </div><!-- /#wrapper -->

  <footer id="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <p>Copyright &copy; 2005-<?= date("Y") ?> <span class="uclemmer"><em>u</em>clemmer</span>.  All rights reserved.</p>
        </div>
        <div class="col-sm-6 text-right">
          <p>Powered by <a href="https://nihil.co" target="_blank">NIHIL</a></p>
        </div>
      </div>
    </div>
  </footer>  
    
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>