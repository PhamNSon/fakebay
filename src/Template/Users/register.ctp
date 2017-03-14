<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-md-6 col-md-offset-3">
	<?= $this->Flash->render('auth') ?>
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend class="text-center"><?= __('Register Form') ?></legend>
        <?php
            echo $this->Form->control('email', ['class' => 'form-control']);
            echo $this->Form->control('password', ['class' => 'form-control']);
            echo $this->Form->control('name', ['class' => 'form-control']);
            echo $this->Form->control('status', ['label' => "If you agree with shop's rules, please tick here!", 'required' => 'required']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'), ['class' => 'col-md-offset-4 btn btn-default form-group']) ?>
	<?= $this->Form->button(__('Reset'), ['type' => 'reset', 'class' => 'btn btn-default form-group']) ?>
    <?= $this->Form->end() ?>
</div>
