<?php
   //include koneksi
   include "koneksi.php";

    //menangkap parameter stat yang dikirim dari ajax
    $stat = $_GET['stat'];
    if($stat == "ON")
    {
        //ubah field relay jadi 1
        mysqli_query($konek, "UPDATE tb_kontrol	SET relay=1");
        //memberika respon
        echo "ON";
    }
    else
    {
        //ubah field relay jadi 0
        mysqli_query($konek, "UPDATE tb_kontrol	SET relay=0");
        //memberika respon
        echo "OFF";
    }

    
?>