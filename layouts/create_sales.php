<?php
//session_start();
require_once('user_role.php');
require_once('class/main.php');
$obj = new Model;

$product_cat = $obj->show_category();
$customers = $obj->show_customer_data();
$products = $obj->show_product_sales();



?>
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">

            <h5 class="card-header">প্রোডাক্ট যুক্ত করুন</h5>
            <!-- <p style="float:right;"><a href="view.php">Back to list</a></p> -->
            <div class="card-body">

                <form class="form-row" id="register_form" action="form_insert.php" method="post">
                    <input type="hidden" name="id" value="">

                    <div class="form-group col-md-6">
                        <label for="name">Customer<span class="text-danger">*</span></label>
                        <select class="name2 form-control" id="driver" name="c_name" onchange="customer_due(this)" required>
                            <option>Select</option>
                            <?php while ($customer = mysqli_fetch_assoc($customers)) : ?>
                                <option value="<?php echo $customer['dues'] ?>+<?php echo $customer['id'] ?>"><?php echo $customer['mobile'] ?></option>
                            <?php endwhile; ?>
                        </select>
                        <!-- <input type="hidden" name="customer_id" class="customer_id_input">
                        <button type="button" class="btn btn-info mt-2 btn-sm" data-toggle="modal" data-target="#exampleModalCenter">New Customer</button> -->
                    </div>



                  <!--   <div class="form-group col-md-6">
                        <label for="name">Due<span class="text-danger">*</span></label>
                        <input type="text" disabled class="form-control" id="due_input" name="due" required>
                    </div> -->
                    <div class="main_row">

                        <div class="col-md-12">
                            <div class="card p-4">
                                <div class="row item_single">
                                    <div class="form-group col-md-6">
                                        <label for="name">Product<span class="text-danger">*</span></label>
                                        <br>
                                        <select class="name form-control" id="driver" name="c_name" onchange="product_info(this)" required>
                                            <option>Select</option>
                                            <?php while ($product = mysqli_fetch_assoc($products)) : ?>
                                                <option value="<?php echo $product['quantity'] ?>+<?php echo $product['product_id'] ?>"><?php echo $product['product_name'] ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                        <input type="hidden" class="product_id" name="product_id[]">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="name">Stock<span class="text-danger">*</span></label>
                                        <input type="number" name="stock[]" class="form-control quantity_input" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="name">Price<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control price_input" required>
                                    </div>
                                </div>
                                <div class="quantity_price row" style="display:none;">
                                    <div class="form-group col-md-6">
                                        <label for="name">Quantity(ফুট)<span class="text-danger">*</span></label>
                                        <input onkeyup="calculate_price(this)" type="number" value="" class="form-control stock_out" name="quantity[]" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Product Price<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control price_sub_total" name="product_price[]" required>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-4">
                        <label for="name">Total Price<span class="text-danger">*</span></label>
                        <input readonly type="text" class="form-control price_payable_total disable" name="total_payable" value="0" required>
                    </div>
                    <!-- <div class="col-md-4">
                        <label for="name">Paid<span class="text-danger">*</span></label>
                        <input type="number" class="form-control price_paid_total" name="total_paid" value="0" required>
                    </div>
                    <div class="col-md-4">
                        <label for="name">conveyance<span class="text-danger">*</span></label>
                        <input type="number" class="form-control conveyance" name="conveyance" value="0" required>
                    </div> -->
                   <!--  <div class="col-md-12 mt-4">
                        <button class="btn btn-primary add_more" style="display:none;" onclick="add_more_product()">Add More</button>
                    </div> -->


                    <div class="col-12">
                        <div class="float-right">
                            <button type="submit" name="save_sales" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Save</button>
                            <a href="javascript: history.go(-1)" type="submit" name="data" class="btn btn-sm btn-secondary"></i> Cancel</a>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </section>
</div>


<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">গ্রাহকের তথ্য যুক্ত করুন</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="form-row" id="register_form" action="form_insert.php" method="post">
                    <input type="hidden" name="id" value="">

                    <div class="form-group col-md-6">
                        <label for="name">গ্রাহকের নাম<span class="text-danger">*</span></label>
                        <input type=text value="" placeholder="Enter Customer name" id="name" class="form-control " name="name" min="0" max="" required>
                        <small class="help-text text-muted">অনুগ্রহ করে গ্রাহকের নাম লিখুন.</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">মোবাইল নম্বর<span class="text-danger">*</span></label>
                        <input type=text value="" placeholder="" id="name" class="form-control " name="mobile" min="0" max="" required>
                        <small class="help-text text-muted">গ্রাহকের মোবাইল লিখুন</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">ঠিকানা<span class="text-danger">*</span></label>
                        <textarea type=text value="" placeholder="" id="name" class="form-control " name="address" rows="1" required></textarea>
                        <small class="help-text text-muted">অনুগ্রহ করে গ্রাহকের ঠিকানা লিখুন</small>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="name">বাকির পরিমান<span class="text-danger"></span></label>
                        <input type=text value="" placeholder="Optional" id="name" class="form-control " name="dues">
                        <small class="help-text text-muted">বাকির পরিমাণ লিখুন</small>
                    </div>


                    <div class="col-12">
                        <div class="float-right">
                            <button type="submit" name="new_save_data" class="btn btn-sm btn-primary"><i class="fas fa-download"></i> Save</button>
                           <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>
</div> -->


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $('.main_row').hide();

    function customer_due(el) {
        var c_id_due = $(el).val();
        var split_ = c_id_due.split('+');

        $('#due_input').val(split_[0]);
        $('.customer_id_input').val(split_[1]);
        $('.main_row').show();
        $('.add_more').show();
    }

    function product_info(el) {
        var q_p = $(el).val();
        var qps = q_p.split('+');

        $(el).closest('.card').find('.quantity_input').val(qps[0]);
        //$(el).closest('.card').find('.price_input').val(qps[1]);
        $(el).closest('.card').find('.stock_out').attr("max",qps[0]);
        $(el).closest('.card').find('.product_id').val(qps[1]);
        $(el).closest('.card').find('.quantity_price').show();
    }

    function calculate_price(el) {
        var unite = $(el).val();
        var price = $(el).closest('.card').find('.price_input').val();
        let total = unite * price;
        $(el).closest('.card').find('.price_sub_total').val(total);
        var new_pay = 0;
        $("input[name='product_price[]']")
            .map(function() {
                var single = $(this).val();
                new_pay = new_pay + parseInt(single);
            });
        $('.price_payable_total').val(new_pay);
    }

    function add_more_product() {
        <?php
        $products = $obj->show_product_sales();
        ?>
        $('.main_row').append(`
        <div class="card p-4">
                                <div class="col-md-12">
                                    <div class="row item_single">
                                        <div class="form-group col-md-6">
                                            <label for="name">Product<span class="text-danger">*</span></label>
                                            <br>
                                            <select class="name form-control" id="driver" name="c_name" onchange="product_info(this)" required>
                                                <option>Select</option>
                                                <?php while ($product = mysqli_fetch_assoc($products)) : ?>
                                                    <option value="<?php echo $product['quantity'] ?>+<?php echo $product['product_id'] ?>"><?php echo $product['product_name'] ?></option>
                                                <?php endwhile; ?>
                                            </select>
                                            <input type="hidden" class="product_id" name="product_id[]">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="name">Stock<span class="text-danger">*</span></label>
                                            <input type="text" disabled class="form-control quantity_input" required>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="name">Price<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control price_input" required>
                                        </div>
                                    </div>
                                    <div class="quantity_price row" style="display:none;">
                                        <div class="form-group col-md-6">
                                            <label for="name">Quantity(ফুট)<span class="text-danger">*</span></label>
                                            <input onkeyup="calculate_price(this)" type="number" value="" class="form-control" name="quantity[]" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="name">Product Price<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control price_sub_total" name="product_price[]" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                <button onclick="delete_product(this)" class="btn btn-warning">Delete</button>
                                </div>
                            </div>
        `);
        $('.name').select2({
            placeholder: "Select Approver",
            allowClear: true
        });
    }

    function delete_product(el) {
        $(el).closest('.card').remove();
        var new_pay = 0;
        $("input[name='product_price[]']")
            .map(function() {
                var single = $(this).val();
                new_pay = new_pay + parseInt(single);
            });
        $('.price_payable_total').val(new_pay);
    }
    $('.name2').select2({
        placeholder: "Select Approver",
        allowClear: true
    });
</script>
<?php require_once('footer.php'); ?>