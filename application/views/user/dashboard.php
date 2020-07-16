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
           <li class="breadcrumb-item active">Dashboard</li>
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
       <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-info">
           <div class="inner">
             <h3> <?= $this->fungsi->count_item() ?> </h3>

             <p>ITEM</p>
           </div>
           <div class="icon">
             <i class="ion ion-bag"></i>
           </div>
           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-success">
           <div class="inner">
             <h3><?= $this->fungsi->count_supplier() ?> </h3>

             <p>SUPPLIER</p>
           </div>
           <div class="icon">
             <i class="ion ion-stats-bars"></i>
           </div>
           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-warning">
           <div class="inner">
             <h3> <?= $this->fungsi->count_customer() ?> </h3>

             <p>CUSTOMER</p>
           </div>
           <div class="icon">
             <i class="ion ion-person"></i>
           </div>
           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
       <div class="col-lg-3 col-6">
         <!-- small box -->
         <div class="small-box bg-danger">
           <div class="inner">
             <h3> <?= $this->fungsi->count_user() ?> </h3>

             <p>USER</p>
           </div>
           <div class="icon">
             <i class="ion ion-person-add"></i>
           </div>
           <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
         </div>
       </div>
       <!-- ./col -->
     </div>
     <div class="row">
       <div class="col-lg-6">
         <div class="card card-success">
           <div class="card-header">
             <h3 class="card-title"> Penjualan Terlaris </h3>
           </div>
           <div class="card-body text-center">
             <p style="font-size: 50px;"> COMING SOON </p>
           </div>
         </div>
       </div>
       <div class="col-lg-6">
         <div class="card card-warning">
           <div class="card-header">
             <h3 class="card-title text-red"> NOTED </h3>
           </div>
           <div class="card-body">
             <p>Tujuan dari perancangan Sistem POS (Point Of Sales) Sesuai dengan permasalahan yang ada maka tujuan dari pembuatan solusi yaitu merancang dan membangun point of sales (POS) standart sesuai dengan kebutuhan Perusahaan Ritel maupun restoran dan lain-lain </p>
             <ol>
               <li>
                 <p> Untuk Memberikan produk yang siap jual</p>
               </li>
               <li>
                 <p> Memberikan kemudahaan kepada Perusahaan</p>
               </li>
               <li>
                 <p> Menjadi alat bantu bagi bagian marketing dalam pekerjaannya</p>
               </li>
             </ol>
           </div>
         </div>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

 <!-- Main content -->