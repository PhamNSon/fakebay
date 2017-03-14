<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
	<legend><?= __('Informations') ?></legend>
    <div class="col-md-12">
		<div><?= __('Name: ') ?><?= h($user->name) ?> </div>
        <div><?= __('Email: ') ?><?= h($user->email) ?></div>
		<div class="col-md-offset-10"><?php echo $this->Html->link($this->Form->button('Add new Product', ['class' => 'btn btn-success']), array('controller' => 'Products', 'action' => 'add'), array('escape'=>false)); ?></div>
    </div>
    <div class="col-md-12">
        <legend><?= __('Related Products') ?></legend>
        <?php if (!empty($user->products)): ?>
        <table class="table table-hover">
            <tr>
				<th><?= __("Product's ID") ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Current Bid') ?></th>
                <th><?= __('Time Left') ?></th>
				<th class="hidden"><?= __('End Time') ?></th>
                <th><?= __('') ?></th>
            </tr>
            <?php foreach ($user->products as $products): ?>
            <tr>
				<td><?= h($products->id) ?></td>
                <td><?php echo $this->Html->image("Products/$products->image_url", array('width' => '100px', 'height' => '50px', 'data-toggle' => 'tooltip', 'title' => $products->name)); ?></td>
                <td><?= h($products->name) ?></td>
                <td>$<?= h($products->base_price) ?></td>
                <td><b id="timeout"></b></td>
				<td class="hidden"><b><input type="datetime" id="timeend" class="text-center" value="<?= h($products->bid_end) ?>" /></b></td>
                <td class="actions">
					<ul>
						<li><?= $this->Form->postLink(__('Remove'), ['controller' => 'Products', 'action' => 'remove', $products->id], ['confirm' => __('Are you sure you want to delete your product?', $products->id)]) ?></li>
						<li><?= $this->Html->link(__('Show Bids'), ['controller' => 'Bids', 'action' => 'view', $products->id]) ?></li>
					</ul>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="col-md-12">
        <legend><?= __('Related Bids') ?></legend>
        <?php if (!empty($user->bids)): ?>
        <table class="table table-hover">
            <tr class="text-center">
                <th><?= __("User's Id") ?></th>
                <th><?= __("Product's Id") ?></th>
                <th><?= __('Bid Price') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Bid Time') ?></th>
            </tr>
            <?php foreach ($user->bids as $bids): ?>
            <tr>
                <td><?= h($bids->user_id) ?></td>
                <td><?= h($bids->product_id) ?></td>
                <td>$<?= h($bids->bid_price) ?></td>
                <td><?= h($bids->status) ?></td>
                <td><?= h($bids->created) ?></td>
				<td class="actions">
					<ul>
						<li><?= $this->Form->postLink(__('Remove'), ['controller' => 'Bids', 'action' => 'remove', $bids->id], ['confirm' => __('Do you want to delete this question?', $bids->id)]) ?></li>
					</ul>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="col-md-12">
        <legend><?= __('Related Questions') ?></legend>
        <?php if (!empty($ques)): ?>
        <table class="table table-hover">
            <tr>
                <th><?= __("From User's Id") ?></th>
                <th><?= __('Product ID') ?></th>
                <th><?= __('Question') ?></th>
                <th><?= __('Created') ?></th>
            </tr>
            <?php foreach ($ques as $question): ?>
            <tr>
                <td><?= h($question->from_user_id) ?></td>
                <td><?= h($question->product_id) ?></td>
                <td><?= h($question->message) ?></td>
                <td><?= h($question->created) ?></td>
				<td class="actions">
					<ul>
						<li><?= $this->Form->postLink(__('Remove'), ['controller' => 'Question', 'action' => 'remove', $question->id], ['confirm' => __('Do you want to delete this question?', $question->id)]) ?></li>
					</ul>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>

<script>
// Set the date we're counting down to
var endDate = document.getElementById('timeend').value;
var countDownDate = new Date(endDate).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
    document.getElementById("timeout").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";
    
    // If the count down is over, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("timeout").innerHTML = "EXPIRED";
    }
}, 1000);
</script>