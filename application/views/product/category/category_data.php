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
           <li class="breadcrumb-item active">Category</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>

 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="card col-lg sm-6 md-6 ml-3">
         <div class="card-header">
           <h3 class="card-title"> <?= $title; ?> </h3>
         </div>
         <?= $this->session->flashdata('message'); ?>
         <div class="card-body">
           <div class="mb-3 float-right">
             <a href="<?= site_url('category/add') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Data </a>
           </div>
           <div class="table-responsive">
             <table class="table table-bordered table-striped text-center" id="table1">
               <thead>
                 <tr>
                   <th width="10%">#</th>
                   <th width="60%"> Name </th>
                   <th> Action </th>
                 </tr>
               </thead>
               <tbody>
                 <?php $i = 1; ?>
                 <?php foreach ($category->result() as $key => $data) : ?>
                   <tr>
                     <td><?= $i++; ?>.</td>
                     <td><?= $data->name; ?></td>
                     <td width="250px">
                       <a href="<?= site_url('category/edit/' . $data->category_id) ?>" class="btn btn-warning "><i class="fas fa-edit"></i> Update </a>
                       <a href="<?= site_url('category/del/' . $data->category_id) ?>" class="btn btn-danger tombol-hapus"><i class="fas fa-trash"></i> Delete </a>
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