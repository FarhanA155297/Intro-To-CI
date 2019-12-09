<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>List of Products</h4>
		</div>
	</div>
	  <div class="row">
    <div class="col-md-2 col-xs-12"><a class="btn btn-success btn-mini col-md-12 col-xs-12" href="<?=base_url('product/create')?>">Add New &nbsp;<i class="glyphicon glyphicon-plus"></i></a></div>
    <div class="col-md-2  col-xs-12">&nbsp;</div>
    <div class="col-md-8 col-xs-12">
      <form action="<?=base_url('product/search')?>" method="post" style="display: inline;">
        <div class="col-md-10 col-xs-12">
        <input class="form-control col-md-12 col-xs-12" id="keyword_id" name="keyword" placeholder="Search for a product" type="text" />
        </div>
        <div class="col-md-2 col-xs-12">
        <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger col-md-12 col-xs-12" value="Search" />
        </div>
      </form>
    </div>
  </div>
	<br>
	<table class="table table-bordered table-hover">
		<tr bgcolor="#f5f5f5">
			<th class="col-md-1"></th>
			<th class="col-md-2">Product Number</th>
			<th class="col-md-6">Product Name</th>
			<th class="col-md-2">Price</th>
			<th class="col-md-1">Quantity</th>
		</tr>
		<?php if (count($results) <> 0) { ?>
		<?php foreach ($results as $key=>$value) { ?>
		<tr>
			<td align="center">
			<div class="btn-group btn-group-xs" role="group">
				<button type="button " class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-th-list"></i>
				<span class="caret"></span>
				</button>
				<ul class="dropdown-menu">
				<li><a href="<?=base_url('product/detail/'.$value->fld_product_num); ?>">Details</a></li>
				<li role="separator" class="divider"></li>
				<li><a href="<?=base_url('product/edit/'.$value->fld_product_num); ?>">Edit</a></li>
				<li><a href="<?=base_url('product/delete/'.$value->fld_product_num); ?>">Delete</a></li>
				</ul>
			</div>
			</td>

			<td><?php echo $value->fld_product_num; ?></td>
			<td><?php echo $value->fld_product_name; ?></td>
			<td><?php echo $value->fld_product_price; ?></td>
			<td><?php echo $value->fld_product_quantity; ?></td>
		</tr>

		<?php } ?>
		<?php } else { ?>
		<tr>
		<td align="center" colspan="5">No product found.</td>
		</tr>
		<?php } ?>
		</table>
		<h5><b><?php echo $total ?> record(s) found.</b></h5>
		</div>