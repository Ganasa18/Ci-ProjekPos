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
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Containt -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-5">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="<?= base_url('uploads/profile/') . $user['image']; ?>" alt="User profile picture">
            </div>
            <h3 class="profile-username text-center"><?= $user['fullname'] ?></h3>
            <p class="text-muted text-center"><?= $user['address']; ?></p>
            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Role</b> <a class="float-right"><?= $user['role_id'] == 1 ? 'Admin' : 'Kasir' ?></a>
              </li>
              <li class="list-group-item">
                <b>Email</b> <a class="float-right"><?= $user['email'] ?></a>
              </li>
              <li class="list-group-item">
                <b>Member Since</b> <a class="float-right"><?= date('d F Y', $user['date_created']); ?></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 style="font-family: 'Times New Roman', Times, serif;"> Form Edit </h3>
          </div>
          <?= $this->session->flashdata('pesan'); ?>
          <div class="card-body" style="font-family: 'Times New Roman', Times, serif;">
            <?= form_open_multipart('user/editProf'); ?>
            <form class="form-horizontal">
              <div class="form-group row">
                <label for="fullname" class="col-sm-4 col-form-label"> Fullname </label>
                <div class="col-sm-8">
                  <input type="hidden" name="id" value="<?= $user['user_id']; ?>">
                  <input type="text" name="fullname" class="form-control" id="fullname" value="<?= $user['fullname']; ?>">
                  <?= form_error('fullname', '<small class="text-danger pl-2 mb-2">', '</small>'); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label"> Email </label>
                <div class="col-sm-8">
                  <input type="text" name="email" class="form-control" id="email" value="<?= $user['email']; ?>" readonly>
                </div>
              </div>
              <div class="form-group row">
                <label for="address" class="col-sm-4 col-form-label"> Address </label>
                <div class="col-sm-8">
                  <input type="text" name="address" class="form-control" id="address" value="<?= $user['address']; ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="image" class="col-sm-4 col-form-label"> Profile Image </label>
                <div class="col-sm-6">
                  <img class="profile-user-img img-fluid img-circle mb-3" src="<?= base_url('uploads/profile/') . $user['image']; ?>" alt="User profile picture">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" for="image">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                  </div>
                  <small>(Biarkan kosong jika tidak diganti )</small>
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
  </div>
</section>