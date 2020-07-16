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
           <li class="breadcrumb-item ">Menu</li>
           <li class="breadcrumb-item active">Submenu Management</li>
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
       <div class="card col-lg ml-3">
         <div class="card-header">
           <h3 class="card-title"> <?= $title; ?> </h3>
         </div>
         <div class="card-body">
           <div class="mb-3 float-right">
             <a href="<?= site_url('menu/addSubMenu') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Submenu </a>
           </div>
           <div class="table-responsive">
             <table class="table table-bordered table-striped text-center" id="table1">
               <thead>
                 <tr>
                   <th width="5%">#</th>
                   <th> Title </th>
                   <th> Menu </th>
                   <th> Url </th>
                   <th> Icon </th>
                   <th width="10%"> Active </th>
                   <th> Action </th>
                 </tr>
               </thead>
               <tbody>
                 <?php $i = 1; ?>
                 <?php foreach ($submenu as $sub) : ?>
                   <tr>
                     <td class="pt-4"><?= $i++; ?></td>
                     <td class="pt-4"><?= $sub['title'] ?></td>
                     <td class="pt-4"><?= $sub['menu'] ?></td>
                     <td class="pt-4"><?= $sub['url'] ?></td>
                     <td class="pt-4"><i class="<?= $sub['icon'] ?>"></i></td>
                     <td class="pt-4"><?= $sub['is_active'] == 1 ? 'active' : 'not active'; ?></td>
                     <td width="15%">
                       <a href="<?= site_url('menu/editSubMenu/'); ?><?= $sub['id'] ?>" class="btn btn-warning mt-1 mb-1 "><i class="fas fa-edit"></i> Update </a>
                       <a href="<?= site_url('menu/delSubMenu/'); ?><?= $sub['id'] ?>" onclick="return confirm('Yakin menghapus data ?')" class="btn btn-danger mt-1 mb-1 ml-1">
                       <i class="fas fa-trash"></i> Delete </a>
                     </td>
                   <?php endforeach; ?>
                   </tr>
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>