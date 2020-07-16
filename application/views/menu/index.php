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
           <li class="breadcrumb-item">Menu</li>
           <li class="breadcrumb-item active">Menu Management</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Small boxes (Stat box) -->
 <section class="content">
   <?= $this->session->flashdata('message');  ?>
   <div class="container-fluid">
     <div class="row">
       <div class="card col-lg-6 ml-3">
         <div class="card-header">
           <h3 class="card-title"> <?= $title; ?> </h3>
         </div>
         <div class="card-body">
           <div class="mb-3 float-right">
             <a href="<?= site_url('menu/add') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Data </a>
           </div>
           <div class="table-responsive">
             <table class="table table-bordered table-striped text-center" id="table1">
               <thead>
                 <tr>
                   <th width="10%">#</th>
                   <th width="60%"> Menu </th>
                   <th> Action </th>
                 </tr>
               </thead>
               <tbody>
                 <?php $i = 1; ?>
                 <?php foreach ($menu->result() as $key => $data) : ?>
                   <tr>
                     <td><?= $i++; ?></td>
                     <td><?= $data->menu ?></td>
                     <td>
                       <a href="<?= site_url('menu/edit/' . $data->id); ?>" class="btn btn-sm mt-1 mb-1 btn-warning "><i class="fas fa-edit"></i> Update </a>
                       <a href="<?= site_url('menu/delMenu/' . $data->id) ?>" onclick="return confirm('Yakin menghapus ?')" class="btn btn-sm mt-1 mb-1 ml-1 btn-danger 
                       <?= $data->menu == 'Admin' ? 'disabled' : ''; ?> "><i class="fas fa-trash"></i> Delete </a>
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