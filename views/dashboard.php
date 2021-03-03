
<div class="box">

            <div class="box-header">

<?php

$query1 = $koneksi->query("select * from training");
$query2 = $koneksi->query("select * from testing");
$query3 = $koneksi->query("select * from akurasi1");
$query4 = $koneksi->query("select * from akurasi2");



$jml_training = mysqli_num_rows($query1);
$jml_testing = mysqli_num_rows($query2);

?>




<section class="content-header">
      <h1>
        Halaman Utama
        <small>Metode Data Mining K-NN</small>
      </h1>
     
    </section>
<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <p>Data Training<p>

              <h3><?php echo number_format($jml_training,0,",",".");?></h3>
            </div>
            <div class="icon">
              <i class="fa fa-files-o"></i>
            </div>
            <a href="?page=datatraining" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
               <p>Data testing</p>
              <h3><?php echo number_format($jml_testing,0,",",".");?><sup style="font-size: 20px"></sup></h3>

             
            </div>
            <div class="icon">
              <i class="fa fa-file-o"></i>
            </div>
            <a href="?page=datatesting" class="small-box-footer">Info Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        

      </div>

        <?php
        if(@$_SESSION['admin']){
        ?>
      <div class="row">
        <div class="col-md-12">
           <div class="box-body"> 
              <div class="alert alert-gray alert-dismissible">
                <button type="button"  class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Level Akses!</h4>
                Selamat anda berhasil akses sebagai Admin , anda memiliki akses sepenuhnya !!!
              </div>
            </div>
        </div>
          <?php
        }?>

        <?php
        if(@$_SESSION['kud']){
        ?>
      <div class="row">
        <div class="col-md-12">
           <div class="box-body"> 
              <div class="alert alert-gray alert-dismissible">
                <button type="button"  class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Level Akses!</h4>
                Selamat anda berhasil akses sebagai Petugas , Gunakan akses anda sebaik mungkin !!!
              </div>
            </div>
        </div>
          <?php
        }?>

        
  </section>



            </div>
          </div>

        