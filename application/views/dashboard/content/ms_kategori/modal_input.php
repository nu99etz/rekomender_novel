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
            <label>Nama Kategori</label>
            <input type="text" id="nama_novel" class="form-control" name="nama_kategori" placeholder="Nama Kategori">
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