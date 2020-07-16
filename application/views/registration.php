<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition register-page">
  <div class="register-box">
    <div class="register-logo">
      <a href="#"><b>Admin </b>My-POS</a>
    </div>
    <div class="card">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="<?= base_url('auth/registration') ?>" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full name" value="<?= set_value('fullname'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user-tie"></span>
              </div>
            </div>
          </div>
          <?= form_error('fullname', '<small class="text-danger pl-2">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <?= form_error('username', '<small class="text-danger pl-2">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password1" name="password1" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row justify-content-end">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
          </div>
        </form>
        <hr>
        <a href="<?= base_url('auth'); ?>" class="text-center">I already have a membership</a>
      </div>
    </div>
  </div>

  <!-- jQuery -->
  <!-- <script src="<?= base_url() ?>vendor/adminlte/plugins/jquery/jquery.min.js"></script> -->
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>vendor/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>