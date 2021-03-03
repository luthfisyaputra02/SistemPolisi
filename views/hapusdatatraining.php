<?php


$bulan = $_GET['bulan'];

$sql = $koneksi->query("delete from training where bulan ='$bulan'");

 if ($sql){
                                ?>
                                <script type="text/javascript">
                                alert("Data Berhasil Dihapus!!!");
                                  window.location.href="?page=datatraining";
                                </script>
                                <?php
                               }


?>