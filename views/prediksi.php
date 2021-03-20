<div class="box">
            <div class="box-header">
              <h3 class="box-title"><i class="fa fa-balance-scale"></i><b> Perhitungan K-NN</b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
	  	

 <table  class="table table-bordered table-striped">
      
	   
	    	<h5><b>Proses Perhitungan Kuadrat (X1 - X) + (X2- 2) +....(Xn-X) Pangkat 2</b></h5>
	     
	         <tr>
                 <th class="text-center">Bulan</th>
                 <th class="text-center">Lokasi</th>
                 <th class="text-center">Kehilangan HP</th>
                 <th class="text-center">Pembegalan</th>
                 <th class="text-center">Curanmor</th>
                 <th class="text-center">Pencopetan</th>
                 <th class="text-center">Penipuan</th>
                 <th class="text-center">Total Perhitungan</th>
                 <th class="text-center">Kesimpulan</th>
              </tr>
                      
	  
                      		<?php
							$kehilangan_hp2=0;
							$pembegalan2=0;  
                      		$curanmor2=0;
                      		$pencopetan2=0;
                      		$penipuan2=0;
                      		$sql = $koneksi->query("select * from testing");
                      		while ($data=$sql->fetch_assoc()){
								$kehilangan_hp2=$data['kehilangan_hp2'];
								$pembegalan2=$data['pembegalan2'];
                      			$curanmor2=$data['curanmor2'];
                      			$pencopetan2=$data['pencopetan2'];
                      			$penipuan2=$data['penipuan2'];
                      		}
                      	?>
							<?php
                      		$no =1;
                      		$sql = $koneksi->query("SELECT * from training ");
                      		while ($data=$sql->fetch_assoc()){
                      		    $point = pow($kehilangan_hp2 - $data['kehilangan_hp'],2) + pow($pembegalan2 - $data['pembegalan'],2) +
                                    pow( $curanmor2 - $data['curanmor'] ,2) + pow( $pencopetan2 - $data['pencopetan'] ,2) +
                                    pow($penipuan2 - $data['penipuan'],2);
                      	?>
                        <tr>
                          <td align="center" ><?php echo $data['bulan']   ;?></td>
                            <td align="center" ><?php echo $data['lokasi']   ;?></td>
                            <td align="center" ><?php echo pow($kehilangan_hp2 - $data['kehilangan_hp'],2);?></td>
						  <td align="center" ><?php echo pow($pembegalan2 - $data['pembegalan'],2);?></td>
                          <td align="center" ><?php echo pow( $curanmor2 - $data['curanmor'] ,2)   ;?></td>
                          <td align="center" ><?php echo pow( $pencopetan2 - $data['pencopetan'] ,2) ;?></td>
                          <td align="center" ><?php echo  pow($penipuan2 - $data['penipuan'],2);?></td>
                          <td align="center" >
                            <b>
                          	<?php
//                          	echo  sqrt(
//									   pow( $kehilangan_hp2 - $data['kehilangan_hp'] ,2)
//							  +	       pow($pembegalan2 - $data['pembegalan'],2));
//							  +		   pow( $curanmor2 - $data['curanmor'] ,2)
//                          	  +  	   pow( $pencopetan2 - $data['pencopetan'] ,2)
//                          	  +		   pow($penipuan2 - $data['penipuan'],2)
//
                            echo $point;
                          	?> 
                            </b>
                          		</b>

                          </td>
                          <td align="center" ><?php echo ($point >= 500) ? "RAWAN": "TIDAK RAWAN"; ?></td>
						 </tr>

						 
                        <?php
                                          
                   		 }
                   		 ?>


                   		<table  class="table table-striped table-bordered table-responsive" id="prediksi" class="display">
                   			 <thead>
                   			

                   			<hr>
                   			<h5><b>Hasil Sorting Perhitungan Dari Yang Terkecil</b></h5>

                   			<tr>

                   		 	
                   		 	<td><b><center>Bulan</center></b></td>
                   		 	<td><b><center>Total Perhitungan</center></b></td>
                   		 	<td><b><center>Kesimpulan</center></b></td>
                   		 	
                   		 </tr>
                   		  </thead>

                      <tbody>

							<?php
                      		$kehilangan_hp=0;
                      		$pembegalan=0;
                      		$curanmor=0;
                      		$pencopetan=0;
							$penipuan=0;
							$kesimpul=0;  
                      		
                      			
                      		$sql = $koneksi->query("SELECT * from training");
                      		
                      		while ($data=$sql->fetch_assoc()){
                                $point2 = pow($kehilangan_hp2 - $data['kehilangan_hp'],2) + pow($pembegalan2 - $data['pembegalan'],2) +
                                    pow( $curanmor2 - $data['curanmor'] ,2) + pow( $pencopetan2 - $data['pencopetan'] ,2) +
                                    pow($penipuan2 - $data['penipuan'],2);

//								$kehilangan_hp=$data['kehilangan_hp'];
//                      			$pembegalan=$data['pembegalan'];
//                      			$curanmor=$data['curanmor'];
//                      			$pencopetan=$data['pencopetan'];
//                      			$penipuan=$data['penipuan'];

                      	?>

                      	<tr>
                      		
                      		<td align="center"><?php echo $data['bulan'];?></td>

                      		<td align="center">

                      		<?php 

//                     		echo  sqrt(
//										   pow( $kehilangan_hp2 - $data['kehilangan_hp'] ,2)
//								+	       pow($pembegalan2 - $data['pembegalan'],2));
//								+		   pow( $curanmor2 - $data['curanmor'] ,2)
//								+  	       pow( $pencopetan2 - $data['pencopetan'] ,2)
//								+		   pow($penipuan2 - $data['penipuan'],2)
//
                            echo $point2;

                          	  ?>
                           	  </td>
                           	  

                       	      <td align="center" style="color:<?= $color?> ">

                                  <?php echo ($point2 >= 500)? "RAWAN" : "TIDAK RAWAN" ?>
                              </td>
                      	</tr>

                		 <?php
                   		  }
                   		 ?>
                  		 </tbody>                  		
                   		</table>
                   				           			

                   		<hr>
	
			</table>
		</div>
    </div>
   </div>

 

