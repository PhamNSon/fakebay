<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
    <?= $this->Form->create($products, ['type' => 'file']) ?>
    <div class="form-group">
        <legend><?= __('Add New Product') ?></legend>
        <div class="form-group">
            <label>Name</label>
            <input class="form-control" type="text" name="name" />
        </div>
        <div class="form-group">
            <label>Base Price</label>
            <input class="form-control" type="text" name="base_price" />
        </div>
        <div class="form-group">
            <label>End Date</label>
            <div class='input-group date' id='datetimepicker1'>
                <input type="text" class="form-control" name="bid_end" />
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                </span>
            </div>
        </div>
        <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category_id">
                <?php foreach ($query as $category): ?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input class="form-control" type="file" name="image_url">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="desciption" rows="5"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="col-md-offset-5 btn btn-default" value="Submit"></input>
			<input type="reset" class=" btn btn-default" value="Reset"></input>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'en',
      format: "yyyy-mm-dd hh:ii:ss"
    });
  });
</script>
