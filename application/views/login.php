<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $title; ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="<?= base_url() ?>vendor/login/images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>vendor/login/css/main.css">
  <!--===============================================================================================-->
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100 p-t-50 p-b-90">
        <form class="login100-form validate-form flex-sb flex-w" action="<?= base_url('auth') ?>" method="post">
          <span class="login100-form-title p-b-51">
            Login
          </span>

          <?php $this->load->view('alert'); ?>

          <div class="wrap-input100 m-b-16">
            <input class="input100" type="text" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
            <span class=" focus-input100"></span>
          </div>
          <?= form_error('username', '<small class="text-danger pl-2 mb-2">', '</small>'); ?>
          <div class="wrap-input100 m-b-16">
            <input class="input100" type="password" id="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>
          <?= form_error('password', '<small class="text-danger pl-2 mb-2">', '</small>'); ?>
          <div class="col-lg">
            <?= $this->session->flashdata('confirm'); ?>
          </div>
          <div class="flex-sb-m w-full m-t-17">
            <div>
              <a href="<?= base_url('auth/registration'); ?>" class="txt1">
                Don't have account ?
              </a>
            </div>
          </div>
          <div class="container-login100-form-btn m-t-17">
            <button type="submit" class="login100-form-btn">
              Login
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- jQuery -->
  <script src="<?= base_url() ?>vendor/adminlte/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url() ?>vendor/login/js/main.js"></script>

</body>

</html>