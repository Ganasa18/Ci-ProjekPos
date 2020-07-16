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
   <?php $this->view('message');  ?>
   <div class="container-fluid">
     <div class="row">
       <div class="card col-lg">
         <div class="card-header">
           <h3 class="card-title"> item Data </h3>
         </div>

         <div class="card-body">
           <div class="mb-3">
             <a href="<?= site_url('item/add'); ?>" class="btn btn-primary"><i class="fa fa-user-plus"></i> Tambah Data </a>
           </div>
           <div class="table-responsive">
             <table class="table table-bordered table-striped text-center" id="table1">
               <thead>
                 <tr class="text-center">
                   <th width="4%">#</th>
                   <th> Barcode </th>
                   <th> Name </th>
                   <th> Category </th>
                   <th> Units </th>
                   <th> Price </th>
                   <th> Stock </th>
                   <th> Image </th>
                   <th> Action </th>
                 </tr>
               </thead>
               <tbody>
                 <?php $i = 1; ?>
                 <?php foreach ($item->result() as $key => $data) : ?>
                   <tr>
                     <td><?= $i++; ?>.</td>
                     <td>
                       <?= $data->barcode; ?> <br>
                       <a href="<?= site_url('item/barcode_qrcode/' . $data->item_id) ?>" class="btn btn-default ">Generate <i class="fas fa-barcode"></i></a>
                     </td>
                     <td><?= $data->name; ?></td>
                     <td><?= $data->category_name; ?></td>
                     <td><?= $data->units_name; ?></td>
                     <td class="uang"><?= indo_currency($data->price); ?></td>
                     <td><?= $data->stock; ?></td>
                     <td class="text-center">
                       <?php if ($data->item_image != null) : ?>
                         <img class="profile-user-img img-fluid" style="width:200px;" src=" <?= base_url('uploads/product/') . $data->item_image; ?>">
                       <?php endif; ?>
                     </td>
                     <td width="250px" class="text-center">
                       <a href="<?= site_url('item/edit/' . $data->item_id) ?>" class="btn btn-warning "><i class="fas fa-edit"></i> Update </a>
                       <a href="<?= site_url('item/del/' . $data->item_id) ?>" onclick="return confirm('Apakah Anda Yakin')" class="btn btn-danger "><i class="fas fa-trash"></i> Delete </a>
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