<?php

  if(isset($_GET['action']) && $_GET['action'] == "add_row")
    createMedicineInfoRow();

  function createMedicineInfoRow() {
    require "../db/dbcon.php";
    
    // Call the isMedicine function and fetch the products
    $query = "SELECT * FROM product_list";
    $result = mysqli_query($link, $query);
    $row_id = $_GET['product_id'];
    $row_number = $_GET['row_number'];
    ?>
    <div class="row col col-md-12">
      <div class="col-md-2">
      <select class="product form-control" id="product" name="c_name">
        <option>Select</option>
        <?php while ($product = mysqli_fetch_assoc($result)) : ?>
            <option value="<?php echo $product['product_id'] ?>"><?php echo $product['product_name'] ?>
            </option>
        <?php endwhile; ?>
    </select>
      </div>

   <!--    <div class="col col-md-2"><input type="text" class="form-control" id="batch_id_<?php echo $row_number; ?>" disabled>
      </div> -->

      <div class="col col-md-2"><input type="number" class="form-control" id="available_quantity_<?php echo $row_number; ?>" disabled>
      </div>

      <div class="col col-md-2"><input type="text" class="form-control" id="expiry_date_<?php echo $row_number; ?>" >
      </div>

      <div class="col col-md-1">
        <input type="number" class="form-control" id="quantity_<?php echo $row_number; ?>" value="0" onkeyup="getTotal('<?php echo $row_number; ?>');" onblur="checkAvailableQuantity(this.value, '<?php echo $row_number; ?>');">
        <code class="text-danger small font-weight-bold float-right" id="quantity_error_<?php echo $row_number; ?>" style="display: none; width: 300px;"></code>
      </div>

      <div class="col col-md-1"><input type="number" class="form-control" id="mrp_<?php echo $row_number; ?>" onchange="getTotal('<?php echo $row_number; ?>');" disabled>
      </div>

      <div class="col col-md-2"><input type="number" class="form-control" id="total_<?php echo $row_number; ?>" disabled>
      </div>

      <div class="col col-md-2">
        <button class="btn btn-primary" onclick="addRow();">
          <i class="fa fa-plus"></i>
        </button>
        <button class="btn btn-danger"  onclick="removeRow('<?php echo $row_id ?>');">
          <i class="fa fa-trash"></i>
        </button>
      </div>
    </div>
    <div class="col col-md-12">
      <hr class="col-md-12" style="padding: 0px;">
    </div>
    <?php
  }


?>
