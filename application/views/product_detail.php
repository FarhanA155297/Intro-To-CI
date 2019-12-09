<div class="container">

<div class="panel panel-primary">
  <div class="panel-heading">
    <h4>Product Information</h4>
  </div>
</div>

<br>

<img src="<?=base_url('images/').$results[0]->fld_product_image; ?>" alt="<?php echo $results[0]->fld_product_name; ?>" class="img-thumbnail">
<br><br>
<div class="list-group">
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Product Number</h4>
    <p class="list-group-item-text"><?php echo $results[0]->fld_product_num; ?></p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Name</h4>
    <p class="list-group-item-text"><?php echo $results[0]->fld_product_name; ?></p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Price</h4>
    <p class="list-group-item-text">RM <?php echo $results[0]->fld_product_price; ?></p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Brand</h4>
    <p class="list-group-item-text"><?php echo $results[0]->fld_product_brand; ?></p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Condition</h4>
    <p class="list-group-item-text"><?php echo $results[0]->fld_product_condition; ?></p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Year</h4>
    <p class="list-group-item-text"><?php echo $results[0]->fld_product_year; ?></p>
  </a>
  <a href="#" class="list-group-item">
    <h4 class="list-group-item-heading">Quantity</h4>
    <p class="list-group-item-text"><?php echo $results[0]->fld_product_quantity; ?></p>
  </a>
  </div>

  <a class="btn btn-primary" href="<?php echo base_url('product'); ?>" role="button">Back to All Products</a>

  </div>