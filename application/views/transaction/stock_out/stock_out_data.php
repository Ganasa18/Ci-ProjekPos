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
          <li class="breadcrumb-item active">Stock Out</li>
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
      <div class="card col-lg">
        <div class="card-header">
          <h3 class="card-title"> Stock Data </h3>
        </div>

        <div class="card-body">
          <div class="mb-3">
            <a href="<?= site_url('stock/stock_out_add'); ?>" class=" float-right btn btn-primary btn-flat just mb-3"><i class="fa fa-plus"></i> Tambah Stock </a>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-striped text-center" id="table1">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th> Barcode </th>
                  <th> Product item </th>
                  <th> Quantity </th>
                  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($stock as $key => $data) : ?>
                  <tr>
                    <td width="5%"><?= $i++; ?>.</td>
                    <td class="text-left"><?= $data->barcode; ?></td>
                    <td class="text-left"><?= $data->item_name; ?></td>
                    <td class="text-right"><?= $data->qty; ?></td>
                    <td width="250px" class="text-center">
                      <a class="btn btn-default" id="set_dtl" data-toggle="modal" data-target="#modal-detail" data-barcode="<?= $data->barcode; ?>" data-item_nama="<?= $data->item_name; ?>" data-qty="<?= $data->qty; ?>" data-detail="<?= $data->detail; ?>" data-date="<?= indo_date($data->date); ?>">
                        <i class="fas fa-eye"></i> Detail </a>
                      <a href="<?= site_url('stock/stock_out_del/' . $data->stock_id . '/' . $data->item_id) ?>" onclick="return confirm('Apakah Anda Yakin')" class="btn btn-danger "><i class="fas fa-trash"></i> Delete </a>
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
</section>

<div class="modal fade show" id="modal-detail">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Detail</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered no-margin table-hover" id="table1">
            <tbody>
              <tr>
                <th style="width: 35%"> Barcode </th>
                <td><span id="barcode"></span></td>
              </tr>
              <tr>
                <th> Name </th>
                <td><span id="item_nama"></span></td>
              </tr>
              <tr>
                <th> Quantity </th>
                <td><span id="qty"></span></td>
              </tr>
              <tr>
                <th> Detail </th>
                <td><span id="detail"></span></td>
              </tr>
              <tr>
                <th> Date </th>
                <td><span id="date"></span></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Main content -->
<script>
  $(document).ready(function() {
    $(document).on('click', '#set_dtl', function() {
      var barcode = $(this).data('barcode');
      var item_name = $(this).data('item_nama');
      var qty = $(this).data('qty');
      var detail = $(this).data('detail');
      var date = $(this).data('date');
      $('#barcode').text(barcode);
      $('#item_nama').text(item_name);
      $('#qty').text(qty);
      $('#detail').text(detail);
      $('#date').text(date);
      $('#modal-item').modal('hide');
    })
  })
</script>