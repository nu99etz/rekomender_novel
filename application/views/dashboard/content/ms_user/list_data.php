<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Master User</h1>
  <!-- <p class="mb-4"></p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Master User</h6>
      </divi>
      <div class="card-body">
        <div>
          <button type="button" class="btn btn-sm btn-primary float-right" id="tambah"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <br /><br />
        <div class="table-responsive">
          <table class="table table-bordered" id="ms_user" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama User</th>
                <th>Password</th>
                <th>Nama Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama User</th>
                <th>Password</th>
                <th>Nama Role</th>
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

    let _url = "<?php echo base_url(); ?>ms_user/ajax";
    let _table_id = $('#ms_user');

    DataTables(_url, _table_id, token_name, token);

    $('#tambah').click(function() {
      $('#exampleModal').modal('show');
      $('#title-modal').html('Tambah User');
      $('#hash_pw').show();
      $('#action').html('Save');
      $('#aksi').val('simpan');
    });

    $(document).on('click', '.edit', function() {
      $('#exampleModal').modal('show');
      $('#title-modal').html('Edit User');
      $('#action').html('Update');
      $('#aksi').val('ubah');
      var id = $(this).attr('id');
      $('#data-id').val(id);
      $.ajax({
        url: "<?php echo base_url(); ?>ms_user/edit/" + id,
        dataType: "json",
        success: function(data) {
          console.log(data);
          if (data.status == "success") {
            var role = new Option(data.data[0].nama_role, data.data[0].id_role, true, true);
            $('#username').val(data.data[0].username);
            $('#nama_user').val(data.data[0].nama_user);
            $('#hash_pw').hide();
            $('#role').append(role).trigger('change');
          } else {
            toastr.error("Tidak Bisa Menampilkan Data");
          }
        },
        error: function(error) {
          toastr.error("Error" + eval(error));
        }
      });
    });
  });

  $(document).on('click', '.delete', function() {
    let _url = "<?php echo base_url(); ?>ms_user/destroy/" + $(this).attr('id');
    let _table = $('#ms_user');
    DeleteData(_url, _table);
  })

  $('#form').on('submit', function() {
    event.preventDefault();
    let _data = new FormData($(this)[0]);
    let _form_id = $('#form');
    let _modal = $('#exampleModal');
    var id = $('#data-id').val();
    let _table_id = $('#ms_user');
    let _select2 = [$('#role')];
    if ($('#aksi').val() == "simpan") {
      let _url = "<?php echo base_url(); ?>ms_user/store";
      SendData(_url, _data, _form_id, _select2, _modal, _table_id);
    } else if ($('#aksi').val() == "ubah") {
      let _url = "<?php echo base_url(); ?>ms_user/update/" + id;
      SendData(_url, _data, _form_id, _select2, _modal, _table_id);
    }
  });

  $('#close').click(function() {
    $('#exampleModal').modal('hide');
    $('#form')[0].reset();
    $('#role').val('').trigger('change');
  });

  $('#cusreset').click(function() {
    $('#form')[0].reset();
    $('#role').val('').trigger('change');
  });
</script>