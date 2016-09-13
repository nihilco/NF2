<?php
/**
 * @copyright Copyright Victor Demin, 2014
 * @license https://github.com/ruskid/yii2-stripe/LICENSE
 * @link https://github.com/ruskid/yii2-stripe#readme
 */
namespace app\modules\ecom\components\stripe;

use Yii;
use yii\helpers\Html;
use yii\web\JsExpression;

/**
 * Yii stripe custom form.
 * https://stripe.com/docs/tutorials/forms
 *
 * @author Victor Demin <demmbox@gmail.com>
 */
class StripeForm extends \yii\widgets\ActiveForm {
    /**
     * @see Stripe's javascript location
     * @var string url to stripe's javascript
     */
    public $stripeJs = 'https://js.stripe.com/v2/';

    /**
     * Js Expression that will handle the response.
     *
     * If not set the default behavior will be used:
     * function stripeResponseHandler(status, response) {
     *      var $form = $('#payment-form');
     *        if (response.error) {
     *           // Show the errors on the form
     *           $form.find('.payment-errors').text(response.error.message);
     *           $form.find('button').prop('disabled', false);
     *        } else {
     *           // response contains id and card, which contains additional card details
     *           var token = response.id;
     *           // Insert the token into the form so it gets submitted to the server
     *           $form.append($('<input type="hidden" name="stripeToken" />').val(token));
     *           // and submit
     *           $form.get(0).submit();
     *        }
     * }
     *
     * @var JsExpression
     */
    public $stripeResponseHandler;

    /**
     * Js Expression that will handle the request.
     *
     * If not set the default behavior will be used:
     * jQuery(function($) {
     *    $('#payment-form').submit(function(event) {
     *         var $form = $(this);
     *         // Disable the submit button to prevent repeated clicks
     *         $form.find('button').prop('disabled', true);
     *          Stripe.card.createToken($form, stripeResponseHandler);
     *          // Prevent the form from submitting with the default action
     *          return false;
     *      });
     *   });
     *
     * @var JsExpression
     */
    public $stripeRequestHandler;
    /**
     * Input id and name tags of the hidden token input that will be sent to PayAction.
     * @var string
     */
    public $tokenInputName = 'stripeToken';
    /**
     * If the default behavior for the response is used, then you can set the id of error's container.
     * Note! this property is useless if you set your own response handler.
     * @var string
     */
    public $errorContainerId = "payment-errors";
    /**
     * Apply Jquery Payment format to the inputs
     * @see https://github.com/stripe/jquery.payment.
     * @var boolean
     */
    public $applyJqueryPaymentFormat = true;
    /**
     * Perform Jquery Payment client validation.
     * @var boolean
     */
    public $applyJqueryPaymentValidation = true;
    /**
     * Class applied to .form-group when Jquery Payment Validation didn't pass
     * @var string
     */
    public $errorClass = 'has-error';
    /**
     * Brand container used when Jquery Payment identify the brand by card number
     * @var string
     */
    public $brandContainerId = 'cc-brand';
    //Stripe constants
    const NUMBER_ID = 'number';
    const CVC_ID = 'cvc';
    const EXP_ID = 'exp';
    const NAME_ID = 'name';
    const POSTAL_CODE_ID = 'address-zip';
    //Autofill spec. @see https://html.spec.whatwg.org/multipage/forms.html
    const AUTO_CC_ATTR = 'cc-number';
    const AUTO_EXP_ATTR = 'cc-exp';
    const AUTO_NAME_ATTR = 'cc-name';
    const AUTO_POSTAL_CODE_ATTR = 'cc-postal-code';
    
    /**
     * @see Init extension default
     */
    public function init() {
        parent::init();
        //Set default response behavior
        if (!isset($this->stripeResponseHandler)) {
                        $this->stripeResponseHandler = 'function stripeResponseHandler(status, response) {
alert("Stripe Responce Handler");
                    var $form = $("#' . $this->options['id'] . '");
                    if (response.error) {
                        $form.find("#' . $this->errorContainerId . '").text(response.error.message);
                        $form.find("button").prop("disabled", false);
                    } else {
                        var token = response.id;
                        $form.append($("<input type=\"hidden\" name=\"' . $this->tokenInputName . '\" id=\"' . $this->tokenInputName . '\" />").val(token));
                        $form.get(0).submit();
                    }
            };';
        }
        //Set default request behavior when no client validation applied
        if (!isset($this->stripeRequestHandler)) {
                        $this->stripeRequestHandler = 'jQuery(function($) {
                $("#' . $this->options['id'] . '").submit(function(event) {
                    event.preventDefault();
                    
                    alert("Submit");
              
                    var $form = $(this);
                    // Disable the submit button to prevent repeated clicks
                    $form.find(\'button\').prop(\'disabled\', true);
               
                    Stripe.card.createToken($form, stripeResponseHandler);
                    
                    // Prevent the form from submitting with the default action
                    return false;
                });
            });';
        }
    }
    /**
     * Will show the Stripe's simple form modal
     */
    public function run() {
        parent::run();
        $this->registerFormScripts();
        if ($this->applyJqueryPaymentFormat || $this->applyJqueryPaymentValidation) {
            $this->registerJqueryPaymentScripts();
        }
    }
    /**
     * Will register mandatory javascripts to work
     */
    public function registerFormScripts() {
        $view = $this->getView();
        $view->registerJsFile($this->stripeJs, ['position' => \yii\web\View::POS_HEAD]);
        $js = "Stripe.setPublishableKey('" . Yii::$app->stripe->getPublishableKey() . "');";
        $view->registerJs($js, \yii\web\View::POS_BEGIN);
        //form scripts
        $view->registerJs($this->stripeResponseHandler, \yii\web\View::POS_READY);
        $view->registerJs($this->stripeRequestHandler, \yii\web\View::POS_READY);
    }
    /**
     * Will register Jquery Payment scripts
     */
    public function registerJqueryPaymentScripts() {
        $view = $this->getView();
        JqueryPaymentAsset::register($view);
        if ($this->applyJqueryPaymentFormat) {
                        $js = "jQuery(function($) {
                $('input[data-stripe=" . self::NUMBER_ID . "]').payment('formatCardNumber');
                $('input[data-stripe=" . self::CVC_ID . "]').payment('formatCardCVC');
                $('input[data-stripe=" . self::EXP_ID . "]').payment('formatCardExpiry');
                $('input[data-stripe=" . self::NAME_ID . "]').payment('formatCardName');
                $('input[data-stripe=" . self::POSTAL_CODE_ID . "]').payment('formatCardPostalCode');
            });";
                        $view->registerJs($js);
        }
        //Jquery client validation submit
        if ($this->applyJqueryPaymentValidation) {
                        $js = 'jQuery(function($) {
                $.fn.toggleInputError = function(erred) {
                    this.closest(".form-group").toggleClass("' . $this->errorClass . '", erred);
                    return this;
                };
                $("#' . $this->options['id'] . ' button").on("click", function(e) {
                    var $form = $("#' . $this->options['id'] . '");
                    var $number = $("input[data-stripe=' . self::NUMBER_ID . ']");
                    var $cvc = $("input[data-stripe=' . self::CVC_ID . ']");
                    var $exp = $("input[data-stripe=' . self::EXP_ID . ']");
                    var $exp = $("input[data-stripe=' . self::NAME_ID . ']");
                    var $exp = $("input[data-stripe=' . self::POSTAL_CODE_ID . ']");
                    var cardType = $.payment.cardType($number.val());
                    $("#' . $this->brandContainerId . '").text(cardType);
                    $number.toggleInputError(!$.payment.validateCardNumber($number.val()));
                    $cvc.toggleInputError(!$.payment.validateCardCVC($cvc.val(), cardType));
                    if ($exp.length) {
                        $exp.toggleInputError(!$.payment.validateCardExpiry($exp.payment("cardExpiryVal")));
                        var fullDate = $exp.val();
                        var res = fullDate.split(" / ", 2);
                        $month.val(res[0]);
                        $year.val(res[1]);
                    }else{
                        $month.toggleInputError(!$.payment.validateCardExpiry($month.val(), $year.val()));
                        $year.toggleInputError(!$.payment.validateCardExpiry($month.val(), $year.val()));
                    }
                    if($form.find(".' . $this->errorClass . '").length != 0){
                        e.preventDefault();
                        return false;
                    }else{
                        $(this).prop("disabled", true);
                        Stripe.card.createToken($form, stripeResponseHandler);
                        return true;
                    }
                });
            });';
                        $view->registerJs($js);
        }
    }
    /**
     * Will generate card number input
     * @param array $options
     * @return string genetared input tag
     */
    public function numberInput($options = []) {
        $defaultOptions = [
            'id' => self::NUMBER_ID,
            'class' => 'form-control',
            'autocomplete' => self::AUTO_CC_ATTR,
            'placeholder' => '•••• •••• •••• ••••',
            'required' => true,
            'type' => 'tel',
            'size' => 20
        ];
        $mergedOptions = array_merge($defaultOptions, $options);
        StripeHelper::secCheck($mergedOptions);
        $mergedOptions['data-stripe'] = self::NUMBER_ID;
        return Html::input('text', null, null, $mergedOptions);
    }

    /**
     * Will generate cvc input
     * @param array $options
     * @return string genetared input tag
     */
    public function cvcInput($options = []) {
        $defaultOptions = [
            'id' => self::CVC_ID,
            'class' => 'form-control',
            'autocomplete' => 'off',
            'placeholder' => '•••',
            'required' => true,
            'type' => 'tel',
            'size' => 4
        ];
        $mergedOptions = array_merge($defaultOptions, $options);
        StripeHelper::secCheck($mergedOptions);
        $mergedOptions['data-stripe'] = self::CVC_ID;
        return Html::input('text', null, null, $mergedOptions);
    }

    /**
     * Will generate month and year input with 2 hidden inputs for month and year values.
     * @param array $options
     * @return string genetared input tag
     */
    public function expInput($options = []) {
               $defaultOptions = [
                   'id' => self::EXP_ID,
                   'class' => 'form-control',
                   'autocomplete' => self::AUTO_EXP_ATTR,
                   'placeholder' => 'MM / YY',
                   'required' => true,
                   'type' => 'tel',
               ];
               $mergedOptions = array_merge($defaultOptions, $options);
               StripeHelper::secCheck($mergedOptions);
               $mergedOptions['data-stripe'] = self::EXP_ID;
               $inputs = Html::input('text', null, null, $mergedOptions);
               return $inputs;
    }

    /**
     * Will generate name input
     * @param array $options
     * @return string genetared input tag
     */
    public function nameInput($options = []) {
        $defaultOptions = [
            'id' => self::NAME_ID,
            'class' => 'form-control',
            'autocomplete' => 'off',
            'placeholder' => 'John P. Smith',
            'required' => true,
            'type' => 'text',
            'size' => 30
        ];
        $mergedOptions = array_merge($defaultOptions, $options);
        StripeHelper::secCheck($mergedOptions);
        $mergedOptions['data-stripe'] = self::NAME_ID;
        return Html::input('text', null, null, $mergedOptions);
    }

    /**
     * Will generate zipcode input
     * @param array $options
     * @return string genetared input tag
     */
    public function postalCodeInput($options = []) {
        $defaultOptions = [
            'id' => self::POSTAL_CODE_ID,
            'class' => 'form-control',
            'autocomplete' => 'off',
            'placeholder' => '90210',
            'required' => true,
            'type' => 'tel',
            'size' => 5
        ];
        $mergedOptions = array_merge($defaultOptions, $options);
        StripeHelper::secCheck($mergedOptions);
        $mergedOptions['data-stripe'] = self::POSTAL_CODE_ID;
        return Html::input('text', null, null, $mergedOptions);
    }
}