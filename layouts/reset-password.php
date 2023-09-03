<?php require ('header.php'); ?>
<?php require_once('user_role.php'); ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
           <!--  <h1>Data Input</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Password reset</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


      <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- Horizontal form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Reset Password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="update_pass.php" method="POST" data-parsley-validate>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Old Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="old_password" class="form-control" id="password1" placeholder="Old password" required=""  data-parsley-minlength="8"
                      data-parsley-errors-container=".errorspannewpassinput"
                      data-parsley-required-message="Please enter your new password."
                      data-parsley-uppercase="1"
                      data-parsley-lowercase="1"
                      data-parsley-number="1"
                      data-parsley-special="1"
                      data-parsley-required>
                      <span class="errorspannewpassinput"></span>
                    </div>
                  </div>
                         <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="new_password" class="form-control" id="password1" placeholder="New password" required=""  data-parsley-minlength="8"
                      data-parsley-errors-container=".errorspannewpassinput"
                      data-parsley-required-message="Please enter your new password."
                      data-parsley-uppercase="1"
                      data-parsley-lowercase="1"
                      data-parsley-number="1"
                      data-parsley-special="1"
                      data-parsley-required>
                      <span class="errorspannewpassinput"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="con_password" class="form-control" id="password2" placeholder="confirm new password" required=""  data-parsley-minlength="8"
                      data-parsley-errors-container=".errorspanconfirmnewpassinput"
                      data-parsley-required-message="Please enter your confirm password."
                      data-parsley-equalto="#password1"
                      data-parsley-required>
                      <span class="errorspanconfirmnewpassinput"></span>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Reset</button>
                  <input type="button" class="btn btn-default float-right" value="cancel" class="btn" onclick="history.back();" />
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </section>
</div>

<?php require_once('footer.php') ?>