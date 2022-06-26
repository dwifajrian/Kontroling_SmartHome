<?php
//include koneksi ke databases
include "koneksi.php";

$sql = mysqli_query($konek, "SELECT * FROM tb_kontrol");
$data = mysqli_fetch_array($sql);
$relayy = $data['relayy'];
//respone balik ke nodemcu
echo $relayy;  //1 / 0

?>