<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Master Recomender</h1>
  <!-- <p class="mb-4"></p> -->

  <div class="form-group">
    <label>Nama User</label>
    <select class="" style="width: 100%" id="username" name="username">
      <option value=""></option>
    </select>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Master Recommender</h6>
      </divi>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="ms_rekom" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Novel</th>
                <th>Rata-rata Rating</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nama Novel</th>
                <th>Rata-rata Rating</th>
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

  });

  let select2_var = [
    [
      $('#username'),
      "-- PILIH USER --",
      "<?php echo base_url(); ?>ms_user/ajax_select2"
    ]
  ]

  Select2Custom(select2_var);

  $(document).on('click', '.delete', function() {
    let _url = "<?php echo base_url(); ?>ms_rekom/destroy/" + $(this).attr('id');
    let _table = $('#ms_rekom');
    DeleteData(_url, _table);
  });

  $('#username').change(function() {

    let _url = "<?php echo base_url(); ?>ms_rekom/getRekom/" + $('#username').val();
    let _table_id = $('#ms_rekom');

    _table_id.DataTable().destroy();

    _table_id.DataTable({
      "ajax": _url
    });

  });
</script>