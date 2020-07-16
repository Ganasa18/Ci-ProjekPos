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
        <div class="card card-info col-lg-8 mx-auto">
          <div class="card-header">
            <h3 class="card-title">Form <?= ucfirst($page) ?> </h3>
          </div>
          <?= form_open_multipart('item/process') ?>
          <form class="form-horizontal">
            <div class="card-body">
              <input type="hidden" name="item_id" value="<?= $row->item_id ?>">
              <div class="form-group row">
                <label for="item_barcode" class="col-sm-2 col-form-label"> Barcode </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="item_barcode" name="item_barcode" placeholder="Barcode" value="<?= $row->barcode ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="item_name" class="col-sm-2 col-form-label"> Nama Item </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item Name" value="<?= $row->name ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="category" class="col-sm-2 col-form-label"> Category </label>
                <div class="col-sm-10">
                  <select name="category" class="form-control" required>
                    <option value="">-Select-</option>
                    <?php foreach ($category->result() as $key => $data) : ?>
                      <option value="<?= $data->category_id ?>" <?= $data->category_id == $row->category_id ? 'selected' : null ?>><?= $data->name ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <label for="units" class="col-sm-2 col-form-label"> Units </label>
                <div class="col-sm-10">
                  <?= form_dropdown(
                    'units',
                    $units,
                    $selected_units,
                    ['class' => 'form-control', 'required' => 'required']
                  ); ?>
                </div>
              </div>
              <div class="form-group row">
                <label for="item_price" class="col-sm-2 col-form-label"> Harga Item </label>
                <div class="col-sm-10">
                  <input type="number" class="form-control" id="item_price" name="item_price" placeholder="Price" value="<?= $row->price ?>" required>
                </div>
              </div>
              <div class="form-group row">
                <label for="item_price" class="col-sm-2 col-form-label"> Image </label>
                <div class="col-sm-6">
                  <?php if ($page == 'edit') {
                    if ($row->item_image != null) { ?>
                      <div>
                        <img class="profile-user-img img-fluid " src=" <?= base_url('uploads/product/') . $row->item_image; ?>" style="width:30%;">
                      </div>
                  <?php
                    }
                  } ?>
                  <input type="file" class="form-control mt-2" id="item_image" name="item_image">
                  <small>(Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti' : 'ada' ?> )</small>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?= site_url('item'); ?>" class="btn btn-primary"><i class="fa fa-undo"></i> Kembali </a>
              <button type="submit" name="<?= $page ?>" class="btn btn-success float-right"><i class="fa fa-user-plus"></i> Tambah Data </button>
              <button type="reset" class="btn btn-warning float-right mr-3"><i class="fas fa-retweet"></i></i> Reset </button>
            </div>
          </form>
          <?= form_close(); ?>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>


  <!-- Main content -->