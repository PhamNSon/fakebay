<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class = "container">
		<h3><?= h($a->name) ?></h3>
        <div class="col-md-12 well well-lg">
            <h4><?= __('Description') ?></h4>
            <?= $this->Text->autoParagraph(h($a->description)); ?>
        </div>
        <div class="col-md-12">
            <h4><?= __('Products list') ?></h4>
                <?php foreach ($list as $product): ?>
					<ul class="col-md-4 list-group text-center">
					<li><?php echo $this->Html->image("Products/$product->image_url", array('url' => array('controller' => 'Products', 'action' => 'view', $product->id), 'class' => 'col-md-12', 'height' => '200px', 'data-toggle' => 'tooltip', 'title' => $product->name)); ?></li>
						<li><?= h($product->name) ?></li>
						<li><?= $this->Number->format($product->base_price) ?></li>
					</ul>
                    <?php endforeach; ?>
        </div>
		<div class="col-md-offset-4">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
        </div>
    </div>
</div>