<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->context->layout = '@app/modules/core/views/layouts/page';

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>

<div id="map" class="maps" style="height:400px;margin-top: -25px;">

    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d99282.04798518876!2d-84.1562801029297!3d38.95678784781091!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x884111cf622f0df1%3A0x2382a82ce3cfaac!2sTate+Township%2C+OH!5e0!3m2!1sen!2sus!4v1473802793522" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

      <!--<div class="marker-wrapper">
        <div class="marker-icon"></div>
        <div class="marker"></div>
      </div>-->

      <!--<div id="directions">
        <p>Get directions to our office</p>
        <form>
          <div class="form-group">
    <input class="form-control" type="text" placeholder="Write your zip code" />
          </div>
          <button type="submit" class="button button-small">
    <span>Get directions</span>
          </button>
        </form>
      </div>-->
    </div>

    <div id="info">
      <div class="container">
        <div class="row">
          <div class="col-md-12 message">
    <h3>Send us a message</h3>
    <p>
      You can contact us with anything related to the Township and the surrounding area. <br/> We will get in touch with you as soon as possible.
</p>

    <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

        <div class="alert alert-success">
            Thank you for contacting us. We will respond to you as soon as possible.
        </div>

    <?php else: ?>

        <div class="row">
            <div class="col-lg-12">

                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'subject') ?>

                    <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                    <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                        'captchaAction' => '/core/default/captcha',
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>

    <?php endif; ?>
    
      </div>
    </div>
  </div>
  </div>