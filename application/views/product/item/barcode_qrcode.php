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
            <li class="breadcrumb-item active">Item</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <section class="content">
    <div class="container-fluid">
      <?php $this->view('message');  ?>
      <div class="row">
        <div class="card card-info col-lg-5 mx-4">
          <div class="card-header">
            <h3 class="card-title">Barcode Generator</h3>
          </div>
          <div class="card-body ">
            <?php
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '" style="width: 250px">';
            ?>
            <br>
            <?= $row->barcode  ?>
            <br><br>
            <a href="<?= site_url('item/barcode_print/' . $row->item_id) ?>" target="_blank" class="btn btn-default btn-sm">
              <i class="fas fa-print"></i> Print </a>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="card card-info col-lg-5 mx-4">
          <div class="card-header">
            <h3 class="card-title">QR Generator</h3>
          </div>
          <div class="card-body">
            <?php
            $qrCode = new Endroid\QrCode\QrCode($row->barcode);
            $qrCode->writeFile('uploads/qr-code/item-' . $row->barcode . '.png');
            ?>
            <img src="<?= base_url('uploads/qr-code/item-' . $row->barcode . '.png') ?>" style="width: 250px">
            <br>
            <?= $row->barcode  ?>
            <br><br>
            <a href="<?= site_url('item/qr_print/' . $row->item_id) ?>" target="_blank" class="btn btn-default btn-sm">
              <i class="fas fa-print"></i> Print </a>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <div class="card-footer">
        <a href="<?= site_url('item') ?>" class="btn btn-warning btn-flat btn-sm">
          <i class="fas fa-retweet"></i> Back</i>
        </a>
      </div>
    </div>
  </section>


  <!-- Main content -->