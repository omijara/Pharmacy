<?php
//session_start();
require_once('user_role.php');
require_once('class/main.php');
$obj = new Model;
$product_cat = $obj->show_category();

 if(isset($_GET['editId']) && !empty($_GET['editId'])) {
      $userId= $_GET['editId'];
      $data= $obj->display_product_data($userId);
  }


?>
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<div class="col-md-11">
<h5 class="card-header">প্রোডাক্ট এডিট</h5>
<!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
<div class="card-body">

  <form class="form-row" id="register_form" action="form_insert.php" method="post">
  <input type="hidden" name="id" value="<?php echo $data['product_id']; ?>">
  
  <div class="form-group col-md-6">
  <label for="name">প্রোডাক্ট এর নাম<span class="text-danger">*</span></label>
  <input type=text value="<?php echo $data['product_name']; ?>" placeholder="Enter Customer name" id="name"
  class="form-control " name="p_name" min="0" max="" required>
  <small class="help-text text-muted">অনুগ্রহ করে প্রোডাক্ট এর নাম লিখুন.</small>
  </div>

      <div class="form-group col-md-6">
    <label for="name">ক্যাটাগরী<span class="text-danger">*</span></label>
    <select class="name form-control" id="driver" name="c_name" required>
    <option><?php echo $data['cat_name']; ?></option>
    <?php while ($row = mysqli_fetch_assoc($product_cat)): ?>
      <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></option>
    <?php endwhile; ?>
    </select>
    <small class="help-text text-muted">Please select your project name. Example: Sabur Khan</small>
    </div> 

  <div class="col-12">
  <div class="float-right">
  <button type="submit" name="p_update" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Update</button>
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