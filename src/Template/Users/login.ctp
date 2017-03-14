<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
	<div class="col-md-12">
		<?= $this->Flash->render('auth') ?>
		<?= $this->Form->create() ?>
		<fieldset class="col-md-6 col-md-offset-3">
			<legend class="text-center"><h2><?= __('Enter your Email and Password') ?></h2></legend>
			<?= $this->Form->control('email', ['class' => 'form-control']) ?>
			<div class="col-md-12"><br/></div>
			<?= $this->Form->control('password', ['class' => 'form-control']) ?>
		</fieldset>
	</div>
	<div class="col-md-12"><br/></div>
	<div class="col-md-12">
		<?= $this->Form->button(__('Login'), ['class' => 'col-md-offset-5 btn btn-default form-group']); ?>
		<?= $this->Form->button(__('Reset'), ['type' => 'reset', 'class' => 'btn btn-default form-group']); ?>
		<?= $this->Form->end() ?>
	</div>
</div>
