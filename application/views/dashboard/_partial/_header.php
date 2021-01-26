<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="<?php echo $this->security->get_csrf_token_name(); ?>" content="<?php echo $this->security->get_csrf_hash(); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo SITE_NAME . " : " . ucfirst($this->uri->segment(1)) . " - " . ucfirst($this->uri->segment(2)); ?></title>

  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url(); ?>assets/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url(); ?>assets/dashboard/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo base_url(); ?>assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <!-- Datepicker -->
  <link href="<?php echo base_url(); ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">

   <!-- DateRangePicker -->
  <link href="<?php echo base_url(); ?>assets/daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/select2/css/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/select2/css/select2.min.css">

  <!-- ColorPicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">

  <!-- SweetAlert 2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert2/sweetalert2.min.css">

  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/toastr/toastr.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/dashboard/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/dashboard/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/dashboard/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/dashboard/js/demo/datatables-demo.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/dashboard/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/dashboard/js/demo/chart-area-demo.js"></script>
  <script src="<?php echo base_url(); ?>assets/dashboard/js/demo/chart-pie-demo.js"></script>

  <!-- Datepicker -->
  <script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

  <!-- CK Editor -->
  <script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>

  <!-- Select2 -->
  <script src="<?php echo base_url(); ?>assets/select2/js/select2.min.js"></script>

  <!-- DateRangePicker -->
  <script src="<?php echo base_url(); ?>assets/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/daterangepicker/daterangepicker.js"></script>

  <!-- Moment JS -->
  <script src="<?php echo base_url(); ?>assets/moment/moment.min.js"></script>
  
  <!-- ColorPicker -->
  <script src="<?php echo base_url(); ?>assets/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

  <!-- BS File Input -->
  <script src="<?php echo base_url(); ?>assets/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="<?php echo base_url(); ?>assets/sweetalert2/sweetalert2.min.js"></script>

  <!-- Bootstrap  -->
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>

  <!-- Toastr 2 -->
  <script src="<?php echo base_url(); ?>assets/toastr/toastr.min.js"></script>

  <!-- BlockUI  -->
  <script src="<?php echo base_url(); ?>assets/blockUI/jquery.blockUI.js"></script>

  <script src="<?php echo base_url(); ?>assets/customjs/main.js"></script>

  <script>
    $(document).ajaxStart(function() {
      $.blockUI({
        css: {
          border: 'none',
          padding: '15px',
          backgroundColor: '#000',
          '-webkit-border-radius': '10px',
          '-moz-border-radius': '10px',
          opacity: .5,
          color: '#fff',
        },
        message: '<i class="fas fa-spinner fa-pulse"></i>  Mohon Tunggu Sebentar'
      })
    });
    $(document).ajaxStop(function() {
      $.unblockUI();
    });
  </script>

</head>