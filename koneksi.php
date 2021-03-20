<?php
//variabel koneksi
$koneksi = mysqli_connect("localhost","root","","sistempolisi");

if(!$koneksi){
	echo "Koneksi Database Gagal...!!!";
}
?>