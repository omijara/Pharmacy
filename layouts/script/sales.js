
  // Function to add a new row
  function addRow() {
    // Clone the row
    var newRow = $("#invoice_medicine_list_div .row").first().clone();

    // Clear input values in the cloned row
    newRow.find('input').val('');
    newRow.find('select').val('Select');

    // Append the cloned row to the container
    $("#invoice_medicine_list_div").append(newRow);
  }

  // Function to remove a row
  function removeRow(rowId) {
    // Ensure that at least one row is always present
    if ($("#invoice_medicine_list_div .row").length > 1) {
      $("#" + rowId).remove();
    }
  }

  // Attach click event handlers
  $(document).ready(function() {
    // Add a new row when the "Add" button is clicked
    $("#addButton").click(function() {
      addRow();
    });

    // Remove the corresponding row when the "Remove" button is clicked
    $(".btn-danger").click(function() {
      var rowId = $(this).closest('.row').attr('id');
      removeRow(rowId);
    });
  });

