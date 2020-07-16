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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@1,100&display=swap" rel="stylesheet">
  <!-- Font Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>vendor/font-pick/awesome4-iconpicker.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Switch Bootstrap -->
  <link rel="stylesheet" href="<?= base_url() ?>vendor/css/bootstrap4-toggle.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- ChartJS -->
  <script src="<?= base_url() ?>vendor/adminlte/plugins/chart.js/chart.min.js"></script>
</head>

<body class=" hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown mb-2 mr-3">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user mr-2"></i>
            <span> <?= ucfirst($user['username']); ?> </span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="<?= base_url('user/profile'); ?>" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="<?= base_url('uploads/profile/') . $user['image']; ?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    <?= $user['fullname']; ?>
                  </h3>
                  <p class="text-sm"><?= $user['address']; ?> </p>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= site_url('user/profile'); ?>" class="dropdown-item">
              <div class="media">
                <i class="fas fa-user mr-4"></i>
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Profile
                  </h3>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="<?= site_url('auth/logout'); ?>" class="dropdown-item dropdown-footer badge badge-danger" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="<?= base_url(); ?>" class="brand-link">
        <img src="<?= base_url() ?>vendor/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">My-POS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?= base_url('uploads/profile/') . $user['image']; ?>" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $user['fullname'] ?></a>
          </div>
        </div>
        <nav class="mt-2">
          <!-- Sidebar Menu -->
          <!-- QUERY MENU -->
          <?php
          $role_id  = $this->session->userdata('role_id');
          $queryMenu = "SELECT `user_menu`.`id`, `menu`
                FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_access_menu`.`menu_id` ASC
                ";

          $menu = $this->db->query($queryMenu)->result_array();
          ?>
          <!-- LOOPING MENU -->
          <?php foreach ($menu as $m) : ?>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-header" style="font-family: 'Roboto Mono', monospace;"><?= strtoupper($m['menu']); ?></li>
              <!-- SUB MENU SESUAI MENU -->
              <?php
              $menuId = $m['id'];
              $querySubMenu = "SELECT *
                         FROM `user_sub_menu` JOIN `user_menu`
                         ON `user_sub_menu`. `menu_id` = `user_menu`.`id`
                         WHERE `user_sub_menu`.`menu_id` = $menuId
                         AND `user_sub_menu`.`is_active` = 1
                       ";
              $subMenu = $this->db->query($querySubMenu)->result_array();
              ?>
              <?php foreach ($subMenu as $sm) : ?>
                <?php if ($title == $sm['title']) : ?>
                  <li class="nav-item mt-1">
                    <a class="nav-link active" href="<?= base_url($sm['url']); ?>">
                    <?php else : ?>
                  <li class="nav-item mt-1">
                    <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                    <?php endif; ?>

                    <i class="mt-1 mb-1 nav-icon <?= $sm['icon']; ?>"></i>
                    <p> <?= ucfirst($sm['title']); ?> </p>
                    </a>
                  </li>
                <?php endforeach; ?>
              <?php endforeach; ?>

              <li class="nav-item mt-2">
                <a href="<?= site_url('auth/logout'); ?>" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p> Logout! </p>
                </a>
              </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- jQuery -->
    <script src="<?= base_url() ?>vendor/font-pick/jquery-3.5.0.min.js"></script>
    <!-- <script src="<?= base_url() ?>vendor/font-pick/js/jquery-3.2.1.min.js"></script> -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <?php echo $contents ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.1
      </div>
      &copy;
      <script>
        document.write(new Date().getFullYear())
      </script> made with <i class="ion ion-person ml-2 mr-2"></i> Admin LTE 3
      <a class="font-weight-bold ml-1"> - Web Programing 3 UBSI</a>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap 4 -->
  <script src="<?= base_url() ?>vendor/font-pick/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="<?= base_url() ?>vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
  <!-- AdminLTE App -->
  <script src="<?= base_url() ?>vendor/adminlte/dist/js/adminlte.min.js"></script>
  <!-- SweetAlert2 -->
  <script src="<?= base_url() ?>vendor/adminlte/plugins/sweetalert2/sweetalert2.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= base_url() ?>vendor/adminlte/dist/js/demo.js"></script>
  <!-- Font Picker -->
  <script src="<?= base_url() ?>vendor/font-pick/awesome4-iconpicker.min.js"></script>
  <!-- DataTables -->
  <script src="<?= base_url() ?>vendor/adminlte/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?= base_url() ?>vendor/adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- Switch Boostrap -->
  <script src="<?= base_url() ?>vendor/js/bootstrap4-toggle.min.js"></script>
  
  <script>
    // Data table
    $(document).ready(function() {
      $('#table1').DataTable()
    })
    // Custom input
    $('.custom-file-input').on('change', function() {
      let fileName = $(this).val().split('\\').pop();
      $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    // Icon pick
    $('.selector').iconpicker({
      outputType: 'html'
    });
  </script>
</body>
</html>