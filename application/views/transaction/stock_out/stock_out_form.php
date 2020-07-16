  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> <?= $title; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#"><i class="fas fa-fw fa-tachometer-alt"></i></a>
            <li class="breadcrumb-item">Stock Out</li>
            <li class="breadcrumb-item active">Form</li>
          </ol>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <?php $this->view('message');  ?>
    <div class="container-fluid">
      <div class="row">
        <div class="card card-info col-lg-5 mx-auto">
          <div class="card-header">
            <h3 class="card-title"> Stock Keluar </h3>
          </div>
          <form class="form-horizontal" action="<?= site_url('stock/process') ?>" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="date" class="col-sm-2 col-form-label">Date </label>
              </div>
              <div class="form-group row">
                <div class="col-sm">
                  <input type="date" class="form-control" id="date" name="date" placeholder="Date" value="<?= date('Y-m-d') ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label for="barcode" class="col-sm-2 col-form-label">Barcode </label>
              </div>
              <div class="form-group row input-group ml-1">
                <input type="hidden" name="item_id" id="item_id">
                <input type="barcode" class="form-control" id="barcode" name="barcode" placeholder="Barcode" value="" required autofocus>
                <span class="input-group-append">
                  <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                    <i class="fa fa-search"></i>
                  </button>
                </span>
              </div>
              <div class="form-group">
                <label for="item_nama" class="col-sm-2 col-form-label">Item Name </label>
              </div>
              <div class="form-group row">
                <div class="col-sm">
                  <input type="text" class="form-control" id="item_nama" name="item_nama" placeholder="Item Name" readonly>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-7">
                    <label for="item_units" class="col-form-label ml-2 mb-1">Item Units </label>
                    <input type="text" class="form-control" id="item_units" name="item_units" value="-" readonly>
                  </div>
                  <div class="col-md-5">
                    <label for="stock" class="col-form-label ml-2 mb-1">Stock Awal </label>
                    <input type="text" class="form-control" id="stock" name="stock" value="-" readonly>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="detail" class="col-sm-2 col-form-label">Detail </label>
              </div>
              <div class="form-group row">
                <div class="col-sm">
                  <input type="text" class="form-control" id="detail" name="detail" placeholder="Tambahan / grosir / etc" required>
                </div>
              </div>
              <div class="form-group">
                <label for="qty" class="col-sm-2 col-form-label">Quantity </label>
              </div>
              <div class="form-group row">
                <div class="col-sm">
                  <input type="number" class="form-control" id="qty" name="qty" required>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?= site_url('stock/out'); ?>" class="btn btn-primary"><i class="fa fa-undo"></i> Kembali </a>
              <button type="submit" name="out_add" class="btn btn-success float-right"><i class="fa fa-user-plus"></i> Tambah Data </button>
              <button type="reset" class="btn btn-warning float-right mr-3"><i class="fas fa-retweet"></i></i> Reset </button>
            </div>
          </form>
        </div>
        <!-- /.card -->

      </div>
    </div>
  </section>

  <div class="modal fade show" id="modal-item">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"> Item </h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="table1">
              <thead>
                <tr>
                  <th> Barcode </th>
                  <th> Name </th>
                  <th> Units </th>
                  <th> Price </th>
                  <th> Stock </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($item as $i => $data) : ?>
                  <tr>
                    <td><?= $data->barcode; ?></td>
                    <td><?= $data->name; ?></td>
                    <td class="text-right"><?= $data->units_name; ?></td>
                    <td class="text-right"><?= indo_currency($data->price); ?></td>
                    <td class="text-right"><?= $data->stock; ?></td>
                    <td>
                      <button class="btn btn-block btn-outline-secondary" id="select" data-id="<?= $data->item_id; ?>" data-barcode="<?= $data->barcode; ?>" 
                      data-name="<?= $data->name; ?>" data-units="<?= $data->units_name; ?>" data-stock="<?= $data->stock; ?>">
                        <i class="fa fa-check-circle"> Select </i>
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary btn-flat">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main content -->
  <script>
    $(document).ready(function() {
      $(document).on('click', '#select', function() {
        var item_id = $(this).data('id');
        var barcode = $(this).data('barcode');
        var name = $(this).data('name');
        var units_name = $(this).data('units');
        var stock = $(this).data('stock');
        $('#item_id').val(item_id);
        $('#barcode').val(barcode);
        $('#item_nama').val(name);
        $('#item_units').val(units_name);
        $('#stock').val(stock);
        $('#modal-item').modal('hide');
      })
    })
  </script>