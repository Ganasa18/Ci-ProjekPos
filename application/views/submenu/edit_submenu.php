  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Menu Form</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-fw fa-tachometer-alt"></i></a>
            <li class="breadcrumb-item">Menu Submenu Management</li>
            <li class="breadcrumb-item active">Form Submenu</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card card-info col-lg-6 mx-auto">
          <div class="card-header">
            <h3 class="card-title"> Add Submenu</h3>
          </div>
          <form class="form-horizontal" action="#" method="post">
            <div class="card-body">
              <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label"> Title </label>
                <div class="col-sm-10">
                  <input type="hidden" name="id" value="<?= $submenu['id']; ?>">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title Name" value="<?= $submenu['title']; ?>">
                  <?= form_error('title', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>

              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label"> Menu Id </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="menu_id" name="menu_id" value="<?= $submenu['menu_id']; ?>" readonly>
                  <?= form_error('menu_id', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>

              <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label"> Url </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="url" name="url" placeholder="Url Name" value="<?= $submenu['url']; ?>">
                  <?= form_error('url', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="icon" class="col-sm-2 col-form-label"> Icon </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control selector" id="icon" name="icon" placeholder="Icon Name" value="<?= $submenu['icon']; ?>">
                  <?= form_error('icon', '<small class="text-danger pl-2">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <div class="form-check mt-1" style="margin-left: 18%;">
                  <input type="checkbox" class="form-check-input" value="1" name="is_active" id="is_active" checked>
                  <label for="is_active" class="form-check-label">
                    Active ?
                  </label>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?= site_url('menu/submenu'); ?>" class="btn btn-primary"><i class="fa fa-undo"></i> Kembali </a>
              <button type="submit" class="btn btn-success float-right"><i class="fa fa-user-plus"></i> Tambah Data </button>
              <button type="reset" class="btn btn-warning float-right mr-3"><i class="fas fa-retweet"></i></i> Reset </button>
            </div>
          </form>
        </div>
        <!-- /.card -->

      </div>
    </div>
  </section>


  <!-- Main content -->