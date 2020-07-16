<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><?= $title; ?></h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#"><i class="fas fa-fw fa-tachometer-alt"></i></a>
          <li class="breadcrumb-item">Dashboard</li>
          <li class="breadcrumb-item active">Role</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>


<!-- Small boxes (Stat box) -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4>Role</h4>
          </div>
          <div class="card-body">
            <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal"> Tambah Role </a>
            <?= $this->session->flashdata('message'); ?>
            <?= form_error('role', '<div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>', '</div>'); ?>
            <div class="table-responsive">
              <table class="table table-bordered table-md text-center pb-0">
                <thead>
                  <tr>
                    <th width="10%">#</th>
                    <th width="40%">Role</th>
                    <th width="30%">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach ($role as $r) : ?>
                    <tr>
                      <td class="pt-3"><?= $i++; ?></td>
                      <td><?= $r['role']; ?></td>
                      <td>
                        <a href="<?= base_url('admin/roleaccess/') . $r['id']; ?>" class="btn btn-sm mt-2 mb-2 btn-warning">access</a>
                        <a href="<?= base_url('admin/editrole/') . $r['id']; ?>" class="btn btn-sm mt-2 mb-2 btn-success">Edit</a>
                        <a href="<?= base_url(); ?>admin/delRole/<?= $r['id'] ?>" onclick="return confirm('Yakin Hapus ?')" class="btn btn-sm mt-2 mb-2 btn-danger 
                        <?= $r['role'] == 'Admin' ? 'disabled' : ''; ?>">Delete</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->

<!-- Modal Add-->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel"> Add New Role </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('admin/role'); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" id="role" name="role" placeholder="Role Name" value="<?= set_value('role'); ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>