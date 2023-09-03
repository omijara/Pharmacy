<?php
//session_start();
require_once('user_role.php');
require_once('class/main.php');
$obj = new Model;

 if(isset($_GET['editId']) && !empty($_GET['editId'])) {
      $userId= $_GET['editId'];
      $data= $obj->print_customer_data($userId);
  }


?>
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<div class="col-md-11">
<h5 class="card-header">Edit Customer Information</h5>
<!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
<div class="card-body">

  <form class="form-row" id="register_form" action="form_insert.php" method="post">
  <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
  
   <div class="form-group col-md-6">
  <label for="name">Customer Name<span class="text-danger">*</span></label>
  <input type=text value="<?php echo $data['name']; ?>" placeholder="Enter Customer name" id="name"
  class="form-control " name="name" min="0" max="" required>
  <small class="help-text text-muted">অনুগ্রহ করে গ্রাহকের নাম লিখুন.</small>
  </div>

    <div class="form-group col-md-6">
  <label for="name">Mobile Number<span class="text-danger">*</span></label>
  <input type=text value="<?php echo $data['mobile']; ?>" placeholder="" id="name"
  class="form-control " name="mobile" min="0" max="" required>
  <small class="help-text text-muted">গ্রাহকের মোবাইল লিখুন</small>
  </div>

  <div class="form-group col-md-6">
  <label for="name">Address<span class="text-danger">*</span></label>
  <textarea type=text value="" placeholder="" id="name"
  class="form-control " name="address" rows="1"required><?php echo $data['address']; ?></textarea>
  <small class="help-text text-muted">অনুগ্রহ করে গ্রাহকের ঠিকানা লিখুন</small>
  </div>

  <div class="form-group col-md-6">
  <label for="name">Total Dues<span class="text-danger"></span></label>
  <input type=text value="<?php echo $data['dues']; ?>" placeholder="Optional" id="name"
  class="form-control " name="dues">
  <small class="help-text text-muted">বাকির পরিমাণ লিখুন</small>
  </div>
  <div class="col-12">
  <div class="float-right">
  <button type="submit" name="c_update" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Update</button>
  <a href="customer_list.php" type="submit" name="data" class="btn btn-sm btn-secondary"></i> Cancel</a>
  </div>
  </div>
  </form>
</div>
</div>
</div>
</section>
</div>

<script type="text/javascript">
     function Checkyesno(val) {
  var element = document.getElementById('vendor_change');
  if (val == 'Select repair vendor' || val == 'others')
    element.style.display = 'block';
  else
    element.style.display = 'none';

}
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

  $('#vehicle').select2({
            placeholder: "Select your vehicle number",
            allowClear: true
        });
</script>

<?php require_once('footer.php'); ?>