
<div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-file-o"></i><b> Data Testing</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="testing" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Kehilangan HP</th>
                    <th class="text-center">Pembegalan</th>
                    <th class="text-center">Curanmor</th>
                    <th class="text-center">Pencopetan</th>
                    <th class="text-center">Penipuan</th>
                    <th class="text-center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                     <?php
                          $no =1;
                          $sql = $koneksi->query("select * from testing");
                          while ($data=$sql->fetch_assoc()){

                        ?>
                       <tr>
                          <td align="center"><?php echo $no++;?></td>
                          <td align="center" ><?php echo $data['kehilangan_hp2'];?></td>
                          <td align="center" ><?php echo $data['pembegalan2'];?></td>
                          <td align="center" ><?php echo $data['curanmor2'];?></td>
                          <td align="center" ><?php echo $data['pencopetan2'];?></td>
                          <td align="center" ><?php echo $data['penipuan2'];?></td>
                          <td width="20%" align="center">

                            <a id="edit_data" data-toggle="modal" data-target="#edit"
                            data-kehilangan_hp2="<?php echo $data['kehilangan_hp2'];?>"
                            data-pembegalan2="<?php echo $data['pembegalan2'];?>" 
                            data-pencopetan2="<?php echo $data['pencopetan2'];?>"
                            data-curanmor2="<?php echo $data['curanmor2'];?>"
                            data-penipuan2="<?php echo $data['penipuan2'];?>"
                               data-nomor="<?php echo $data['id_testing'];?>"



                              class="btn btn-info"><i class="fa fa-edit"></i></a>

<!--                            <a href="?page=datatesting&page=hapusdatatesting&bulan2=--><!--" class="btn btn-danger" onclick=" return confirm('Apakah Ingin Menghapus Data??')"><i class="fa fa-trash"></i></a>-->
                          </td>
                        </tr>

                        <?php
                        
                        
                       }
                       ?>

                
                </tbody>
              </table>
            </div>




<div class="panel-body">
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Data </h4>
                                        </div>

                                        <div class="modal-body">

                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                <label>Kehilangan HP</label>
                                                <input  class="form-control" autocomplete="off" name="kehilangan_hp2" placeholder="Kehilangan HP" required>
                                                
                                              </div>     
                                              <div class="form-group">
                                                <label>Pembegalan</label>
                                                <input  class="form-control" autocomplete="off" name="pembegalan2" placeholder="Pembegalan" required>
                                                
                                              </div>                                       
                                                                         
                                              
                                                <div class="form-group">
                                                <label>Curanmor</label>
                                                <input  class="form-control" autocomplete="off" name="curanmor2" placeholder="Curanmor" required>
    
                                        </div>
                                        <div class="form-group">
                                                <label>Pencopetan</label>
                                                <input  class="form-control" autocomplete="off" name="pencopetan2" placeholder="Pencopetan" required>
    
                                        </div>
                                        <div class="form-group">
                                                <label>Penipuan</label>
                                                <input  class="form-control" autocomplete="off" name="penipuan2" placeholder="Penipuan" required>
    
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

                          if(isset($_POST['simpan'])){
                            $kehilangan_hp2   = $_POST['kehilangan_hp2'];
                            $pembegalan2   = $_POST['pembegalan2'];
                            $curanmor2   = $_POST['curanmor2'];
                            $pencopetan2   = $_POST['pencopetan2'];
                            $penipuan2   = $_POST['penipuan2'];
                               
                               $sql=$koneksi->query("insert into testing (kehilangan_hp2,pembegalan2,curanmor2,pencopetan2,penipuan2)values('$kehilangan_hp2','$pembegalan2','$curanmor2','$pencopetan2','$penipuan2')");
                               
                               if ($sql){
                                ?>
                                <script type="text/javascript">
                                
                                  window.location.href="?page=datatesting";
                                </script>
                                <?php
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
                                            <h4 class="modal-title" id="myModalLabel">Edit Data Training </h4>
                                        </div>

                                        <div class="modal-body" id="modal_edit">

                                            <form role="form" method="POST">
                                                <div class="form-group">
                                                <label>Kehilangan HP</label>
                                                <input  class="form-control" autocomplete="off" name="kehilangan_hp2" placeholder="Kehilangan HP" id="kehilangan_hp2" required>
                                                
                                              </div>     
                                              <div class="form-group">
                                                <label>Pembegalan</label>
                                                <input  class="form-control" autocomplete="off" name="pembegalan2" placeholder="Pembegalan" id="pembegalan2" required>
                                                
                                              </div>                                       
                                                                         
                                              
                                                <div class="form-group">
                                                <label>Curanmor</label>
                                                <input  class="form-control" autocomplete="off" name="curanmor2" placeholder="Curanmor" id="curanmor2" required>
                                                
                                              </div>  
                                              <div class="form-group">
                                                <label>Pencopetan</label>
                                                <input  class="form-control" autocomplete="off" name="pencopetan2" placeholder="Pencopetan" id="pencopetan2" required>
                                                
                                              </div>  
                                              <div class="form-group">
                                                <label>Penipuan</label>
                                                <input  class="form-control" autocomplete="off" name="penipuan2" placeholder="Penipuan" id="penipuan2" required>
                                                  <input  class="form-control" type="hidden" autocomplete="off" name="nomor" placeholder="nomor" id="nomor" required>
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
                              var kehilangan_hp2 = $(this).data('kehilangan_hp2');
                              var pembegalan2 = $(this).data('pembegalan2');
                              var curanmor2 = $(this).data('curanmor2');
                              var pencopetan2 = $(this).data('pencopetan2');
                              var penipuan2 = $(this).data('penipuan2');
                               var nomor = $(this).data('nomor');

                              $("#modal_edit #kehilangan_hp2").val(kehilangan_hp2);
                              $("#modal_edit #pembegalan2").val(pembegalan2);
                              $("#modal_edit #curanmor2").val(curanmor2);
                              $("#modal_edit #pencopetan2").val(pencopetan2);
                              $("#modal_edit #penipuan2").val(penipuan2);
                               $("#modal_edit #nomor").val(nomor);
                           })
                         </script>

                         <?php

                           if(isset($_POST['ubah'])){
                            $kehilangan_hp2   = $_POST['kehilangan_hp2'];
                            $pembegalan2   = $_POST['pembegalan2'];
                            $curanmor2   = $_POST['curanmor2'];
                            $pencopetan2   = $_POST['pencopetan2'];
                            $penipuan2   = $_POST['penipuan2'];
                               $nomor   = $_POST['nomor'];

                        $sqlx = "UPDATE testing SET kehilangan_hp2='$kehilangan_hp2',pembegalan2='$pembegalan2',curanmor2='$curanmor2',pencopetan2='$pencopetan2',penipuan2='$penipuan2' WHERE id_testing='$nomor'";
                               $sql=$koneksi->query($sqlx);
                               if ($sql){
                                ?>
                                <script type="text/javascript">

                                  window.location.href="?page=datatesting";
                                </script>
                                <?php
                               }
                            
                            }


                         ?>
                        <!-- akhir halaman edit--> 
        </div>
    </div>