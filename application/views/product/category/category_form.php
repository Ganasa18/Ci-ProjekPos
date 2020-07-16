 <!-- Content Header (Page header) -->
 <div class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1 class="m-0 text-dark"><?= $title; ?></h1>
       </div><!-- /.col -->
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="fas fa-fw fa-tachometer-alt"></i></a>
           <li class="breadcrumb-item ">Category</li>
           <li class="breadcrumb-item active">Form</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>

 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card card-info col-lg-8 mx-auto">
          <div class="card-header">
            <h3 class="card-title">Form <?= ucfirst($page) ?></h3>
          </div>
          <form class="form-horizontal" action="<?= site_url('category/process') ?>" method="post">
            <div class="card-body">
              <input type="hidden" name="category_id" value="<?= $row->category_id ?>">
              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label"> Nama category </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name" value="<?= $row->name ?>" required>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <a href="<?= site_url('category'); ?>" class="btn btn-primary"><i class="fa fa-undo"></i> Kembali </a>
              <button type="submit" name="<?= $page ?>" class="btn btn-success float-right"><i class="fa fa-user-plus"></i> Tambah Data </button>
              <button type="reset" class="btn btn-warning float-right mr-3"><i class="fas fa-retweet"></i></i> Reset </button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </section>