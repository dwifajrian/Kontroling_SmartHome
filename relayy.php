<?php
   //include koneksi
   include "koneksi.php";

    //menangkap parameter stat yang dikirim dari ajax
    $statt = $_GET['statt'];
    if($statt == "ON")
    {
        //ubah field relay jadi 1
        mysqli_query($konek, "UPDATE tb_kontrol	SET relayy=1");
        //memberika respon
        echo "ON";
    }
    else
    {
        //ubah field relay jadi 0
        mysqli_query($konek, "UPDATE tb_kontrol	SET relayy=0");
        //memberika respon
        echo "OFF";
    }

    
?>