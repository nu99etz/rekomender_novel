<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<style>
  .checked {
    color: orange;
  }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Silahkan Rating</h1>
  <!-- <p class="mb-4"></p> -->

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Silahkan Rating</h6>
      </divi>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="go_rating" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nomor Novel</th>
                <th>Nama Novel</th>
                <th>Sampul Novel</th>
                <th>Jumlah Rating</th>
                <th>Rating</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>No</th>
                <th>Nomor Novel</th>
                <th>Nama Novel</th>
                <th>Sampul Novel</th>
                <th>Jumlah Rating</th>
                <th>Rating</th>
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

    let _url = "<?php echo base_url(); ?>go_rating/ajax";
    let _table_id = $('#go_rating');

    let table = $(_table_id).DataTable({
      language: {
        "decimal": "",
        "emptyTable": "Data kosong",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
        "infoFiltered": "(hasil dari _MAX_ total data)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Menampilkan _MENU_ data",
        "loadingRecords": "Memuat...",
        "processing": "Memproses...",
        "search": "Cari:",
        "zeroRecords": "Tidak ada data yang sesuai",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Selanjutnya",
          "previous": "Sebelumnya"
        },
        "aria": {
          "sortAscending": ": mengurutkan dari terkecil",
          "sortDescending": ": mengurutkan dari terbesar"
        }
      },
      scrollX: true,
      processing: true,
      serverSide: true,
      order: [],
      ajax: {
        url: _url,
        type: "POST",
        data: function(d) {
          d.token_name = token;
        }
      },
      lengthMenu: [
        [100],
        [100]
      ],
      columnDefs: [{
        targets: [0],
        orderable: false
      }],
    });

  });

  $(document).on('click', '.delete', function() {
    let _url = "<?php echo base_url(); ?>go_rating/destroy/" + $(this).attr('id');
    let _table = $('#go_rating');
    DeleteData(_url, _table);
  });

  function goRating(user, novel, rating) {
    let _url = "<?php echo base_url(); ?>go_rating/store/" + user + "/" + novel + '/' + rating;
    let _table = $('#go_rating');
    $.ajax({
      url: _url,
      method: "POST",
      contentType: false,
      cache: false,
      processData: false,
      dataType: "json",
      success: function(data) {
        if (data.status == 'failed') {
          toastr.error(data.messages);
        } else if (data.status == 'success') {
          var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
          });
          Toast.fire({
            icon: 'success',
            title: data.messages
          });
          _table.DataTable().ajax.reload();
        }
      },
      error: function(xhr, error) {
        console.log(error);
        toastr.error("Error" + xhr.responseText);
      }
    });
  }
</script>