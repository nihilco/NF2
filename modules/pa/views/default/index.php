
<div class="content-wrapper">
  <div class="content-heading">
    Personal Assistant
    <small>How can you help yourself?</small>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="support-default-index">
        <h1><?= $this->context->action->uniqueId ?></h1>
        <p>
          This is the view content for action "<?= $this->context->action->id ?>".
          The action belongs to the controller "<?= get_class($this->context) ?>"
          in the "<?= $this->context->module->id ?>" module.
        </p>
        <p>
          You may customize this page by editing the following file:<br>
          <code><?= __FILE__ ?></code>
        </p>
      </div>
    </div>
  </div>
</div>