
<?php
@session_start();
include "koneksi.php";

if(@$_SESSION['admin'] || @$_SESSION['user'] ){
	header("location: index.php");
}else{
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEM | KEPOLISIAN METRO-LAMPUNG</title>
  <link href="assets/dist/img/12.jpg" rel="icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

 
</head>
<body class="hold-transition login-page">


<div class="login-box">
  <div class="login-logo">
    <a href="#"><img src="assets/dist/img/12.jpg" class="img-box" alt="User Image"><br><b> SISTEM KEPOLISIAN</b></br></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><b>Masuk untuk memulai akses Anda</b></p>

    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <!-- /.col -->
        <div align="center">
          <input type="submit" name="login" value="Masuk" class="btn btn-success" />
        </div>
        <!-- /.col -->
      </div>
    </form>

<?php
$username = @$_POST['username'];
$password = @$_POST['password'];
$login = @$_POST['login'];

if($login) {
	if($username == "" || $password == "") {
		?> <script type="text/javascript">  alert ("Username / Password tidak boleh kosong");</script> <?php
	}else{
		$sql = mysqli_query($koneksi, "select * from tb_user where username = '$username' and password='$password'") or die (mysqli_error());
		$data = mysqli_fetch_array($sql);
		$cek = mysqli_num_rows($sql);
		if($cek >= 1){
			if($data['level'] == "admin"){
				@$_SESSION['admin'] = $data['kode_user'];		
				header("location:index.php");	
				
			} else if($data['level'] == "user"){
				@$_SESSION['user'] = $data['kode_user'];
				header("location:index.php");
			
			} 
		} else {
			echo "Login gagal";
			echo '<script type="text/javascript">  alert ("Username / Password Anda Salah!!!");</script>';

		}
}
}
?>




  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
<?php
}
?>