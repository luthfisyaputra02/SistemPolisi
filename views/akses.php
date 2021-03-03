<?php

  
    @session_start();
    include "koneksi.php";

    if(@$_SESSION['admin'] || @$_SESSION['user']){
  

?>
<div class="box">

            <div class="box-header">
              
             
             <h3 class="box-title"><i class="fa fa-user-o"></i><b> Data Akses</b></h3>
            </div>
            <!-- /.box-header -->


            <div class="box-body ">
            	<div class="table-responsive">
            	
              <table id="pasien" class="table  table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode User</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Nama User</th>
                  <th>Level</th>
                  <th><center>Opsi</center></th>
                </tr>
                </thead>
                <tbody>
               			 <?php
                      		$no =1;
                      		$sql = $koneksi->query("select * from tb_user");
                      		while ($data=$sql->fetch_assoc()){

                      	?>
                        <tr>
                          <td align="center"><?php echo $no++;?></td>
                          <td align="center" ><?php echo $data['kode_user'];?></td>
                         <td align="center" ><?php echo $data['username'];?></td>
                         <td align="center" ><?php echo $data['password'];?></td>
                         <td align="center" ><?php echo $data['nama_user'];?></td>
                         <td align="center" ><?php echo $data['level'];?></td>

                          <td width="20%" align="center">

                          	<a id="edit_data" data-toggle="modal" data-target="#edit" 
                          	data-kode_user="<?php echo $data['kode_user']?>"
                            data-username="<?php echo $data['username']?>"
                            data-password="<?php echo $data['password']?>"
                            data-nama_user="<?php echo $data['nama_user']?>"
                            data-level="<?php echo $data['level']?>" 


                              class="btn btn-info"><i class="fa fa-edit"></i> edit </a>

                          	<a href="?page=akses&page=hapusakses&kode_user=<?php echo $data['kode_user']?>" class="btn btn-danger" onclick=" return confirm('Apakah Ingin Menghapus Data??')"><i class="fa fa-trash"></i> Hapus </a>
                          </td>
                        </tr>

                        <?php
                        
                        
                   		 }
                   		 ?>

                
                </tbody>
              </table>
            </div>



  <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> Tambah Data  </button> 

             <div class="panel-body">
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Data Akses </h4>
                                        </div>

                                        <div class="modal-body">

                                            <form role="form" method="POST">
                                              <div class="form-group">
                                                <label>Kode User</label>
                                                <input class="form-control" autocomplete="off" name="kode_user" placeholder="Kode User" required>
                                                
                                              </div>
                                           
                                                                                 
                                              <div class="form-group">
                                                <label>Username</label>
                                                <input  class="form-control" autocomplete="off" name="username" placeholder="Username" required>
                                                
                                              </div> 

                                              <div class="form-group">
                                                <label>Password</label>
                                                <input  class="form-control" autocomplete="off" name="password" placeholder="Password" required>
                                                
                                              </div>        

                                              <div class="form-group">
                                                <label>Nama User</label>
                                                <input  class="form-control" autocomplete="off" name="nama_user" placeholder="Nama User" required>
                                                
                                              </div>                                
                                                                         
                                              

                                              <div class="form-group">
                                                <label>Level</label>
                                                  <select class="form-control" name="level" value="<?php echo $data['level'];?>">
                                                    <option >--Pilih--</option>
                                                    <option >Admin</option>
                                                    <option >User</option>
                                                   
                                                              
                                                  </select>
                                              </div>

                                               
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success " type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                           <input type="submit" name="simpan" value="Simpan" class=" btn btn-primary">
                                        </div>

                                         </form>

                           
                                    </div>
                                </div>
                            </div>

                        </div>
                         
                            <?php
if($_SERVER['REQUEST_METHOD']=='POST'){
	//variabel dari elemen form
	$kode_user = mysqli_real_escape_string($koneksi, $_POST['kode_user']);
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, $_POST['password']);
	$nama_user = mysqli_real_escape_string($koneksi, $_POST['nama_user']);
	$level = mysqli_real_escape_string($koneksi, $_POST['level']);
	
	if($kode_user=='' || $username=='' || $password=='' || $nama_user==''|| $level==''){
			echo "Form belum lengkap...";
		}else{
			$simpan = mysqli_query($koneksi, "insert into tb_user (kode_user,username,password,nama_user,level)values('$kode_user','$username','$password','$nama_user','$level')");
			if(!$simpan){
			echo "Simpan data gagal!!";
		}else{
			?>
                                <script type="text/javascript">
                                
                                  window.location.href="?page=akses";
                                </script>
                                <?php
		}
	}
}
?>
                        <!-- akhir halaman tambah-->      

                        <!-- halaman edit-->
                           <div class="panel-body">
                            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Data User </h4>
                                        </div>

                                        <div class="modal-body" id="modal_edit">

                                            <form role="form" method="POST">
                                              <div class="form-group">
                                                <label>Kode User</label>
                                                <input class="form-control" autocomplete="off" name="kode_user" placeholder="Kode User" id="kode_user" readonly required>
                                                
                                              </div>
                                           
                                                                                 
                                              <div class="form-group">
                                                <label>Username</label>
                                                <input  class="form-control" autocomplete="off" name="username" placeholder="Username" id="username" required>
                                                
                                              </div> 

                                              <div class="form-group">
                                                <label>Password</label>
                                                <input  class="form-control" autocomplete="off" name="password" placeholder="Password" id="password" required>
                                                
                                              </div>        

                                              <div class="form-group">
                                                <label>Nama User</label>
                                                <input  class="form-control" autocomplete="off" name="nama_user" placeholder="Nama User" id="nama_user" required>
                                                
                                              </div> 

                                              <div class="form-group">
                                                <label>Level</label>
                                                <input  class="form-control" autocomplete="off" name="level" placeholder="level" id="level" readonly required>
                                                
                                              </div>  

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-success " type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                           <input type="submit" name="ubah" value="Ubah" class=" btn btn-primary">
                                        </div>

                                         </form>

                           
                                    </div>
                                </div>
                            </div>

                        </div>
                         <script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
                         <script type="text/javascript">
                           $(document).on("click", "#edit_data",function(){

                              var kode_user = $(this).data('kode_user');
                              var username = $(this).data('username');
                              var password = $(this).data('password');
                              var nama_user = $(this).data('nama_user');
                              var level = $(this).data('level');

                              $("#modal_edit #kode_user").val(kode_user);
                              $("#modal_edit #username").val(username);
                              $("#modal_edit #password").val(password);
                              $("#modal_edit #nama_user").val(nama_user);
                              $("#modal_edit #level").val(level);
                           })
                         </script>

                         <?php

                           if(isset($_POST['ubah'])){

                            $kode_user   = $_POST['kode_user'];
                            $username   = $_POST['username'];
                            $password   = $_POST['password'];
                            $nama_user   = $_POST['nama_user'];
                            $level  = $_POST['level'];
                            
                            
                               
                               $sql=$koneksi->query("update  tb_user set 
                               	username='$username',
                               	password='$password',
                               	nama_user='$nama_user',
                               	level='$level'
                               	where kode_user='$kode_user'");
                               
                               if ($sql){
                                ?>
                                <script type="text/javascript">
                                
                                  window.location.href="?page=akses";
                                </script>
                                <?php
                               }
                            
                            }


                         ?>
                        <!-- akhir halaman edit--> 
        </div>
    </div>
    <?php
}else{
  header("location: login.php");
}
?>