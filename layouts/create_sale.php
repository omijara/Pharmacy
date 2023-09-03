<?php 
require_once('user_role.php');
require_once('class/main.php');
$obj = new Model;

// $product_cat = $obj->show_category();
$customers = $obj->show_customer_data();
$products = $obj->show_product_sales();

?>
<script src="script/sales.js"></script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <?php require_once('modal/customer_form.html'); ?>
        </div>

    </div>
</div>


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

        <h5 class="card-header">Create new Sale</h5>
        <!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
        <div class="card-body">

        <!-- form content -->
        <div class="row">
          <!-- customer details content -->
          <div class="row col col-md-12">
            <div class="col col-md-3 form-group">
              <label class="font-weight-bold" for="customers mobile">Customer Mobile :</label>
              <select class="customer_mobile form-control" id="customer_mobile" name="c_name" required>
                <option>Select</option>
                <?php while ($customer = mysqli_fetch_assoc($customers)) : ?>
                    <option value="<?php echo $customer['mobile'] ?>"><?php echo $customer['mobile'] ?>
                    </option>
                <?php endwhile; ?>
                </select>
            </div>
            <div class="col col-md-3 form-group">
              <label class="font-weight-bold" for="customer_name">Customer Name :</label>
              <input id="customer_name" type="text" class="form-control" name="c_name" placeholder="Customer name" disabled>
            </div>
            <div class="col col-md-2 form-group">
              <label class="font-weight-bold" for="customers_address">Due Amount :</label>
              <input id="customer_dues" type="text" class="form-control" name="customers_address" placeholder="Dues" disabled>
            </div>
            <div class="col col-md-2 form-group">
              <label class="font-weight-bold" for="">Payment Type :</label>
              <select id="payment_type" class="form-control">
                <option value="1">Cash Payment</option>
                <option value="2">Card Payment</option>
                <option value="3">Net Banking</option>
              </select>
            </div>
            <div class="col col-md-2 form-group">
               <label class="font-weight-bold" for="">Date :</label>
              <input type="date" class="datepicker form-control hasDatepicker" id="invoice_date" value='<?php 
              date_default_timezone_set('Asia/Dhaka');
              $date = date('Y-m-d');           
               echo $date; ?>' onblur="checkDate(this.value, 'date_error');">
              <code class="text-danger small font-weight-bold float-right" id="date_error" style="display: none;"></code>
            </div>
          </div>
          <!-- customer details content end -->

          <!-- new user button -->
          <div class="row col col-md-12">
            <div class="col col-md-2 form-group">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">New Customer</button>
            </div>
            <div class="col col-md-1 form-group"></div>
             <div class="col col-md-3 form-group">
              <label class="font-weight-bold" for="customers_address">Address :</label>
              <input id="customer_address" type="text" class="form-control" name="customers_address" placeholder="Address" disabled>
            </div>
          </div>
          <!-- closing new user button -->

          <div class="col col-md-12">
            <hr class="col-md-12" style="padding: 0px; border-top: 3px solid  #02b6ff;">
          </div>

          <!-- add medicines -->
          <div class="row col col-md-12">
            <div class="row col col-md-12 font-weight-bold">
              <div class="col col-md-2">Medicine Name</div>
              <!-- <div class="col col-md-2">Batch ID</div> -->
              <div class="col col-md-2">Stock</div>
              <div class="col col-md-2">Expiry</div>
              <div class="col col-md-1">Quantity</div>
              <div class="col col-md-1">MRP</div>
              <!-- <div class="col col-md-1">Discount%</div> -->
              <div class="col col-md-2">&nbsp;&nbsp;Total</div>
              <div class="col col-md-2">Action</div>
            </div>
          </div>
          <div class="col col-md-12">
            <hr class="col-md-12" style="padding: 0px; border-top: 2px solid  #02b6ff;">
          </div>

        <div class="row col col-md-12 " id="invoice_medicine_list_div">
          <div class="row col col-md-12">
      <div class="col-md-2">
      <select class="product form-control" id="product_id" name="c_name">
        <option>Select</option>
        <?php while ($product = mysqli_fetch_assoc($products)) : ?>
            <option value="<?php echo $product['product_id'] ?>"><?php echo $product['product_name'] ?>
            </option>
        <?php endwhile; ?>
    </select>
      </div>

   <!--    <div class="col col-md-2"><input type="text" class="form-control" id="batch_id_<?php echo $row_number; ?>" disabled>
      </div> -->

      <div class="col col-md-2"><input type="text" class="stock form-control" id="stock" disabled>
      <small class="text-danger" id="out_of_stock" style="display: none;">Out of Stock</small>
      </div>

      <div class="col col-md-2"><input type="text" class="expire_date form-control" id="expire_date" >
      </div>

      <div class="col col-md-1">
        <input type="number" class="form-control" id="quantity" value="0" min="0">
        <code class="text-danger small font-weight-bold float-right" id="quantity" style="display: none; width: 300px;"></code>
      </div>

      <div class="col col-md-1"><input type="number" class="mrp form-control" id="mrp" disabled>
      </div>

      <div class="col col-md-2"><input type="number" class="form-control" id="total" disabled>
      </div>

      <div class="col col-md-2">
        <button class="btn btn-primary" id="addButton" onclick="addRow();">
          <i class="fa fa-plus"></i>
        </button>
        <button class="btn btn-danger" onclick="removeRow('<?php echo $row_id ?>');">
          <i class="fa fa-trash"></i>
        </button>
      </div>
    </div>
    <div class="col col-md-12">
      <hr class="col-md-12" style="padding: 0px;">
    </div>
   
        </div>
          <!-- end medicines -->

          <div class="row col col-md-12">
            <div class="col col-md-6 form-group"></div>

            <div class="col col-md-2 form-group float-right">
              <label class="font-weight-bold" for="">Total Amount:</label>
              <input type="text" class="form-control" value="0" id="total_amount" disabled>
            </div>
            <div class="col col-md-2 form-group float-right">
              <label class="font-weight-bold" for="">Discount :</label>
              <input type="number" class="form-control" id="discount" value="0" onkeyup="updateTotal()">
            </div>

            <div class="col col-md-2 form-group float-right">
              <label class="font-weight-bold" for="">Net Total :</label>
              <input type="text" class="form-control" value="0" id="net_total" disabled>
            </div>
          </div>

          <div class="col col-md-12">
            <hr class="col-md-12" style="padding: 0px;">
          </div>

          <div class="row col col-md-12">
            <div id="save_button" class="col col-md-2 form-group float-right">
              <label class="font-weight-bold" for=""></label>
              <button class="btn btn-success form-control font-weight-bold" onclick="addInvoice();">Save</button>
            </div>

            <div id="new_invoice_button" class="col col-md-2 form-group float-right"  style="display: none;">
              <label class="font-weight-bold" for=""></label>
              <button class="btn btn-primary form-control font-weight-bold" onclick="location.reload();;">New Invoice</button>
            </div>

            <div id="print_button" class="col col-md-2 form-group float-right" style="display: none;">
              <label class="font-weight-bold" for=""></label>
              <button class="btn btn-warning form-control font-weight-bold" onclick="printInvoice(document.getElementById('invoice_number').value);">Print</button>
            </div>

            <div class="col col-md-4 form-group"></div>
            <div class="col col-md-2 form-group float-right">
              <label class="font-weight-bold" for="">Paid Amount :</label>
              <input type="text" class="form-control" name="total_discount" onkeyup="getChange(this.value);">
            </div>

            <div class="col col-md-2 form-group float-right">
              <label class="font-weight-bold" for="">Change :</label>
              <input type="text" class="form-control" id="change_amt" disabled>
            </div>
          </div>

          <div id="invoice_acknowledgement" class="col-md-12 h5 text-success font-weight-bold text-center" style="font-family: sans-serif;"></div>

        </div>
        <!-- form content end -->
        <hr style="border-top: 2px solid #ff5252;">
      </div>
</div>
</div>
</section>
</div>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<!-- Include your separate JavaScript file -->
<script src="script/sales_script.js"></script>

<script>
       $('.customer_mobile').select2({
            placeholder: "Select customer",
            allowClear: true
        });
        
        //Project
         $('.product').select2({
            placeholder: "Select product",
            allowClear: true
        });
        $('.product_dup').select2({
            placeholder: "Select product",
            allowClear: true
        });
</script>



