
  var rows = 0;

function addRow() {
  if(typeof addRow.counter == 'undefined')
    addRow.counter = 1;
  var previous = document.getElementById("invoice_medicine_list_div").innerHTML;
  var node = document.createElement("div");
  var cls = document.createAttribute("id");
  cls.value = "medicine_row_" + addRow.counter;
  node.setAttributeNode(cls);
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if(xhttp.readyState = 4 && xhttp.status == 200) {
      node.innerHTML = xhttp.responseText;
      document.getElementById("invoice_medicine_list_div").appendChild(node);
    }
  };
  xhttp.open("GET", "php/add_new_invoice.php?action=add_row&row_id=" + cls.value + "&row_number=" + addRow.counter, true);
  xhttp.send();
  //alert(addRow.counter);
  addRow.counter++;
  rows++;
}

function removeRow(row_id) {
  if(rows == 1)
    alert("Can't delete only one row is there!");
  else {
    document.getElementById(row_id).remove();
    rows--;
  }
}
