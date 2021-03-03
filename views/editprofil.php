<?php

$koneksi = mysqli_connect("localhost","root","","conten1"); 

?>
<div class="container">
	<div class="page-header">
<ol class="breadcrumb">
              <li><a href="index.html"><i class="icon-dashboard"></i>Edit Profil</a></li>
              </ol>
</div>
  
      
 <?php

 @session_start();
include "koneksi.php";

if(@$_SESSION['admin']){
	$kode_user = $_SESSION['admin'];
} else if(@$_SESSION['user']){
	$kode_user = $_SESSION['user'];
} 

$sql_profil = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE kode_user ='$kode_user'");
$data = mysqli_fetch_array($sql_profil);


 ?>       

<form action="" method="post">
	
		<input type="hidden" name="kode_user" value="<?php echo $data['kode_user']; ?>" />
		<table class="table" >
		<tr>
			
			<td>Username : <input autocomplete="off"  type="text" name="username" value="<?php echo $data['username'];?>" required />
		
			
			
			Password : <input autocomplete="off" type="text" name="password" value="<?php echo $data['password'];?>" required />
		
			
			
			Nama Username : <input autocomplete="off" type="text" name="nama_user" value="<?php echo $data['nama_user'];?>" required />
		
			
			<input class="btn btn-info" type="submit" name="edit" value="Edit" />
			<input class="btn btn-danger" type="reset" value="Batal" />
			</td>
		</tr>



		
	
</form>

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel dari elemen form
	$kode_user		= $_POST['kode_user'];
	$username	= $_POST['username'];
	$password 	= $_POST['password'];
	$nama_user	= $_POST['nama_user'];
	
	
	if($kode_user=='' ||$username==''||$password==''||$nama_user==''){
		echo "Form belum lengkap!!!";
	}else{
		//proses edit data guru
		$edit = mysqli_query($koneksi, "UPDATE tb_user SET username='$username' , password='$password',nama_user='$nama_user' WHERE kode_user='$kode_user'");
		
		 if ($edit){
                                ?>
                                <script type="text/javascript">
                                
                                  window.location.href="?page=dashboard";
                                </script>
                                <?php
                               }
                            
                            }
                        }

                         ?>
</table>
</div>
