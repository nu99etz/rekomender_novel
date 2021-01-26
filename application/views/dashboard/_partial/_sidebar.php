<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo SITE_NAME; ?></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">



      <?php if ($this->session->userdata('role') == 1) {
      ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
          Rekomender
        </div>
        <?php
        foreach ($sidebar as $key) {
        ?>
          <!-- Nav Item - Charts -->
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $key['url']; ?>">
              <i class="<?php echo $key['icon']; ?>"></i>
              <span><?php echo $key['name']; ?></span></a>
          </li>
      <?php }
      } ?>


      <?php if ($this->session->userdata('role') != 1) {
      ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Heading -->
        <div class="sidebar-heading">
          User
        </div>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>go_rating">
            <i class="fa fa-star"></i>
            <span>Rating</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>act_rekom">
            <i class="fa fa-database"></i>
            <span>Rekomendasi</span></a>
        </li>
      <?php } ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->