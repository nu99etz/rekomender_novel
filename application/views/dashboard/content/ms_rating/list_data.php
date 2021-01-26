<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Master Rating</h1>
  <!-- <p class="mb-4"></p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Master Rating</h6>
      </divi>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="ms_rating" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Nama Novel</th>
                <th>Jumlah Rating</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Nama Novel</th>
                <th>Jumlah Rating</th>
                <th>Aksi</th>
              </tr>
            </tfoot>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    var token_name = "<?php echo $this->security->get_csrf_token_name(); ?>";
    var token = "<?php echo $this->security->get_csrf_hash(); ?>";

    let _url = "<?php echo base_url(); ?>ms_rating/ajax";
    let _table_id = $('#ms_rating');

    DataTables(_url, _table_id, token_name, token);

  });

  $(document).on('click', '.delete', function() {
    let _url = "<?php echo base_url(); ?>ms_rating/destroy/" + $(this).attr('id');
    let _table = $('#ms_rating');
    DeleteData(_url, _table);
  });

  
</script>