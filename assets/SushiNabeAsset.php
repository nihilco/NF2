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
class SushiNabeAsset extends AssetBundle
{
    public $basePath = '@webroot/themes/sushinabe';
    public $baseUrl = '@web/themes/sushinabe';
    public $css = [
        'css/style.css',
    ];
    public $js = [
        'js/theme.js',
        ['https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', 'condition' => 'lt IE 9', 'position' => \yii\web\View::POS_HEAD],
        ['https://oss.maxcdn.com/respond/1.4.2/respond.min.js', 'condition' => 'lt IE 9', 'position' => \yii\web\View::POS_HEAD],
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'app\assets\FontAwesomeAsset',
    ];
}
