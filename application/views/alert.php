<?php
if ($this->session->flashdata('message')) {
  if ($this->session->flashdata('message') == TRUE) {
?>

    <div class="alert alert-<?php echo $this->session->flashdata('message_type') ?>">
      <?php echo $this->session->flashdata('message_text') ?>
    </div>

<?php
  }
}
?>