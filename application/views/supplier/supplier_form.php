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
           <li class="breadcrumb-item active">Suppliers</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->
 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="card card-info col-lg-8 mx-auto">
         <div class="card-header">
           <h3 class="card-title"> Form <?= ucfirst($page); ?></h3>
         </div>
         <form class="form-horizontal" action="<?= site_url('supplier/process') ?>" method="post">
           <div class="card-body">
             <input type="hidden" name="supplier_id" value="<?= $row->supplier_id ?>">
             <div class="form-group row">
               <label for="name" class="col-sm-2 col-form-label"> Nama Supplier </label>
               <div class="col-sm-10">
                 <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Supplier Name" value="<?= $row->name ?>" required>
               </div>
             </div>
             <div class="form-group row">
               <label for="name" class="col-sm-2 col-form-label"> Phone </label>
               <div class="col-sm-10">
                 <input type="number" class="form-control" id="supplier_phone" name="supplier_phone" placeholder="Phone Number" value="<?= $row->phone ?>" required>
               </div>
             </div>
             <div class=" form-group row">
               <label for="alamat" class="col-sm-2 col-form-label"> Alamat </label>
               <div class="col-sm-10">
                 <textarea name="supplier_alamat" id="supplier_alamat" cols="10" rows="3" class="form-control"><?= $row->alamat ?></textarea>
               </div>
             </div>
             <div class=" form-group row">
               <label for="alamat" class="col-sm-2 col-form-label"> Deskripsi </label>
               <div class="col-sm-10">
                 <textarea name="supplier_deskripsi" id="supplier_deskripsi" cols="10" rows="3" class="form-control"><?= $row->deskripsi ?></textarea>
               </div>
             </div>
           </div>
           <div class="card-footer">
             <a href="<?= site_url('supplier'); ?>" class="btn btn-primary"><i class="fa fa-undo"></i> Kembali </a>
             <button type="submit" name="<?= $page ?>" class="btn btn-success float-right"><i class="fa fa-user-plus"></i> Tambah Data </button>
             <button type="reset" class="btn btn-warning float-right mr-3"><i class="fas fa-retweet"></i></i> Reset </button>
           </div>
         </form>
       </div>
       <!-- /.card -->

     </div>
   </div>
 </section>


 <!-- Main content -->