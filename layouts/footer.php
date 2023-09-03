 <!-- /.content-wrapper -->
  <footer class="main-footer">
    <!-- <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0-rc
    </div> -->
    <strong>Developed By <a href="#"=>OMI MAZUMDER</a></strong>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../plugins/jszip/jszip.min.js"></script>
<script src="../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>

<script src="../dist/js/select2.min.js"></script>
<script src="../dist/js/toastr.js"></script>
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/0.6.5/datepicker.min.js"></script>



  <script type="text/javascript">
         //Vehicle
      

        //Name
        $('.name').select2({
            placeholder: "Select your name",
            allowClear: true
        });
        
        //Project
         $('.project').select2({
            placeholder: "Select your project name",
            allowClear: true
        });

        //problems
         $('.problems').select2({
            placeholder: "Choose your car problems",
            allowClear: true,
            tags: true
        });
        
        //category
         $('.type').select2({
            placeholder: "Select service type",
            allowClear: true
        });

        //vendor
         $('.vendor').select2({
            placeholder: "Select fuel vendor",
            allowClear: true
        });


          //recommender
         $('.r_name').select2({
            placeholder: "Select recommender",
            allowClear: true
        });

           //approver
         $('.a_name').select2({
            placeholder: "Select Approver",
            allowClear: true
        });


  </script>

<!-- <script>
 $("#pick_date").datepicker({ 
  dateFormat: "dd/mm/yy", 
  minDate: new Date()
});

//  $("#return_date").datepicker({ 
//   dateFormat: "dd/mm/yy", 
//   minDate: new Date()
// });
  </script> -->

  <!-- <script type="text/javascript">
    jQuery(document).ready(function(){
  jQuery(function() {
        jQuery(this).bind("contextmenu", function(event) {
            event.preventDefault();
            alert('Why you wanna do this?')
        });
    });

    //   document.onkeydown = function(e) {
    //         if (e.ctrlKey && (e.keyCode === 67 || e.keyCode === 86 || e.keyCode === 85 || e.keyCode === 117)) {//Alt+c, Alt+v will also be disabled sadly.
    //             alert('You are not allowed to view this page!');
    //         }
    //         return false;
    // };
});
  </script> -->
<script type="text/javascript">
<?php if(isset($_GET['succ'])): ?>

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
Command: toastr["success"]("<?php echo $_GET['succ']?>")

<?php endif ?>
</script>

<script type="text/javascript">
<?php if(isset($_GET['err'])): ?>

toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}
Command: toastr["error"]("<?php echo $_GET['err']?>")

<?php endif ?>
</script>   
</body>
</html>
