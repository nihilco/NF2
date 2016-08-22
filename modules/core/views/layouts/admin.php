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
<body>
<?php $this->beginBody() ?>

                                           <div class="wrapper">
                                              <!-- top navbar-->
                                              <header class="topnavbar-wrapper">
                                                 <!-- START Top Navbar-->
                                                 <nav role="navigation" class="navbar topnavbar">
                                                    <!-- START navbar header-->
                                                    <div class="navbar-header">
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
                                                    <div class="nav-wrapper">
                                                       <!-- START Left navbar-->
                                                       <ul class="nav navbar-nav">
                                                          <li>
                                                             <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                                                             <a href="#" data-toggle-state="aside-collapsed" class="hidden-xs">
                                                                <em class="fa fa-bars"></em>
                                                             </a>
                                                             <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                                                             <a href="#" data-toggle-state="aside-toggled" data-no-persist="true" class="visible-xs sidebar-toggle">
                                                                <em class="fa fa-bars"></em>
                                                             </a>
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
                                                             <a href="#" data-alerts-open="">
                                                                <em class="fa fa-bell"></em>
                                                             </a>
                                                          </li>
                                                          <!-- START Offsidebar button-->
                                                          <li>
                                                             <a href="#" data-toggle-state="offsidebar-open" data-no-persist="true">
                                                                <em class="fa fa-gear"></em>
                                                             </a>
                                                          </li>
                                                          <!-- END Offsidebar menu-->
                                                       </ul>
                                                       <!-- END Right Navbar-->
                                                    </div>
                                                    <!-- END Nav wrapper-->
                                                    <!-- START Search form-->
                                                    <form role="search" action="search.html" class="navbar-form">
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
                                              <!-- sidebar-->
                                              <aside class="aside">
                                        <!-- START Sidebar (left)-->
                                                 <div class="aside-inner">
                                                    <nav data-sidebar-anyclick-close="" class="sidebar">
                                                       <!-- START sidebar nav-->
                                                       <ul class="nav">
                                                          <!-- Iterates over all sidebar items-->
                                                          <li class="nav-heading ">
                                                             <span data-localize="sidebar.heading.HEADER">Menu Navigation</span>
                                                          </li>
                                                          <li class=" active">
                                                             <a href="#" title="Dashboard">
                                                                <em class="fa fa-dashboard"></em>
                                                                <span >Dashboard</span>
                                                             </a>
                                                          </li>
                                                          <li class=" ">
                                                             <a href="#pa-nav" title="Menu" data-toggle="collapse">
                                                                <em class="fa fa-briefcase"></em>
                                                                <span>Personal Assistant</span>
                                                             </a>
                                                             <ul id="pa-nav" class="nav sidebar-subnav collapse">
                                                                <li class="sidebar-subnav-header">Menu</li>
                                                                <li class=" ">
                                                                   <a href="/pa/email" title="Sub Menu">
                                                                      <span><i class="fa fa-inbox"></i> Email</span>
                                                                   </a>
                                                                </li>
                                                                <li class=" ">
                                                                   <a href="/pa/contacts" title="Sub Menu">
                                                                      <span>Contacts</span>
                                                                   </a>
                                                                </li>
                                                                <li class=" ">
                                                                   <a href="/pa/calendars" title="Sub Menu">
                                                                      <span>Calendars</span>
                                                                   </a>
                                                                </li>
                                                                <li class=" ">
                                                                   <a href="/pa/tasks" title="Sub Menu">
                                                                      <span>Tasks</span>
                                                                   </a>
                                                                </li>
                                                             </ul>
                                                          </li>
                                                          <li class=" ">
                                                             <a href="#cms-nav" title="Menu" data-toggle="collapse">
                                                                <em class="fa fa-newspaper-o"></em>
                                                                <span>Contant Management</span>
                                                             </a>
                                                             <ul id="cms-nav" class="nav sidebar-subnav collapse">
                                                                <li class="sidebar-subnav-header">Menu</li>
                                                                <li class=" ">
                                                                   <a href="/cms/pages" title="Sub Menu">
                                                                      <span>Pages</span>
                                                                   </a>
                                                                </li>
                                                             </ul>
                                                          </li>
                                                          <li class=" ">
                                                             <a href="#support-nav" title="Menu" data-toggle="collapse">
                                                                <em class="fa fa-life-ring"></em>
                                                                <span>Support Center</span>
                                                             </a>
                                                             <ul id="support-nav" class="nav sidebar-subnav collapse">
                                                                <li class="sidebar-subnav-header">Menu</li>
                                                                <li class=" ">
                                                                   <a href="/support/issues" title="Sub Menu">
                                                                      <span>Issues</span>
                                                                   </a>
                                                                </li>
                                                             </ul>
                                                          </li>
                                                          <li class=" ">
                                                             <a href="#ac-nav" title="Menu" data-toggle="collapse">
                                                                <em class="fa fa-lock"></em>
                                                                <span>Access Control</span>
                                                             </a>
                                                             <ul id="ac-nav" class="nav sidebar-subnav collapse">
                                                                <li class="sidebar-subnav-header">Menu</li>
                                                                <li class=" ">
                                                                   <a href="/ac/users" title="Sub Menu">
                                                                      <span>Users</span>
                                                                   </a>
                                                                </li>
                                                                <li class=" ">
                                                                   <a href="/ac/groups" title="Sub Menu">
                                                                      <span>Groups</span>
                                                                   </a>
                                                                </li>
                                                             </ul>
                                                          </li>
                                                       </ul>
                                                       <!-- END sidebar nav-->
                                                    </nav>
                                                 </div>
                                        <!-- END Sidebar (left)-->
                                              </aside>
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
                                                             <h3 class="text-center text-thin">Tab 1</h3>
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
    <?= $content ?>
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