<?php
//session_start();
require_once('user_role.php');
require_once('class/main.php');
$obj = new Model;

$product_cat = $obj->show_category();

?>
<div class="content-wrapper">
  <section class="content">
    <div class="container-fluid">
      <div class="col-md-11">
        <h5 class="card-header">Add new product</h5>
        <!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
        <div class="card-body">

          <form class="form-row" id="register_form" action="form_insert.php" method="post">
            <input type="hidden" name="id" value="">

            <div class="form-group col-md-6">
              <label for="name">Product Name<span class="text-danger">*</span></label>
              <input type=text value="" placeholder="Enter Customer name" id="name" class="form-control " name="p_name" min="0" max="" required>
              <small class="help-text text-muted">Please write product name.</small>
            </div>

            <div class="form-group col-md-6">
              <label for="name">Category<span class="text-danger">*</span></label>
              <select class="name form-control" id="driver" name="c_name" required>
                <option></option>
                <?php while ($row = mysqli_fetch_assoc($product_cat)) : ?>
                  <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
                <?php endwhile; ?>
              </select>
              <small class="help-text text-muted">Please select product category.</small>
            </div>

            <div class="form-group col-md-6">
              <label for="name">Product Quantity<span class="text-danger">*</span></label>
              <input type=text value="" placeholder="Enter product quantity" id="" class="form-control " name="quantity" min="0" max="" required>
              <small class="help-text text-muted">Add product quantity.</small>
            </div>
<!--             <div class="form-group col-md-6">
              <label for="name">Unit Price<span class="text-danger">*</span></label>
              <input type=text value="" placeholder="Enter product Price" id="" class="form-control " name="price" min="0" max="" required>

            </div> -->


            <div class="col-12">
              <div class="float-right">
                <button type="submit" name="save_product" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Save</button>
                <a href="javascript: history.go(-1)" type="submit" name="data" class="btn btn-sm btn-secondary"></i> Cancel</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<?php require_once('footer.php'); ?>