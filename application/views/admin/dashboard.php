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
         <div class="card card-primary">
           <div class="card-header">
             <h3 class="card-title"> Grafik </h3>
           </div>
           <div class="card-body">

             <?php
              foreach ($data as $data) {
                $name[] = $data->name;
                $stock[] = (float) $data->stock;
              }
              ?>
             <canvas id="myChart" width="400" height="150"></canvas>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 <script>
   var ctx = document.getElementById("myChart").getContext("2d");
   var chart = new Chart(ctx, {
     // The type of chart we want to create
     type: "line",

     // The data for our dataset
     data: {
       labels: <?= json_encode($name) ?>,
       datasets: [{
         label: "Stok Barang",
         backgroundColor: "rgb(255, 99, 132)",
         borderColor: "rgb(255, 99, 132)",
         data: <?php echo json_encode($stock); ?>,
       }, ],
     },

     // Configuration options go here
     options: {},
   });
 </script>

 <!-- Main content -->