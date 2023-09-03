<?php 
require_once('class/main.php');
require_once('user_role.php');
$obj = new Model;
$show = $obj->show_category();

?> 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1>ক্যাটেগরী</h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       <div class="row">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ক্যাটাগরি যুক্ত করুন</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
          <form class="form-row" id="register_form" action="form_insert.php" method="post">
          <input type="hidden" name="id" value="">
          <form action="/action.php" class="form-group col-md-6">
          <label for="fname"></label><br>
          <input type="text" class="form-control" id="fname" name="category" placeholder="ক্যাটাগরি নাম লিখুন"><br><br><br>
          <button type="submit" name="save_cat" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Save</button>
        </form>
          

         
              </div>
            </div>
            <!-- /.card -->

  
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">ক্যাটেগরী টেবিল</h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>ক্যাটেগরী</th>
                       <th style="width: 40px">ডিলিট</th>

                    </tr>
                  </thead>
                  <tbody>
            <?php 

                  $no=1;
                  while ($rows = mysqli_fetch_array($show)) {

                ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $rows['cat_name']; ?></td>
                      <td>
                                      <?php

                  echo "<a onClick=\"javascript: return confirm('Are you sure want to delete this record?');\" class= 'dropdown-item' href='delete.php?category_Id=".$rows["cat_id"]."'>"?><i class="fa fa-trash" style="color:red"></i></a>
             <?php     ?>
                      </td>
                
                    </tr>
              <?php 
                $no++; 

               } 

               ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<script type='text/javascript'>
            $(document).ready(function(){

                $('.userinfo').click(function(){
                   
                    var userid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: 'modal/maintenance.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            // Add response in Modal body
                            $('.modal-body').html(response); 

                            // Display Modal
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
</script>

<script>


</script>

 <?php require_once('footer.php'); ?>