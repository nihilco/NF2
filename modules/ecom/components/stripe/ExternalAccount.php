<?php

namespace app\modules\ecom\components\stripe;

class BankAccount
{
    public $_bankAccount;

    public function BankAccount()
    {
    }

    public function getBankAccount($baid)
    {
        try {
            // Use Stripe's library to make requests...
            \Stripe\Stripe::setApiKey(\Yii::$app->stripe->{\Yii::$app->stripe->mode}['secretKey']);
            $this->_bankAccount = \Stripe\BankAccount::retrieve($baid);
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
            throw new CardException($e->getMessage());
        } catch (\Stripe\Error\RateLimit $e) {
            // Too many requests made to the API too quickly
            throw new RateLimitException($e->getMessage());
        } catch (\Stripe\Error\InvalidRequest $e) {
            // Invalid parameters were supplied to Stripe's API
            throw new InvalidRequestException($e->getMessage());
        } catch (\Stripe\Error\Authentication $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            throw new exceptions\AuthenticationException($e->getMessage());
        } catch (\Stripe\Error\ApiConnection $e) {
            // Network communication with Stripe failed
            throw new ApiConnectionException($e->getMessage());
        } catch (\Stripe\Error\Base $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
            throw new BaseException($e->getMessage());
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            throw $e;
        }

        return $this->_account;
    }

    public function createAccount($email, $country = 'US', $managed = true)
    {
        try {
            // Use Stripe's library to make requests...
            \Stripe\Stripe::setApiKey(\Yii::$app->stripe->{\Yii::$app->stripe->mode}['secretKey']);
            $a = array(
                "email" => $email,
                "country" => $country,
                "managed" => ($managed) ? 'true' : 'false',
            );
            $this->_account = \Stripe\Account::create($a);
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
            throw new exceptions\CardException($e->getMessage());
        } catch (\Stripe\Error\RateLimit $e) {
            // Too many requests made to the API too quickly
            throw new exceptions\RateLimitException($e->getMessage());
        } catch (\Stripe\Error\InvalidRequest $e) {
            // Invalid parameters were supplied to Stripe's API
            throw new exceptions\InvalidRequestException($e->getMessage());
        } catch (\Stripe\Error\Authentication $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
            throw new exceptions\AuthenticationException($e->getMessage());
        } catch (\Stripe\Error\ApiConnection $e) {
            // Network communication with Stripe failed
            throw new exceptions\ApiConnectionException($e->getMessage());
        } catch (\Stripe\Error\Base $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
            throw new exceptions\BaseException($e->getMessage());
        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
            throw $e;
        }

        return $this->_account;
    }
    
}