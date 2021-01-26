<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Master Novel</h1>
  <!-- <p class="mb-4"></p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Master Novel</h6>
      </divi>
      <div class="card-body">
        <div>
          <button type="button" class="btn btn-sm btn-primary float-right" id="tambah"><i class="fa fa-plus"></i> Tambah</button>
        </div>
        <br /><br />
        <div class="table-responsive">
          <table class="table table-bordered" id="ms_novel" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Novel</th>
                <th>Nama Novel</th>
                <th>Autors Novel</th>
                <th>Genre Novel</th>
                <th>Tahun Novel</th>
                <th>Sampul Novel</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nomor Novel</th>
                <th>Nama Novel</th>
                <th>Autors Novel</th>
                <th>Genre Novel</th>
                <th>Tahun Novel</th>
                <th>Sampul Novel</th>
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

    let _url = "<?php echo base_url(); ?>ms_novel/ajax";
    let _table_id = $('#ms_novel');

    DataTables(_url, _table_id, token_name, token);

    $('#tambah').click(function() {
      $('#exampleModal').modal('show');
      $('#title-modal').html('Tambah Novel');
      $('#hash_pw').show();
      $('#action').html('Save');
      $('#aksi').val('simpan');
    });

    $(document).on('click', '.edit', function() {
      $('#exampleModal').modal('show');
      $('#title-modal').html('Edit Novel');
      $('#action').html('Update');
      $('#aksi').val('ubah');
      var id = $(this).attr('id');
      $('#data-id').val(id);
      $.ajax({
        url: "<?php echo base_url(); ?>ms_novel/edit/" + id,
        dataType: "json",
        success: function(data) {
          if (data.status == "success") {
            var explode_kategori = data.data[0].genre_novel.split(',');
            var explode_idkat = data.data[0].id_genre.split(',');
            for (i = 0; i < explode_kategori.length; i++) {
              kategori = new Option(explode_kategori[i], explode_idkat[i], true, true);
              $('#genre_novel').append(kategori).trigger('change')
              $('#genre_novel').trigger({
                type: 'select:select',
                params: {
                  data: data.data[0]
                }
              });
            }
            $('#no_novel').val(data.data[0].no_novel);
            $('#nama_novel').val(data.data[0].nama_novel);
            $('#authors_novel').val(data.data[0].authors_novel);
            $('#year_novel').val(data.data[0].year_novel);
            $('#preview').attr('src', "<?php echo base_url(); ?>assets/novel/" + data.data[0].sampul_novel);
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
    let _url = "<?php echo base_url(); ?>ms_novel/destroy/" + $(this).attr('id');
    let _table = $('#ms_novel');
    DeleteData(_url, _table);
  })

  $('#form').on('submit', function() {
    event.preventDefault();
    let _data = new FormData($(this)[0]);
    let _form_id = $('#form');
    let _modal = $('#exampleModal');
    var id = $('#data-id').val();
    let _table_id = $('#ms_novel');
    let _select2 = [$('#genre_novel')];
    if ($('#aksi').val() == "simpan") {
      let _url = "<?php echo base_url(); ?>ms_novel/store";
      SendData(_url, _data, _form_id, null, _modal, _table_id);
      $('#preview').attr('src', "<?php echo base_url(); ?>assets/default.png");
      $('#genre_novel').val([]).trigger('change');
    } else if ($('#aksi').val() == "ubah") {
      let _url = "<?php echo base_url(); ?>ms_novel/update/" + id;
      SendData(_url, _data, _form_id, null, _modal, _table_id);
      $('#preview').attr('src', "<?php echo base_url(); ?>assets/default.png");
      $('#genre_novel').val([]).trigger('change');
    }
  });

  $('#close').click(function() {
    $('#exampleModal').modal('hide');
    $('#form')[0].reset();
    $('#preview').attr('src', "<?php echo base_url(); ?>assets/default.png");
    $('#genre_novel').val([]).trigger('change');
  });

  $('#cusreset').click(function() {
    $('#form')[0].reset();
    $('#preview').attr('src', "<?php echo base_url(); ?>assets/default.png");
    $('#genre_novel').val([]).trigger('change');
  });
</script>