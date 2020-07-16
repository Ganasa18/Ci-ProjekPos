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
           <li class="breadcrumb-item active">Customer</li>
         </ol>
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </div>
 <!-- /.content-header -->

 <!-- Small boxes (Stat box) -->
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
             <a href="<?= site_url('customer/add') ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Data </a>
           </div>
           <div class="table-responsive">
             <table class="table table-bordered table-striped text-center" id="table1">
               <thead>
                 <tr>
                   <th>#</th>
                   <th> Name </th>
                   <th> Gender </th>
                   <th> Phone Number </th>
                   <th> Address </th>
                   <th> Action </th>
                 </tr>
               </thead>
               <tbody>
                 <?php $i = 1; ?>
                 <?php foreach ($customer as $cos) : ?>
                   <tr>
                     <td width="5%"><?= $i++; ?></td>
                     <td><?= $cos['name']; ?></td>
                     <td width="10%"><?= $cos['gender'] == 'M' ? 'Male' : 'Female'; ?></td>
                     <td><?= $cos['phone']; ?></td>
                     <td><?= $cos['address']; ?></td>
                     <td width="20%">
                       <a href="<?= site_url('customer/edit/' . $cos['customer_id']) ?>" class="btn btn-warning">
                       <i class="fas fa-pencil-alt"></i> Edit </a>
                       <a href="<?= site_url('customer/del/' . $cos['customer_id']) ?>" class="btn btn-danger" 
                       onclick="return confirm('Yakin menghapus ?')"><i class="fas fa-trash"></i> Delete </a>
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