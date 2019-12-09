<div class="container">
 
  <div class="panel panel-default">
  <div class="panel-heading">
    <h4>Edit a Product</h4>
  </div>
  </div>

  <form class="form-horizontal well" action="" method="post" enctype="multipart/form-data">
  <br>
      <fieldset>

      <div class="form-group">
        <label for="productid" class="col-lg-2 control-label">ID</label>
        <div class="col-lg-10">
        	<input name="id" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php echo $result[0]->fld_product_num ?>" readonly>
        </div>
      </div>
      <div class="form-group">
        <label for="productpname" class="col-lg-2 control-label">Name</label>
        <div class="col-lg-10">
          <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php echo $result[0]->fld_product_name ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="productprice" class="col-lg-2 control-label">Price</label>
        <div class="col-lg-10">
          <input name="price" type="number" class="form-control" id="productprice" placeholder="0.00" min="0.0" step="0.01" value="<?php echo $result[0]->fld_product_price ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="productbrand" class="col-lg-2 control-label">Brand</label>
        <div class="col-lg-10">
          <select name="brand" class="form-control" id="productbrand" required>
            <option value="">Please select</option>
            <?php foreach ($brands as $brand): ?>
            <?php if ($result[0]->fld_product_brand == $brand->fld_brand_id) { ?>
            <option value="<?php echo $brand->fld_brand_id?>" selected><?php echo $brand->fld_brand_name?></option>
            <?php } else { ?>
            <option value="<?php echo $brand->fld_brand_id?>"><?php echo $brand->fld_brand_name?></option>
            <?php } ?>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="productcond" class="col-lg-2 control-label">Condition</label>
        <div class="col-lg-10">
          <div class="radio">
              <label>
              <input name="cond" type="radio" id="productcond" value="New" <?php if ($result[0]->fld_product_condition == "New") echo "checked"; ?>> New
            </label>
          </div>
          <div class="radio">
              <label>
                <input name="cond" type="radio" id="productcond" value="Used" <?php if ($result[0]->fld_product_condition == "Used") echo "checked"; ?>> Used
            </label>
            </div>
        </div>
      </div>
      <div class="form-group">
        <label for="productyear" class="col-lg-2 control-label">Manufacturing Year</label>
        <div class="col-lg-10">
          <select name="year" class="form-control" id="productyear" required>
            <option value="">Please select</option>
            <?php for ($i=2000; $i<date("Y"); $i++) { ?>
            <?php if ($result[0]->fld_product_year == $i) { ?>
            <option value="<?php echo $i ?>" selected><?php echo $i ?></option>
            <?php } else { ?>
            <option value="<?php echo $i ?>"><?php echo $i ?></option>
            <?php } ?>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="productquantity" class="col-lg-2 control-label">Quantity</label>
        <div class="col-lg-10">
          <input name="quantity" type="number" class="form-control" id="productquantity" placeholder="Product Quantity" min="1" step="1" value="<?php echo $result[0]->fld_product_price ?>" required>
        </div>
      </div>
      <div class="form-group">
        <label for="productquantity" class="col-lg-2 control-label">Image</label>
        <div class="col-lg-10">
          <?php echo $result[0]->fld_product_image ?> <input name="image" type="file" id="productimage">
          <input type="hidden" name="existingimage" value="<?php echo $result[0]->fld_product_image ?>">
        </div>
      </div>

      <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
        	<input type="hidden" name="form-submitted" value="edit" />
          <button type="reset" class="btn btn-primary">Clear</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </fieldset>
  </form>

</div>