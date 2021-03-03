<?php


$kode_user = $_GET['kode_user'];

$sql = $koneksi->query("delete from tb_user where kode_user ='$kode_user'");

 if ($sql){
                                ?>
                                <script type="text/javascript">
                                alert("Data Berhasil Dihapus!!!");
                                  window.location.href="?page=akses";
                                </script>
                                <?php
                               }


?>