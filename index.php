<?php

    $koneksi = new mysqli("localhost","root","","conten1");


    @session_start();
    include "koneksi.php";

    if(@$_SESSION['admin']  || @$_SESSION['user']){
  

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEM | KEPOLISIAN METRO-LAMPUNG</title>
  <link href="assets/dist/img/3.jpg" rel="icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="assets/https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="?page=dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>K-</b>NN</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"> <b>POLRES</b> <b>METRO</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <?php
             if(@$_SESSION['admin']){
              ?>
            <li> <a href="?page=akses"> <i class="fa fa-user-o"></i> <span class="hidden-xs"> Data Akses </span>
            </a> </li>
            <?php
            }?>
            
            <?php
             if(@$_SESSION['user']){
              ?>
            <li> <a href="?page=editprofil"> <i class="fa fa-edit"></i> <span class="hidden-xs"> Edit Profil </span>
            </a> </li>
            <?php
            }?>

             <li><a href="logout.php"> <span class="hidden-xs"> Logout</span> <i class="fa fa-sign-out"></i>
            </a></li>
            
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="assets/dist/img/12.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <?php
                            if(@$_SESSION['admin']){
                               $user_terlogin = @$_SESSION['admin'];
                               
                               }else if (@$_SESSION['user']) {
                               $user_terlogin = @$_SESSION['user'];
                               
                               
                              
                            }  
                            $sql_user = mysqli_query($koneksi, "select * from tb_user where kode_user ='$user_terlogin'") or die (mysqli_error());
                            $data_user = mysqli_fetch_array($sql_user);

                          ?>
           <?php echo $data_user['nama_user']; ?><br>
           <br>
           
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      	

        <li><a href="?page=dashboard"><i class="fa fa-home"></i> <span> Halaman Utama</span></a></li>

        <?php
        if(@$_SESSION['admin'] || @$_SESSION['user']){
        ?>

       
       

        <li><a href="?page=datatraining"><i class="fa fa-files-o"></i> <span> Data Training</span></a></li>
        
        <li><a href="?page=datatesting"><i class="fa fa-file-o"></i> <span> Data Testing</span></a></li>
        
        <li><a href="?page=prediksi"><i class="fa fa-balance-scale"></i> <span> Klasifikasi</span></a></li>
        
      
        
        
        
        <?php
        }?>
        
        


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php

     
            if(@$_GET['page']== 'dashboard' || @$_GET['page']== '' ){
              include "views/dashboard.php";

            


            

              } else if(@$_GET['page']== 'hapusdatatraining' || @$_GET['page']== '' ){
              include "views/hapusdatatraining.php";
              
              } else if(@$_GET['page']== 'hapusdatatesting' || @$_GET['page']== '' ){
              include "views/hapusdatatesting.php";
              
             

            } else if(@$_GET['page']== 'hapusakses' || @$_GET['page']== '' ){
              include "views/hapusakses.php";

            } else if(@$_GET['page']== 'akses' || @$_GET['page']== '' ){
              include "views/akses.php";

            } else if(@$_GET['page']== 'editprofil' || @$_GET['page']== '' ){
              include "views/editprofil.php";


               } else if(@$_GET['page']== 'datatraining' || @$_GET['page']== '' ){
              include "views/datatraining.php";
               } else if(@$_GET['page']== 'datatesting' || @$_GET['page']== '' ){
              include "views/datatesting.php";
             
              
               } else if(@$_GET['page']== 'prediksi' || @$_GET['page']== '' ){
              include "views/prediksi.php";


                  
            
              

          }

          ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
     
      <!-- /.row -->

</section>
</div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b> POLRES METRO-LAMPUNG  </b>
    </div>
    <strong>Copyright &copy; 2021-2022 <a>SISTEM KEPOLISIAN</a></strong>
  </footer>

  </div>


</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="assets/bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>

<script src="assets/build/js/custom.min.js"></script>

<script src="assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    
    
   <script>
  $(document).ready(function () {
    $('#training').DataTable({
    

      "lengthMenu": [ 5,,15,25,50,100 ],
      "pageLength":5,
      
      "order":[[0 ,"asc"]],

      "language":{

                    "decimal":        "",
                    "emptyTable":     "No data available in table",
                    "info":           "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Data",
                    "infoEmpty":      "Showing 0 to 0 of 0 entri",
                    "infoFiltered":   "(filtered from _MAX_ total entri)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Tampil _MENU_ Data",
                    "loadingRecords": "Loading...",
                    "processing":     "Processing...",
                    "search":         "Pencarian:",
                    "zeroRecords":    "No matching records found",
                    "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Berikutnya",
                    "previous":   "Sebelumnya"
                              },
                     "aria": {
                     "sortAscending":  ": activate to sort column ascending",
                     "sortDescending": ": activate to sort column descending"
                   }
                  }

    });

    
  });
   
  
 
</script>
<script>
  $(document).ready(function () {
    $('#testing').DataTable({
    

      "lengthMenu": [ 5,15,25,50,100 ],
      "pageLength":5,
          
       "order":[[0 ,"asc"]],
      "language":{

                    "decimal":        "",
                    "emptyTable":     "No data available in table",
                    "info":           "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Data",
                    "infoEmpty":      "Showing 0 to 0 of 0 entri",
                    "infoFiltered":   "(filtered from _MAX_ total entri)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Tampil _MENU_ Data",
                    "loadingRecords": "Loading...",
                    "processing":     "Processing...",
                    "search":         "Pencarian:",
                    "zeroRecords":    "No matching records found",
                    "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Berikutnya",
                    "previous":   "Sebelumnya"
                              },
                     "aria": {
                     "sortAscending":  ": activate to sort column ascending",
                     "sortDescending": ": activate to sort column descending"
                   }
                  }

    });

    
  });
   
  
 
</script>
<script>
  $(document).ready(function () {
    $('#prediksi').DataTable({
    
       "order":[[1 ,"asc"]],
      "lengthMenu": [ 3,5,7,9,100 ],
      "pageLength":3,
          

      "language":{

                    "decimal":        "",
                    "emptyTable":     "No data available in table",
                    "info":           "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Data",
                    "infoEmpty":      "Showing 0 to 0 of 0 entri",
                    "infoFiltered":   "(filtered from _MAX_ total entri)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Tampil _MENU_ Data",
                    "loadingRecords": "Loading...",
                    "processing":     "Processing...",
                    "search":         "Pencarian:",
                    "zeroRecords":    "No matching records found",
                    "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Berikutnya",
                    "previous":   "Sebelumnya"
                              },
                     "aria": {
                     "sortAscending":  ": activate to sort column ascending",
                     "sortDescending": ": activate to sort column descending"
                   }
                  }

    });

    
  });
   
  
 
</script>
<script>
  $(document).ready(function () {
    $('#obat').DataTable({
     "order":[[0 ,"asc"]],

      "lengthMenu": [ 7,15,25,50,100 ],
      "pageLength":7,
          

      "language":{

                    "decimal":        "",
                    "emptyTable":     "No data available in table",
                    "info":           "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Data",
                    "infoEmpty":      "Showing 0 to 0 of 0 entri",
                    "infoFiltered":   "(filtered from _MAX_ total entri)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Tampil _MENU_ Data",
                    "loadingRecords": "Loading...",
                    "processing":     "Processing...",
                    "search":         "Pencarian:",
                    "zeroRecords":    "No matching records found",
                    "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Berikutnya",
                    "previous":   "Sebelumnya"
                              },
                     "aria": {
                     "sortAscending":  ": activate to sort column ascending",
                     "sortDescending": ": activate to sort column descending"
                   }
                  }

    });

    
  });
   
  
 
</script>
<script>
  $(document).ready(function () {
    $('#rekammedis').DataTable({
    

      "lengthMenu": [ 7,15,25,50,100 ],
      "pageLength":7,
          

      "language":{

                    "decimal":        "",
                    "emptyTable":     "No data available in table",
                    "info":           "Menampilkan _START_ Sampai _END_ Dari _TOTAL_ Data",
                    "infoEmpty":      "Showing 0 to 0 of 0 entri",
                    "infoFiltered":   "(filtered from _MAX_ total entri)",
                    "infoPostFix":    "",
                    "thousands":      ",",
                    "lengthMenu":     "Tampil _MENU_ Data",
                    "loadingRecords": "Loading...",
                    "processing":     "Processing...",
                    "search":         "Pencarian:",
                    "zeroRecords":    "No matching records found",
                    "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Berikutnya",
                    "previous":   "Sebelumnya"
                              },
                     "aria": {
                     "sortAscending":  ": activate to sort column ascending",
                     "sortDescending": ": activate to sort column descending"
                   }
                  }

    });

    
  });
   
  

 
</script>
</body>
</html>

<?php
}else{
  header("location: login.php");
}
?>