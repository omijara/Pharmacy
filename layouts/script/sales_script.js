$(document).ready(function () {
    // Customer selection
    $('#customer_mobile').on('change', function () {
        $('#customer_name').val('');
        $('#customer_dues').val('');
         $('#customer_address').val('');
        var mobileId = $(this).val();
        
        if (mobileId) {
            $.ajax({
                url: 'fetch/get_customer_info.php',
                type: 'POST',
                data: { mobileId: mobileId },
                success: function (res) {
                    res = JSON.parse(res);
                    if (res.status == 'success') {
                        $('#customer_name').val(res.data.name);
                        $('#customer_dues').val(res.data.dues);
                        $('#customer_address').val(res.data.address);
                    } else {
                        alert(res.msg);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    });
    
    // Product selection
    $('.product').on('change', function () {
        $('#stock').val('');
        $('#expire_date').val('');
         $('#quantity').val('');
        $('#mrp').val('').change();
        $('#total').val('').change();
        var $parentRow = $(this).closest('.row');
        var productId = $(this).val();
        
        if (productId) {
            $.ajax({
                url: 'fetch/get_product_info.php',
                type: 'POST',
                data: { productId: productId },
                success: function (res) {
                    res = JSON.parse(res);
                    if (res.status == 'success') {
                        $parentRow.find('.stock').val(res.data.quantity);
                        $parentRow.find('.expire_date').val(res.data.expiry_date);
                        $parentRow.find('.mrp').val(res.data.price);
                    } else {
                        alert(res.msg);
                    }
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }
    });

    $('#quantity').on('input', function () {
        updateTotal();
    });

});


$('.customer_mobile').select2({
    placeholder: "Select customer",
    allowClear: true
});

//Product
 $('.product').select2({
    placeholder: "Select product",
    allowClear: true
});

function updateTotal() {
    var quantity = parseFloat($('#quantity').val());
    var mrp = parseFloat($('#mrp').val());
    var stock = parseFloat($('#stock').val());
    var discountPercentage = parseFloat($('#discount').val());
    var addButton = $('#addButton');

    if (stock === 0) {
        $('#out_of_stock').css('display', 'block');
        $('#total').val('');
        addButton.prop('disabled', true);
    } else {
        $('#out_of_stock').css('display', 'none');
        addButton.prop('disabled', false);
    }

    if (!isNaN(quantity) && !isNaN(mrp)) {
        var total = quantity * mrp;
        if (!isNaN(discountPercentage) && discountPercentage > 0) {
            // Calculate discount amount
            var discountAmount = (total * discountPercentage) / 100;
            
            // Calculate net total amount after discount
            var netTotal = total - discountAmount;
            
            $('#net_total').val(netTotal.toFixed(2)); // Set net total value with 2 decimal places
        } else {
            $('#net_total').val(total.toFixed(2)); // Set net total same as total
        }

        $('#total').val(total.toFixed(2));
        $('#total_amount').val(total.toFixed(2));
    }
}

function getChange(paid_amt) {
    var net_total = document.getElementById("net_total").value;
    document.getElementById("change_amt").value = paid_amt - net_total;
  }
