<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="row">
    <div class="col-md-8 well well-lg">
        <h3><?= __('All Products For Biding Now') ?></h3>
        <tbody class="col-md-12 row">
            <?php foreach ($products as $product): ?>
				<ul class="col-md-3 col-md-offset-1 list-group text-center">
					<li><?php echo $this->Html->image("Products/$product->image_url", array('url' => array('controller' => 'Products', 'action' => 'view', $product->id), 'class' => 'col-md-12', 'height' => '200px', 'data-toggle' => 'tooltip', 'title' => $product->name)); ?></li>
					<li data-toggle="tooltip" title="<?= h($product->name) ?>"><?php echo substr($product->name,0,10); ?>...</li>
					<li>$<?= $this->Number->format($product->base_price) ?></li>
				</ul>
            <?php endforeach; ?>
        </tbody>
		<div class="col-md-12">
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
    <div class="col-md-4">
        <div class="col-md-12">
            <h3><?= __('Categories List ') ?></h3>
            <table class="table table-bordered table-hover">
                <?php foreach ($query as $k):?>
                    <tr>
                        <td><?php echo $this->Html->link($k->name, ['controller' => 'Products', 'action' => 'categorydetail', $k->id]); ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <div class="col-md-12 well well-lg">
            <h3><?= __('Top Bids ') ?></h3>
                <?php foreach ($query2 as $pro): ?>
                    <?php echo $pro->name;
                    ?>
                <?php endforeach; ?>
        </div>
    </div>
</div>
