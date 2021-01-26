<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('name'); ?></span>
                        <img class="img-profile rounded-circle" src="<?php echo base_url(); ?>assets/default.png">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" data-id="<?php echo $this->session->userdata('username'); ?>" href="#" id="logout">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->

        <script>
            $('#logout').click(function() {
                let _id = $('#logout').attr('data-id');
                Swal.fire({
                    title: 'Apakah Anda Yakin Keluar Dari Sistem ?',
                    showCancelButton: true,
                    confirmButtonText: `Logout`,
                    confirmButtonColor: '#d33',
                    icon: 'question'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            method: "GET",
                            url: "<?php echo base_url(); ?>" + "logout",
                            dataType: "json",
                            success: function(data) {
                                if (data.status == "success") {
                                    Swal.fire({
                                        type: 'success',
                                        title: "Logout Sukses",
                                        text: data.messages,
                                        timer: 3000,
                                        icon: 'success',
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    }).then(function() {
                                        window.location.href = "<?php echo base_url(); ?>" + "gate";
                                    });
                                } else if (data.status == "failed") {
                                    toastr.error(data.messages);
                                }
                            },
                            error: function(error) {
                                console.log(error);
                                toastr.error("Error" + eval(error));
                            }
                        })
                    }
                })
            });
        </script>