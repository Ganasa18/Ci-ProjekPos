<?php if ($this->session->has_userdata('message')) { ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-check"></i> <?= $this->session->flashdata('message');  ?>
  </div>
<?php } ?>

<?php if ($this->session->has_userdata('error')) { ?>
  <div class="alert alert-warning alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <i class="icon fas fa-ban"></i> <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error')));  ?>
  </div>
<?php } ?>