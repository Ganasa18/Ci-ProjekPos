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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition lockscreen">
  <!-- Automatic element centering -->
  <div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
      <a href=""><b>Admin</b>LTE</a>
    </div>

    <!-- User name -->
    <div class="lockscreen-name"><?= get_cookie('username'); ?></div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
      <!-- lockscreen image -->
      <div class="lockscreen-image">
        <img src="<?= base_url('uploads/profile/') . get_cookie('image') ?>" alt="User Image">
      </div>
      <!-- /.lockscreen-image -->

      <!-- lockscreen credentials (contains the form) -->
      <form class="lockscreen-credentials" action="<?= base_url('auth') ?>" method="post">
        <div class="input-group">
          <input type="hidden" id="username" name="username" class="form-control" placeholder="password" value="<?= get_cookie('username'); ?>">
          <input type="password" id="password" name="password" class="form-control" placeholder="password">

          <div class="input-group-append">
            <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
          </div>
        </div>
      </form>
      <!-- /.lockscreen credentials -->

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
      Enter your password to retrieve your session
    </div>
    <div class="text-center">
      <a href="<?= base_url('auth/logout') ?>">Or Log Out</a>
    </div>
    <div class="lockscreen-footer text-center">
      <script>
        document.write(new Date().getFullYear())
      </script> made with <i class="ion ion-person ml-2 mr-2"></i> Admin LTE 3
      <a class="font-weight-bold ml-1"> - Web Programing 3 UBSI</a>
    </div>
  </div>
  <!-- /.center -->

  <!-- jQuery -->
  <script src="<?= base_url() ?>vendor/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>