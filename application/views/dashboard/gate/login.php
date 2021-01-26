<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title><?php echo SITE_NAME . " : " . ucfirst($this->uri->segment(1)) . " - " . ucfirst($this->uri->segment(2)); ?></title>
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/toastr/toastr.min.css">

  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">

  <!-- SweetAlert 2 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/sweetalert2/sweetalert2.min.css">

  <link href="<?php echo base_url(); ?>assets/dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>assets/dashboard/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/dashboard/vendor/jquery-easing/jquery.easing.min.js"></script>
  <!-- Bootstrap  -->
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- Toastr 2 -->
  <script src="<?php echo base_url(); ?>assets/toastr/toastr.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/customjs/main.js"></script>
  <!-- BlockUI  -->
  <script src="<?php echo base_url(); ?>assets/blockUI/jquery.blockUI.js"></script>
  <!-- SweetAlert 2 -->
  <script src="<?php echo base_url(); ?>assets/sweetalert2/sweetalert2.min.js"></script>

  <script type='text/javascript'>
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

  <style>
    body {
      /*color: #000;*/
      overflow-x: hidden;
      height: 100%;
      background-color: #B0BEC5;
      background-repeat: no-repeat
    }

    .card0 {
      box-shadow: 0px 4px 8px 0px #757575;
      border-radius: 0px
    }

    .card2 {
      margin: 0px 40px
    }

    .logo {
      width: 200px;
      height: 100px;
      margin-top: 20px;
      margin-left: 35px
    }

    .image {
      width: 360px;
      height: 280px
    }

    .border-line {
      border-right: 1px solid #EEEEEE
    }

    .facebook {
      background-color: #3b5998;
      color: #fff;
      font-size: 18px;
      padding-top: 5px;
      border-radius: 50%;
      width: 35px;
      height: 35px;
      cursor: pointer
    }

    .twitter {
      background-color: #1DA1F2;
      color: #fff;
      font-size: 18px;
      padding-top: 5px;
      border-radius: 50%;
      width: 35px;
      height: 35px;
      cursor: pointer
    }

    .linkedin {
      background-color: #2867B2;
      color: #fff;
      font-size: 18px;
      padding-top: 5px;
      border-radius: 50%;
      width: 35px;
      height: 35px;
      cursor: pointer
    }

    .line {
      height: 1px;
      width: 45%;
      background-color: #E0E0E0;
      margin-top: 10px
    }

    .or {
      width: 10%;
      font-weight: bold
    }

    .text-sm {
      font-size: 14px !important
    }

    ::placeholder {
      color: #BDBDBD;
      opacity: 1;
      font-weight: 300
    }

    :-ms-input-placeholder {
      color: #BDBDBD;
      font-weight: 300
    }

    ::-ms-input-placeholder {
      color: #BDBDBD;
      font-weight: 300
    }

    input,
    textarea {
      padding: 10px 12px 10px 12px;
      border: 1px solid lightgrey;
      border-radius: 2px;
      margin-bottom: 5px;
      margin-top: 2px;
      width: 100%;
      box-sizing: border-box;
      color: #2C3E50;
      font-size: 14px;
      letter-spacing: 1px
    }

    input:focus,
    textarea:focus {
      -moz-box-shadow: none !important;
      -webkit-box-shadow: none !important;
      box-shadow: none !important;
      border: 1px solid #304FFE;
      outline-width: 0
    }

    button:focus {
      -moz-box-shadow: none !important;
      -webkit-box-shadow: none !important;
      box-shadow: none !important;
      outline-width: 0
    }

    a {
      color: inherit;
      cursor: pointer
    }

    .btn-blue {
      background-color: #1A237E;
      width: 150px;
      color: #fff;
      border-radius: 2px
    }

    .btn-blue:hover {
      background-color: #000;
      cursor: pointer
    }

    .bg-blue {
      color: #fff;
      background-color: #1A237E
    }

    @media screen and (max-width: 991px) {
      .logo {
        margin-left: 0px
      }

      .image {
        width: 300px;
        height: 220px
      }

      .border-line {
        border-right: none
      }

      .card2 {
        border-top: 1px solid #EEEEEE !important;
        margin: 0px 15px
      }
    }
  </style>
</head>

<body>
  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
      <div class="row d-flex">
        <div class="col-lg-6">
          <div class="card1 pb-5">
            <div class="row"> <img src="https://i.imgur.com/CXQmsmF.png" class="logo"> </div>
            <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card2 card border-0 px-4 py-5">
            <div class="row mb-4 px-3">
              <h4 id="sub-title"></h4>
            </div>
            <div class="row px-3 mb-4">
            </div>
            <form method="post" id="form-login">
              <div class="row px-3">
                <label class="mb-1">
                  <h6 class="mb-0 text-sm">Username</h6>
                </label> <input class="mb-4" type="text" name="username" id="username" placeholder="Username">
              </div>
              <div class="row px-3">
                <label class="mb-1">
                  <h6 class="mb-0 text-sm">Password</h6>
                </label>
                <input type="password" name="password" id="password" placeholder="Password">
              </div>
              <div class="row px-3 mb-4">

              </div>
              <div class="row mb-3 px-3"> <button type="submit" id="login" class="btn btn-blue text-center">Login</button> </div>
              <div class="row mb-4 px-3"> <small class="font-weight-bold">Belum Punya AKun? <a class="text-danger " id="change-register">Register</a></small> </div>
            </form>


            <form method="post" id="form-register">
              <div class="row px-3">
                <label class="mb-1">
                  <h6 class="mb-0 text-sm">Username</h6>
                </label> <input class="mb-4" type="text" name="username" id="username" placeholder="Username">
              </div>
              <div class="row px-3">
                <label class="mb-1">
                  <h6 class="mb-0 text-sm">Nama User</h6>
                </label> <input class="mb-4" type="text" name="nama_user" id="nama_user" placeholder="Nama User">
              </div>
              <div class="row px-3">
                <label class="mb-1">
                  <h6 class="mb-0 text-sm">Password</h6>
                </label>
                <input type="password" name="password" id="password" placeholder="Password">
              </div>
              <div class="row px-3 mb-4">

              </div>
              <div class="row mb-3 px-3"> <button type="submit" id="register" class="btn btn-blue text-center">Register</button> </div>
              <div class="row mb-4 px-3"> <small class="font-weight-bold">Sudah Punya Akun? <a class="text-danger " id="change-login">Login</a></small> </div>
            </form>
          </div>
        </div>
      </div>
      <div class="bg-blue py-4">
        <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2"><?php echo SITE_CREATED;?></small>
          <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
        </div>
      </div>
    </div>
  </div>

  <script type='text/javascript'>
    $('#sub-title').html("Silahkan Login");

    $('#form-register').hide();

    $('#change-register').click(function() {
      $('#form-login').hide();
      $('#sub-title').html("Silahkan Daftar");
      $('#form-register').show();
    });

    $('#change-login').click(function() {
      $('#form-login').show();
      $('#sub-title').html("Silahkan Login");
      $('#form-register').hide();
    });

    $('#form-register').on('submit', function() {
      event.preventDefault();
      let _data = new FormData($(this)[0]);
      $.ajax({
        url: "<?php echo base_url(); ?>" + "auth/store",
        method: "POST",
        data: _data,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        success: function(data) {
          if (data.status == 'notvalid') {
            toastr.error(data.messages);
          } else if (data.status == 'failed') {
            toastr.error(data.messages);
          } else if (data.status == 'success') {
            toastr.success(data.messages);
            $('#form-register')[0].reset();
            $('#form-login').show();
            $('#sub-title').html("Silahkan Login");
            $('#form-register').hide();
          }
        },
        error: function(xhr, error) {
          console.log(error);
          toastr.error("Error" + xhr.responseText);
        }
      });
    });


    $('#form-login').on('submit', function() {
      event.preventDefault();
      let _data = new FormData($(this)[0]);
      let _form_id = $('#form-login');
      $('#login').html('<i class="fas fa-spinner fa-pulse"></i>');
      $.ajax({
        method: "POST",
        data: _data,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        url: "<?php echo base_url(); ?>" + "authaction",
        success: function(data) {
          if (data.status == "notvalid") {
            toastr.error(data.messages);
          } else if (data.status == "failed") {
            toastr.error(data.messages);
          } else if (data.status == "success") {
            Swal.fire({
              type: 'success',
              title: "Login Sukses",
              text: data.messages,
              timer: 3000,
              icon: 'success',
              showCancelButton: false,
              showConfirmButton: false
            }).then(function() {
              window.location.href = "<?php echo base_url(); ?>";
            });
          }
        },
        error: function(error) {
          toastr.error("Error" + eval(error));
        }
      });
      $('#login').html('Login');
    });
  </script>

</body>

</html>