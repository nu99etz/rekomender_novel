<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>


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
            <label>Username</label>
            <input type="text" id="username" class="form-control" name="username" placeholder="Username">
          </div>
          <div class="form-group">
            <label>Nama User</label>
            <input type="text" id="nama_user" class="form-control" name="nama_user" placeholder="Nama User">
          </div>
          <div class="form-group" id="hash_pw">
            <label>Password</label>
            <input type="password" id="password" class="form-control" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label>Role</label>
            <select class="" style="width: 100%" id="role" name="role">
              <option value=""></option>
            </select>
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

let select2_var = [
  [
    $('#role'),
    "-- PILIH ROLE --",
    "<?php echo base_url();?>role/ajax_select2"
  ]
]

Select2Custom(select2_var);

</script>