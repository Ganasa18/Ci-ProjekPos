<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-fw fa-tachometer-alt"></i></a>
          <li class="breadcrumb-item">Customer</li>
          <li class="breadcrumb-item active">Customer Form</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="card card-info col-lg-6 mx-auto">
        <div class="card-header">
          <h3 class="card-title"> Form <?= ucfirst($page); ?></h3>
        </div>
        <form class="form-horizontal" action="<?= site_url('customer/process') ?>" method="post">
          <div class="card-body">
            <div class="form-group row">
              <label for="customer_name" class="col-sm-2 col-form-label"> Customer Name </label>
              <div class="col-sm-10">
                <input type="hidden" name="customer_id" value="<?= $row->customer_id ?>">
                <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Customer Name" value="<?= $row->name ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="gender" class="col-sm-2 col-form-label"> Gender </label>
              <div class="col-sm-10">
                <select name="gender" id="gender" class="form-control">
                  <option value=""> -Select- </option>
                  <option value="M" <?= $row->gender == 'M' ? 'selected' : '' ?>> Laki-Laki </option>
                  <option value="F" <?= $row->gender == 'F' ? 'selected' : '' ?>> Perempuan </option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="phone" class="col-sm-2 col-form-label"> Phone Number </label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="phone" name="phone" placeholder="Customer Phone Number" value="<?= $row->phone ?>" required>
              </div>
            </div>
            <div class="form-group row">
              <label for="address" class="col-sm-2 col-form-label"> Address </label>
              <div class="col-sm-10">
                <textarea name="address" id="address" class="form-control" cols="10" rows="5" required><?= $row->address ?></textarea>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <a href="<?= site_url('customer'); ?>" class="btn btn-primary"><i class="fa fa-undo"></i> Kembali </a>
            <button type="submit" name="<?= $page ?>" class="btn btn-success float-right"><i class="fa fa-user-plus"></i> Tambah Data </button>
            <button type="reset" class="btn btn-warning float-right mr-3"><i class="fas fa-retweet"></i></i> Reset </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>