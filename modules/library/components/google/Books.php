<?php
/**
 * @copyright Copyright 
 * @license https://github.com/
 * @link https://github.com/
 */
namespace app\modules\library\components\google;

use yii\base\Exception;

/**
 * Yii stripe component.
 *
 * @author Uriah M. Clemmer IV <uriah@nihil.co>
 */
class Books extends \yii\base\Component {

    /**
     * @see Stripe
     * @var string mode
     */
    public $api_key;

    /**
     * @see Stripe
     * @var array Stripe's test keys
     */
    public $base_url;

    /**
     * @see Init extension default
     */
    public function init() {

        if(!$this->api_key) {
            throw new Exception("Google Books API key is not set.");
        } elseif (!$this->base_url) {
            throw new Exception("Google Books Base URL is not set.");
        }
    }

}