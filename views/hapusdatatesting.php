<?php


$bulan2 = $_GET['bulan2'];

$sql = $koneksi->query("delete from testing where bulan2 ='$bulan2'");

 if ($sql){
                                ?>
                                <script type="text/javascript">
                                alert("Data Berhasil Dihapus!!!");
                                  window.location.href="?page=datatesting";
                                </script>
                                <?php
                               }


?>