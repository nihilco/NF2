<?php
/**
 * @copyright Copyright 
 * @license https://github.com/
 * @link https://github.com/
 */
namespace app\modules\ecom\components\stripe;

use yii\base\Exception;

/**
 * Yii stripe component.
 *
 * @author Uriah M. Clemmer IV <uriah@nihil.co>
 */
class Stripe extends \yii\base\Component {

    /**
     * @see Stripe
     * @var string mode
     */
    public $mode;

    /**
     * @see Stripe
     * @var array Stripe's test keys
     */
    public $test;

    /**
     * @see Stripe
     * @var string Stripe's live keys
     */
    public $live;

    //
    public $balance;
    public $customer;
    public $account;
    public $charge;
    
    /**
     * @see Init extension default
     */
    public function init() {

        if($this->mode == "live") {
            if(!$this->live['publishableKey']) {
                throw new Exception("Stripe's live publishable key is not set.");
            } elseif (!$this->live['secretKey']) {
                throw new Exception("Stripe's live secret key is not set.");
            }
        } else {
            if(!$this->test['publishableKey']) {
                throw new Exception("Stripe's test publishable key is not set.");
            } elseif (!$this->test['secretKey']) {
                throw new Exception("Stripe's test secret key is not set.");
            }
        }

        //
        $this->balance = new Balance();
        $this->customer = new Customer();
        $this->account = new Account();
        $this->charge = new Charge();
        
        parent::init();
    }

    public function process() {

        try {
            // Use Stripe's library to make requests...
        } catch(\Stripe\Error\Card $e) {
            // Since it's a decline, \Stripe\Error\Card will be caught
            $body = $e->getJsonBody();
            $err  = $body['error'];

            print('Status is:' . $e->getHttpStatus() . "\n");
            print('Type is:' . $err['type'] . "\n");
            print('Code is:' . $err['code'] . "\n");
            // param is '' in this case
            print('Param is:' . $err['param'] . "\n");
            print('Message is:' . $err['message'] . "\n");
            throw new CardException($e);
        } catch (\Stripe\Error\RateLimit $e) {
            // Too many requests made to the API too quickly
            throw new RateLimitException($e);
        } catch (\Stripe\Error\InvalidRequest $e) {
            // Invalid parameters were supplied to Stripe's API
            throw new InvalidRequestException($e);
        } catch (\Stripe\Error\Authentication $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            throw new AuthenticationException($e);
        } catch (\Stripe\Error\ApiConnection $e) {
            // Network communication with Stripe failed
            throw new ApiConnectionException($e);
        } catch (\Stripe\Error\Base $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
            throw new BaseException($e);
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            throw $e;
        }

    }

    public function getPublishableKey()
    {
        return $this->{$this->mode}['publishableKey'];
    }

    public function getSecretKey()
    {
        return $this->{$this->mode}['secretKey'];
    }
}