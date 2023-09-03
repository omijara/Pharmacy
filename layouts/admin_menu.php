<aside class="main-sidebar sidebar-dark-primary elevation-4">

  <!-- Brand Logo -->

  <a class="brand-link">

    <span class="brand-text font-weight-bold">Pharmacy Sales</span>

  </a>



  <!-- Sidebar -->

  <div class="sidebar">

    <!-- Sidebar user panel (optional) -->

    <div class="user-panel mt-3 pb-3 mb-3 d-flex">

      <!--         <div class="image">

          <img src="../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

        </div> -->

      <div class="info">

        <a class="d-block">
          Welcome!
          <strong><?php

                    echo $_SESSION['name'];

                    ?></strong>

        </a>

      </div>

    </div>





    <!-- Sidebar Menu -->

    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


        <a href="index.php" class="nav-link active">

          <i class="nav-icon fas fa-tachometer-alt"></i>

          <p>

            Dashboard

            <!--    <i class="right fas fa-angle-left"></i> -->

          </p>

        </a>




        <li class="nav-item">

          <a href="#" class="nav-link">

            <i class="nav-icon fa fa-th"></i>

            <p>

              Customer

              <i class="fas fa-angle-left right"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="customer_list.php" class="nav-link">

                <i class="far fa-circle nav-icon"></i>

                <p>View</p>

              </a>

            </li>

          </ul>

        </li>

        <li class="nav-item">

          <a href="#" class="nav-link">

            <i class="nav-icon fa fa-th"></i>

            <p>

              Product

              <i class="fas fa-angle-left right"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="product_list.php" class="nav-link">

                <i class="far fa-circle nav-icon"></i>

                <p>View</p>

              </a>

            </li>

          </ul>

        </li>

        <li class="nav-item">

            <a href="#" class="nav-link">

              <i class="nav-icon fa fa-th"></i>

              <p>

                Suppiler

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

               <li class="nav-item">

                <a href="categories.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>View</p>

                </a>

              </li>

            </ul>

          </li> 

        <li class="nav-item">

          <a href="#" class="nav-link">

            <i class="nav-icon fa fa-th"></i>

            <p>

              Sales

              <i class="fas fa-angle-left right"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="sales_list.php" class="nav-link">

                <i class="far fa-circle nav-icon"></i>

                <p>Manage Sales</p>

              </a>

            </li>

          </ul>

          <ul class="nav nav-treeview">

            <li class="nav-item">

              <a href="create_sale.php" class="nav-link">

                <i class="far fa-circle nav-icon"></i>

                <p>Create Sale</p>

              </a>

            </li>

          </ul>

        </li>

       <!--  <li class="nav-item">

          <a href="#" class="nav-link">

            <i class="nav-icon fa fa-th"></i>

            <p>

              সেলস রিপোর্ট

              <i class="fas fa-angle-left right"></i>

            </p>

          </a>

          <ul class="nav nav-treeview">

        </li>

        <li class="nav-item">

          <a href="#" class="nav-link">

            <i class="far fa-circle nav-icon"></i>

            <p>দৈনিক বিক্রয়</p>

          </a>

        </li>

        <li class="nav-item">

          <a href="#" class="nav-link">

            <i class="far fa-circle nav-icon"></i>

            <p>মাসিক বিক্রয়</p>

          </a>

        </li>

        <li class="nav-item">

          <a href="#" class="nav-link">

            <i class="far fa-circle nav-icon"></i>

            <p>তারিখ অনুসারে বিক্রয়</p>

          </a>

      </ul>

      </li>
 -->
      <!-- 
     <li class="nav-item">

            <a href="#" class="nav-link">

              <i class="nav-icon far fa-newspaper"></i>

              <p>

                Options

                <i class="fas fa-angle-left right"></i>

              </p>

            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="options/driver_list.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Driver</p>

                </a>

              </li>

            </ul>

              <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="options/vehicle_list.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Vehicle No</p>

                </a>

              </li>

            </ul>

              <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="options/problem_list.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Problems</p>

                </a>

              </li>

            </ul>

               <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="options/item_list.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Items</p>

                </a>

              </li>

            </ul>

                <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="options/vendor_list.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Repair Vendor</p>

                </a>

              </li>

            </ul>

                 <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="options/vendor_list.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Fuel Vendor</p>

                </a>

              </li>

            </ul>

              <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="options/recommender_list.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Recommender</p>

                </a>

              </li>

            </ul>

              <ul class="nav nav-treeview">

              <li class="nav-item">

                <a href="options/approver_list.php" class="nav-link">

                  <i class="far fa-circle nav-icon"></i>

                  <p>Approver</p>

                </a>

              </li>

            </ul>

          </li> -->

      <!--Category End Here -->

     <!--  <li class="nav-item">

        <a href="#" class="nav-link">

          <i class="nav-icon fas fa-cog"></i>

          <p>

            Settings

            <i class="fas fa-angle-left right"></i>

          </p>

        </a>

        <ul class="nav nav-treeview"> -->


          <!-- 
            <li class="nav-item">

                <a href="user_add.php" class="nav-link">

                  <i class="fas fa-user-plus"></i>

                  <p>Add New User</p>

                </a>

            </li>

            <li class="nav-item">

                <a href="users-list.php" class="nav-link">

                  <i class="fas fa-users"></i>

                  <p>Users List</p>

                </a>

            </li>  

             <li class="nav-item">

                <a href="recover-password.php" class="nav-link">

                  <i class="fas fa-key"></i>

                  <p>Change Password</p>

                </a>

              </li> 

          <li class="nav-item">

            <a href="logout.php" class="nav-link">

              <i class="fas fa-sign-out-alt"></i>

              <p>লগআউট</p>

            </a>

          </li>



      </li>-->

      </ul>

    </nav>

    <!-- /.sidebar-menu -->

  </div>

  <!-- /.sidebar -->

</aside>



<!-- /.content -->

</div>

<!-- /.content-wrapper -->