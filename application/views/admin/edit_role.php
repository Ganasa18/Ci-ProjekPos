<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-fw fa-tachometer-alt"></i></a>
          <li class="breadcrumb-item">Role</li>
          <li class="breadcrumb-item active">Edit Role</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-5">
        <div class="card">
          <div class="card-header">
            <h4>Edit Role</h4>
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="" method="post">
              <?= form_error('role', '<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>'); ?>

              <div class="form-group row">
                <label for="role" class="col-sm-2 col-form-label"> Role </label>
                <div class="col-sm-10">
                  <input type="hidden" name="id" id="id" value="<?= $role['id']; ?>">
                  <input type="text" class="form-control form-horizontal" id="role" name="role" placeholder="Role Name" value="<?= $role['role']; ?>">
                </div>
              </div>
              <div class="row justify-content-end">
                <a href="<?= site_url('admin/role') ?>" class="btn btn-info ml-1"><i class="fa fa-fw fa-home"></i> Back </a>
                <button type="submit" class="btn btn-primary ml-1"> Submit </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>