<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//session_start(); 
require_once('header.php');
require_once('user_role.php');
require_once('class/main.php');
$obj = new Model;

$rv = $obj->repair_vendor();

// Edit customer record
 if(isset($_GET['editId']) && !empty($_GET['editId'])) {
      $editId= $_GET['editId'];
      $data= $obj->display_edit_data($editId);
  }

?>
<div class="content-wrapper">
<section class="content">
<div class="container-fluid">
<div class="col-md-11">
<h5 class="card-header">Vehicle Maintenance Edit</h5>
<!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
<div class="card-body">

  <form class="form-row" id="register_form" action="form_insert.php" method="post">
  <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
     <div class="form-group col-md-6">
    <label for="vehicle">Repair Vendor<span class="text-danger">*</span></label>
    <select class="vehicle2 form-control" id="vehicle" name="vendor" onchange='Checkyesno(this.value);' required>
    <option><?php if(isset($data['vendor'])) echo $data['vendor'] ?></option> 
    <?php while ($row = mysqli_fetch_assoc($rv)): ?>
    <option value="<?php echo $row['rv_name'] ?>"><?php echo $row['rv_name'] ?></option>
    <?php endwhile; ?>
    <option value="others">Other</option>
    <input type="text" class="form-control" name="othervendor" id="vendor_change" placeholder="write repair vendor name" style='display:none;' />
    </select>
    <small class="help-text text-muted">Please select repair vendor.</small>
    </div>  

    <div class="form-group col-md-6">
  <label for="name">Cost<span class="text-danger">*</span></label>
  <input type=number value="<?php echo $data['repair_cost'] ?>"
  placeholder="Enter cost of maintenance" id="name"
  class="form-control" name="cost" min="0" max="" required>
  <small class="help-text text-muted">Please enter cost of maintenance.</small>
  </div>

  <div class="col-12">
  <div class="float-right">
  <button type="submit" name="update" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Save</button>
  <a href="javascript: history.go(-1)" type="submit" class="btn btn-sm btn-secondary"></i> Cancel</a>
  </div>
  </div>
  </form>
</div>
</div>
</div>
</section>
</div>

<script type="text/javascript">
  $("select").on('click', 'option', function() {
    if ($("select option:selected").length > 3) {
        $(this).removeAttr("selected");
        // alert('You can select upto 3 options only');
    }
});
</script>

<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?php require_once('footer.php'); ?>