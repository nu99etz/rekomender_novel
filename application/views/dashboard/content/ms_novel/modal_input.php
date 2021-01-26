<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<style>
  #foto {
    display: none;
  }
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title-modal"></h5>
        <button type="button" id="close" class="close" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form" method="post" enctype="multipart/form-data">
          <input type="hidden" id="csrf" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
          <div class="form-group">
            <label>No Novel</label>
            <input type="text" id="no_novel" class="form-control" name="no_novel" placeholder="No Novel">
          </div>
          <div class="form-group">
            <label>Nama Novel</label>
            <input type="text" id="nama_novel" class="form-control" name="nama_novel" placeholder="Nama Novel">
          </div>
          <div class="form-group">
            <label>Authors Novel</label>
            <input type="text" id="authors_novel" class="form-control" name="authors_novel" placeholder="Authors Novel">
          </div>
          <div class="form-group">
            <label>Kategori</label>
            <select class="" style="width: 100%" id="genre_novel" name="genre_novel[]" multiple="multiple">
              <option value=""></option>
            </select>
          </div>
          <div class="form-group">
            <label>Tahun Novel</label>
            <input type="text" id="year_novel" class="form-control" name="year_novel" placeholder="Tahun Novel">
          </div>
          <div class="form-group">
            <label>Sampul Novel</label>
            <input type="file" name="sampul_novel" accept="image/*" id="foto">
            <center>
              <img src="<?php echo base_url(); ?>assets/default.png" class="rounded" alt="..." width="400" height="600" id="preview">
            </center>
          </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" id="aksi" value="">
        <input type="hidden" id="data-id" value="">
        <button type="button" class="btn btn-secondary" id="cusreset">Reset</button>
        <button type="submit" id="action" class="btn btn-primary"></button>
      </div>
    </div>
  </div>
</div>

<script>
  $('#preview').click(function() {
    $('#foto').click();
  });

  $('#foto').on('change', function() {
    renderImg(this);
  });

  let _date_elem = [
    $('#year_novel'),
  ];

  DateRangePicker(_date_elem);

  function renderImg(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('#preview').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }

  let select2_var = [
    [
      $('#genre_novel'),
      "-- PILIH KATEGORI --",
      "<?php echo base_url(); ?>ms_kategori/ajax_select2"
    ]
  ];

  Select2Custom(select2_var);
</script>