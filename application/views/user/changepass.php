<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-fw fa-tachometer-alt"></i></a>
          <li class="breadcrumb-item">User</li>
          <li class="breadcrumb-item active">Change Password</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<section class="content">
  <div class="container-fluid">
    <div class="col-lg-7">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 style="font-family: 'Times New Roman', Times, serif;"> <?= 'Form ' . $title; ?> </h3>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
        <div class="card-body" style="font-family: 'Times New Roman', Times, serif;">
          <form class="form-horizontal" method="post" action="<?= site_url('user/changepassword') ?>">
            <div class="form-group row">
              <label for="currentpass" class="col-sm-4 col-form-label"> Curent Password </label>
              <div class="col-sm-8">
                <input type="text" name="currentpass" class="form-control" id="currentpass">
                <?= form_error('currentpass', '<small class="text-danger pl-2 mb-2">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="newpass" class="col-sm-4 col-form-label"> New Password </label>
              <div class="col-sm-8">
                <input type="password" name="newpass" class="form-control" id="newpass">
                <?= form_error('newpass', '<small class="text-danger pl-2 mb-2">', '</small>'); ?>
              </div>
            </div>
            <div class="form-group row">
              <label for="repeatpass" class="col-sm-4 col-form-label"> Repeat Password </label>
              <div class="col-sm-8">
                <input type="password" name="repeatpass" class="form-control" id="repeatpass">
                <?= form_error('repeatpass', '<small class="text-danger pl-2 mb-2">', '</small>'); ?>
              </div>
            </div>
            <div class="row justify-content-end">
              <button type="reset" class="btn btn-flat mr-2 btn-warning"> Reset </button>
              <button type="submit" class="btn btn-flat mr-2 btn-primary"> Submit </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>