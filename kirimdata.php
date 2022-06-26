<?php
 //include koneksi
 include "koneksi.php";

 //tangkap parameter suhu dan kelembaban
 $suhu = $_GET['suhu'];
 $kelembaban = $_GET['kelembaban'];

 //simpan ke tabel tb_sensor
 //atur id dimulai dari awal
 mysqli_query($konek, "ALTER TABLE tb_sensor AUTO_INCREMENT=7");
 //simpan nilai suhu dan kelembaban ke table tb_sensor
 $simpan = mysqli_query($konek, "INSERT INTO tb_sensor(suhu, kelembaban)VALUES('$suhu
    ', '$kelembaban')");

//berikan respon ke nodemcu
if($simpan)
    echo "Berhasil Tersimpan";
else
    echo "Gagal Tersimpan";
?>