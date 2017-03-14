<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="">
    <div class="col-md-12">
		<div class="col-md-offset-1"><legend><h1><?= __('Product Detail') ?></h1></legend></div>
		<div><?php echo $this->Html->image("Products/$product->image_url", array('class' => 'col-md-3', 'data-toggle' => 'tooltip', 'title' => $product->name)); ?></div>
        <div class="col-md-4">
			<table class = "table table-bordered">
				<input type="text" id="pro_id" name="product_id" class="hidden" value="<?= h($product->id) ?>" />
				<tr>
					<td><?= __('Name') ?></td>
					<td><b><?= h($product->name) ?></b></td>
				</tr>
				<tr>
					<td><?= __('Seller') ?></td>
					<td><b><?php echo $this->Html->link($product->user->name, array('controller' => 'Users', 'action' => 'view', $product->user->id)); ?></b></td>
				<tr>
				<tr>
					<td><?= __('Base Price') ?></td>
					<td><b><input id="baseprice" value="<?= $this->Number->format($product->base_price) ?>" hidden />$<?= $this->Number->format($product->base_price) ?></b></td>
				</tr>
				<tr>
					<td><?= __('Current Bid') ?></td>
					<td><b><input id="bidprice" value="<?php if($count != '0') { echo $maxbids->bid_price; }else { echo $product->base_price; } ?>" hidden />$<?php if($count != '0') { echo $maxbids->bid_price; }else { echo $product->base_price; } ?></b></td>
				</tr>
				<tr>
					<td><?= __('Time Out') ?></td>
					<td><b id="timeout"></b></td>
				</tr>
				<tr>
					<td><?= __('Bid End') ?></td>
					<td><b><input type="datetime" hidden id="timeend" class="text-center" value="<?= h($product->bid_end) ?>" /><?= h($product->bid_end) ?></b></td>
				</tr>
				<tr>
					<td><h4><?= __('Desciption') ?></h4></td>
					<td><b><?= $this->Text->autoParagraph(h($product->desciption)); ?></b>
					</td>
				</tr>
			</table>
			<div class="col-md-11 col-md-offset-1">
				<input type="text" id="bidvalu" name="bid_price" />
				<button id="sendbid" class="col-md-offset-1 btn btn-default">Place Bid</button>
				<p>Enter $<?php if($count != '0') { echo $maxbids->bid_price; }else { echo $product->base_price; } ?> or more!</p>
			</div>
			<div class="col-md-8 col-md-offset-4">
				<button id="popup" onclick="div_show()" class="btn btn-default">Ask a Question</button>
			</div>
		</div>
		<div class="col-md-3 well">
			<div class=""><h1><?= __('Recent Bids') ?></h1></div>
			<div class="col-md-12">
				<?php foreach ($test as $test1) : ?>
					<ul class=" list-group">
						<li>$<?= h($test1->bid_price) ?></li>
						<li><?= h($test1->created) ?></li>
						<li style="font-style: italic;">By <?= h($test1->user->name) ?></li>
					</ul>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
    <div class="col-md-12">
        <div class="col-md-offset-1"><legend><h3><?= __('Related Products') ?></h3></legend></div>
		<div class="col-md-12 well">
			<?php foreach ($query1 as $query): ?>
				<ul class="col-md-2 list-group text-center">
					<li><?php echo $this->Html->image("Products/$query->image_url", array('url' => array('controller' => 'Products', 'action' => 'view', $query->id), 'class' => 'col-md-12', 'height' => '100px', 'data-toggle' => 'tooltip', 'title' => $product->name)); ?></li>
					<li><?= h($query->name) ?></li>
					<li><?= $this->Number->format($query->base_price) ?></li>
				</ul>
            <?php endforeach; ?>
		</div>
    </div>
</div>
<div id="showpop">
<!-- Popup Div Starts Here -->
	<div id="popupDetail">
		<form action="" id="form" method="post" class="col-md-8 formboder">
			<img id="close" src="../../img/Other/close.png" onclick ="div_hide()">
			<div id="showSuccess" style="display:none">Question Sent</div>
			<legend><h2>Message</h2></legend>
			<div class="col-md-12 form-group">
				<label>To Seller</label>
				<input type="text" class="form-control" value="<?= $product->user->name ?>" readonly />
			</div>
			<div class="col-md-12 form-group">
				<label>Product</label>
				<input type="text" class="form-control" value="<?= $product->name ?>" readonly />
			</div>
			<div class="col-md-12 form-group hidden">
				<input id="name1" name="to_user_id" type="text" class="form-control" value="<?= $product->user->id ?>" readonly />
			</div>
			<div class="col-md-12 form-group hidden">
				<input id="pro1" name="product_id" type="text" class="form-control" value="<?= $product->id ?>" readonly />
			</div>
			<div class="col-md-12 form-group">
				<label>Message</label>
				<textarea id="msg1" name="message" placeholder="Message" class="form-control col-md-12" rows="5"></textarea>
			</div>
			<div>
				<a href="" class="btn btn-default col-md-offset-4 send">Send Question</a>
			<div>
		</form>
	</div>
</div>

<!-- Script to send Bid value -->
<script type="text/javascript">
$(function() {
	$("#sendbid").click(function(event){
		var bidval = $('#bidvalu').val();
		var pr_id = $('#pro_id').val();
		var curval = $('#bidprice').val();
		var currentvalue = parseFloat(curval);
		var bidvalues = parseFloat(bidval);
		if (currentvalue < bidvalues) {
			$.ajax({
			type: 'POST',
			url: '/fakebay/Bids/sentbid',
			data :
				{ 
				'bid_price' : bidvalues,
				'product_id' : pr_id
				},
			error:function(msg){
				alert('Sending...!');
			},
			});
		}else {
			alert('Please Enter Bigger Value!')
		};
	});
});
</script>

<!-- Function To Display/Hide Popup -->
<script>
function div_show() {
	document.getElementById('showpop').style.display = "block";
}
function div_hide(){
	document.getElementById('showpop').style.display = "none";
}
</script>

<!-- Script send question -->
<script type="text/javascript">
$(function() {
	$(".send").click(function(event){
		var dataString = $('#form').serialize();
		if(confirm("Are you sure to send this question?")) {
			$.ajax({
			type: 'POST',
			url: '/fakebay/Question/sendmess',
			data : dataString,
			error:function(msg){
				alert('Sending...!');
			},
			});
		}
		return false;
	});
});
</script>

<!-- Script show time count down -->
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
		$("#bidvalu").prop('disabled',true);
    }
}, 1000);
</script>
