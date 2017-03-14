<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bid'), ['action' => 'edit', $bid->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bid'), ['action' => 'delete', $bid->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bid->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Bids'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bid'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bidstatus'), ['controller' => 'Bidstatus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bidstatus'), ['controller' => 'Bidstatus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bids view large-9 medium-8 columns content">
    <h3><?= h($bid->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $bid->has('user') ? $this->Html->link($bid->user->name, ['controller' => 'Users', 'action' => 'view', $bid->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product') ?></th>
            <td><?= $bid->has('product') ? $this->Html->link($bid->product->name, ['controller' => 'Products', 'action' => 'view', $bid->product->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($bid->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bid Price') ?></th>
            <td><?= $this->Number->format($bid->bid_price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($bid->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($bid->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($bid->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Bidstatus') ?></h4>
        <?php if (!empty($bid->bidstatus)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Id Status') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($bid->bidstatus as $bidstatus): ?>
            <tr>
                <td><?= h($bidstatus->id) ?></td>
                <td><?= h($bidstatus->id_status) ?></td>
                <td><?= h($bidstatus->name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Bidstatus', 'action' => 'view', $bidstatus->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Bidstatus', 'action' => 'edit', $bidstatus->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bidstatus', 'action' => 'delete', $bidstatus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bidstatus->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
