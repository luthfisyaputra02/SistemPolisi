<?php
//variabel koneksi
$koneksi = mysqli_connect("localhost","root","","conten1");

if(!$koneksi){
	echo "Koneksi Database Gagal...!!!";
}
?>