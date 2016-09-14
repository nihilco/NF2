<?php

namespace app\library\bootstrap;

use Yii;
use yii\base\BootstrapInterface;

/*
/* The base class that you use to retrieve the settings from the database
*/

class Theme implements BootstrapInterface {

    private $db;

    public function __construct() {
        $this->db = Yii::$app->db;
    }

    /**
     * Bootstrap method to be called during application bootstrap stage.
     * Loads all the settings into the Yii::$app->params array
     * @param Application $app the application currently running
     */

    public function bootstrap($app) {

        // Get settings from database
        $sql = $this->db->createCommand("SELECT slug FROM core_themes WHERE `active` = 1 LIMIT 1");
        $result = $sql->queryOne();

        if ($result) {
            $themeSlug = $result['slug'];
            Yii::$app->set('view',
                [
                    'class' => 'yii\web\View',
                    'theme' => [
                        'basePath' => '@app/themes/basic' . $themeSlug,
                        'baseUrl' => '@web/themes/' . $themeSlug,
                        'pathMap' => [
                            '@app/modules' => '@app/themes/' . $themeSlug . '/modules',
                        ],
                    ]
                ]
            );

            Yii::$app->set('urlManager',
                [
                    'class' => 'yii\web\UrlManager',
                    'enablePrettyUrl' => true,
                    'showScriptName' => false,
                    'rules' => require(__DIR__ . '/../../themes/' . $themeSlug . '/config/urls.php'),
                ]
            );
        }

    }

}
