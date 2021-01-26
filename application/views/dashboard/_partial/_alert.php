<?php

defined('BASEPATH') or exit('No direct script access allowed');

?>

<script type='text/javascript'>
    $(document).ready(function() {
        <?php if ($this->session->flashdata('failed')) {
        ?>
            toastr.error("<?php echo $this->session->flashdata('failed'); ?>");
        <?php } else if ($this->session->flashdata('success')) { ?>
            Swal.fire({
                type: 'success',
                title: "Login Sukses",
                text: "<?php echo $this->session->flashdata('success'); ?>",
                timer: 3000,
                icon: 'success',
                showCancelButton: false,
                showConfirmButton: false
            }).then(function() {
                window.location.href = "<?php echo base_url(); ?>";
            });
        <?php } ?>
    });
</script>