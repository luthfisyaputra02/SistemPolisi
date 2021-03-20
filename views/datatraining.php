<div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-files-o"></i><b> Data Training</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
              <table id="training" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Bulan</th>
                    <th class="text-center">Lokasi</th>
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
                          $sql = $koneksi->query("select * from training");
                          while ($data=$sql->fetch_assoc()){
                        ?>
                       <tr>
                          <td align="center"><?php echo $no++;?></td>
                          <td align="center" ><?php echo $data['bulan'];?></td>
                          <td align="center" ><?php echo $data['lokasi'];?></td>
                          <td align="center" ><?php echo $data['kehilangan_hp'];?></td>
                          <td align="center" ><?php echo $data['pembegalan'];?></td>
                          <td align="center" ><?php echo $data['curanmor'];?></td>
                          <td align="center" ><?php echo $data['pencopetan'];?></td>
                          <td align="center" ><?php echo $data['penipuan'];?></td>
                          


                          <td width="20%" align="center">

                            <a id="edit_data" data-toggle="modal" data-target="#edit" 
                            data-bulan="<?php echo $data['bulan']?>"
                            data-lokasi="<?php echo $data['lokasi']?>"
                            data-kehilangan_hp="<?php echo $data['kehilangan_hp']?>"
                            data-pembegalan="<?php echo $data['pembegalan'];?>"
                            data-curanmor="<?php echo $data['curanmor'];?>"
                            data-pencopetan="<?php echo $data['pencopetan'];?>" 
                            data-penipuan="<?php echo $data['penipuan'];?>"
                              class="btn btn-info"><i class="fa fa-edit"></i></a>

                            <a href="?page=datatraining&page=hapusdatatraining&bulan=<?php echo $data['bulan']?>" class="btn btn-danger" onclick=" return confirm('Apakah Ingin Menghapus Data??')"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>

                        <?php
                        
                        
                       }
                       ?>

                
                </tbody>
              </table>
            </div>

            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square"></i> Tambah Data 
                     </button> 


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
                                                <label>Bulan</label>
                                                <select name="bulan" id="bulan" class="form-control" required="required">
                                                    <option value="januari">Januari</option>
                                                    <option value="februari">Februari</option>
                                                    <option value="maret">Maret</option>
                                                    <option value="april">April</option>
                                                    <option value="mei">Mei</option>
                                                    <option value="juni">Juni</option>
                                                    <option value="juli">Juli</option>
                                                    <option value="agustus">Agustus</option>
                                                    <option value="september">September</option>
                                                    <option value="oktober">Oktober</option>
                                                    <option value="november">November</option>
                                                    <option value="desember">Desember</option>
                                                </select>

                                                
                                              </div>
                                              <div class="form-group">
                                                <label>Lokasi</label>
                                                <input class="form-control" autocomplete="off" name="lokasi" placeholder="Lokasi" required>
                                                
                                              </div>
                                              <div class="form-group">
                                                <label>Kehilangan HP</label>
                                                <input class="form-control" autocomplete="off" name="kehilangan_hp" placeholder="Kehilangan HP" required>
                                                
                                              </div>
                                           
                                                                                 
                                              <div class="form-group">
                                                <label>Pembegalan</label>
                                                <input  class="form-control" autocomplete="off" name="pembegalan" placeholder="Pembegalan" required>
                                                
                                              </div>                                       
                                                                         
                                              
                                                <div class="form-group">
                                                <label>Curanmor</label>
                                                <input  class="form-control" autocomplete="off" name="curanmor" placeholder="Curanmor" required>
                                                
                                              </div>     
                                              <div class="form-group">
                                                <label>Pencopetan</label>
                                                <input  class="form-control" autocomplete="off" name="pencopetan" placeholder="Pencopetan" required>
                                                
                                              </div>                                       
                                                                         
                                              
                                                <div class="form-group">
                                                <label>Penipuan</label>
                                                <input  class="form-control" autocomplete="off" name="penipuan" placeholder="Penipuan" required>
                                                
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

                          if(isset($_POST['simpan'])){
                            $bulan   = $_POST['bulan'];
                            $lokasi   = $_POST['lokasi'];
                            $kehilangan_hp   = $_POST['kehilangan_hp'];
                            $pembegalan   = $_POST['pembegalan'];
                            $curanmor   = $_POST['curanmor'];
                            $pencopetan   = $_POST['pencopetan'];
                            $penipuan   = $_POST['penipuan'];
                            
                            
                               
                               $sql=$koneksi->query("insert into training (bulan,lokasi,kehilangan_hp,pembegalan,curanmor,pencopetan,penipuan)values('$bulan','$lokasi','$kehilangan_hp','$pembegalan','$curanmor','$pencopetan','$penipuan')");
                               
                               if ($sql){
                                ?>
                                <script type="text/javascript">
                                
                                  window.location.href="?page=datatraining";
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
                                                <label>Bulan</label>
                                                <input id="bulan" class="form-control" autocomplete="off" name="bulan" placeholder="Bulan" required readonly>
                                                
                                              </div>
                                              <div class="form-group">
                                                <label>Lokasi</label>
                                                <input id="lokasi" class="form-control" autocomplete="off" name="lokasi" placeholder="Lokasi" required readonly>
                                                
                                              </div>
                                              <div class="form-group">
                                                <label>Kehilangan HP</label>
                                                <input id="kehilangan_hp" class="form-control" autocomplete="off" name="kehilangan_hp" placeholder="Kehilangan HP" required>
                                                
                                              </div>
                                           
                                                                                 
                                              <div class="form-group">
                                                <label>Pembegalan</label>
                                                <input  class="form-control" autocomplete="off" name="pembegalan" placeholder="Semester 1" id="pembegalan" required>
                                                
                                              </div>                                       
                                                                         
                                              
                                                <div class="form-group">
                                                <label>Curanmor</label>
                                                <input  class="form-control" autocomplete="off" name="curanmor" placeholder="Curanmor" id="curanmor" required>
                                                
                                              </div>     
                                              <div class="form-group">
                                                <label>Pencopetan</label>
                                                <input  class="form-control" autocomplete="off" name="pencopetan" placeholder="Pencopetan" id="pencopetan" required>
                                                
                                              </div>                                       
                                                                         
                                              
                                                <div class="form-group">
                                                <label>Penipuan</label>
                                                <input  class="form-control" autocomplete="off" name="penipuan" placeholder="Semester 4" id="penipuan" required>
                                                
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
                            var bulan = $(this).data('bulan');
                            var lokasi = $(this).data('lokasi');
                              var kehilangan_hp = $(this).data('kehilangan_hp');
                              var pembegalan = $(this).data('pembegalan');
                              var curanmor = $(this).data('curanmor');
                              var pencopetan = $(this).data('pencopetan');
                              var penipuan = $(this).data('penipuan');

                              
                              $("#modal_edit #bulan").val(bulan);
                              $("#modal_edit #lokasi").val(lokasi);
                              $("#modal_edit #kehilangan_hp").val(kehilangan_hp);
                              $("#modal_edit #pembegalan").val(pembegalan);
                              $("#modal_edit #curanmor").val(curanmor);
                              $("#modal_edit #pencopetan").val(pencopetan);
                              $("#modal_edit #penipuan").val(penipuan);

                              
                           })
                         </script>

                         <?php

                           if(isset($_POST['ubah'])){
                            $bulan   = $_POST['bulan'];
                            $lokasi   = $_POST['lokasi'];
                            $kehilangan_hp   = $_POST['kehilangan_hp'];
                            $pembegalan   = $_POST['pembegalan'];
                            $curanmor   = $_POST['curanmor'];
                            $pencopetan   = $_POST['pencopetan'];
                            $penipuan   = $_POST['penipuan'];
                            
                            
                            
                               
                               $sql=$koneksi->query("update  training set 
                               lokasi='$lokasi',
                               kehilangan_hp='$kehilangan_hp',
                               pembegalan='$pembegalan',
                               curanmor='$curanmor',
                               pencopetan='$pencopetan',
                               penipuan='$penipuan'
                                
                                where bulan='$bulan'");
                               
                               if ($sql){
                                ?>
                                <script type="text/javascript">
                                
                                  window.location.href="?page=datatraining";
                                </script>
                                <?php
                               }
                            
                            }


                         ?>
                        <!-- akhir halaman edit--> 
        </div>
    </div>