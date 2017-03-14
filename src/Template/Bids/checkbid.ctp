<?php
/**
  * @var \App\View\AppView $this
  */
?>
</nav>
<div class="container">
	<legend><h1 class="text-center"><?= __('Total Bids Of This Product') ?></h1></legend>
    <table class="table table-bordered table-hover">
        <tr>
            <th><?= __('User') ?></th>
			<th><?= __('Product') ?></th>
			<th><?= __('Bid Price') ?></th>
			<th><?= __('Bid Date') ?></th>
        </tr>
	<?php foreach ($bids as $bid) : ?>
        <tr>
            <td><?= $this->Html->link($bid->user->name, ['controller' => 'Users', 'action' => 'view', $bid->user->id]) ?></td>
            <td><?= $this->Html->link($bid->product->name, ['controller' => 'Products', 'action' => 'view', $bid->product->id]) ?></td>
			<td>$<?= $this->Number->format($bid->bid_price) ?></td>
			<td><?= h($bid->created) ?></td>
        </tr>
		<?php endforeach; ?>
    </table>
</div>
