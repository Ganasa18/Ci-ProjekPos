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
          <li class="breadcrumb-item active">Role Access</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <?= $this->session->flashdata('message'); ?>
        <div class="card">
          <div class="card-header">
            <h4>Role Access</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-md text-center">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th>Access</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  <?php foreach ($menu as $m) : ?>
                    <tr>
                      <th scope="row" style="padding-top: 20px;"><?= $i; ?></th>
                      <td><?= $m['menu']; ?></td>
                      <td>
                        <div class="form-check">
                          <input class="checked" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                        </div>
                      </td>
                    </tr>
                    <?php $i++; ?>
                  <?php endforeach; ?>
                  <a href="<?= site_url('admin/role'); ?>" class="btn btn-info mb-3"><i class="fa fa-fw fa-home"></i> Kembali </a>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  $('.checked').on('change', function() {
    const menuId = $(this).data('menu');
    const roleId = $(this).data('role');

    $.ajax({
      url: '<?= site_url('admin/changeaccess'); ?>',
      type: 'POST',
      data: {
        menuId: menuId,
        roleId: roleId
      },
      success: function() {
        document.location.href = "<?= site_url('admin/roleaccess/'); ?>" + roleId;
      }
    })
  })
  $(function() {
    $('.checked').bootstrapToggle({
      on: 'Enabled',
      off: 'Disabled',
      onstyle: 'success',
      offstyle: 'danger',
    });
  })
</script>