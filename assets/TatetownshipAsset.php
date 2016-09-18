<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TatetownshipAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/tatetownship';
    public $baseUrl = '@web/themes/tatetownship';
    public $css = [
        'css/animate.min.css',
        'css/theme.css',
    ];
    public $js = [
        'js/theme.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'app\assets\FontAwesomeAsset',
    ];
}