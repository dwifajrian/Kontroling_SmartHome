<?php
    // koneksi databases
    include "koneksi.php";

    // baca data dari tabel tb_sensor

    // baca id tertinggi
    $sql_id = mysqli_query($konek, "SELECT MAX(id) FROM tb_sensor");
    //tangkap datanya
    $data_id = mysqli_fetch_array($sql_id);
    //ambil id terakhir / terbesar
    $id_akhir = $data_id['MAX(id)']; //id = 14
    $id_awal = $id_akhir - 4;


    // baca tanggal untuk 5 data terakhir (sumbu x)
    $tanggal = mysqli_query($konek, "SELECT tanggal FROM tb_sensor WHERE id>='$id_awal' AND id<='$id_akhir' ORDER BY id ASC");
    // baca informasi suhu(sumbu y)
    $suhu = mysqli_query($konek, "SELECT suhu FROM tb_sensor WHERE id>='$id_awal' AND id<='$id_akhir' ORDER BY id ASC");
    // baca informasi kelembaban
    $kelembaban = mysqli_query($konek, "SELECT kelembaban FROM tb_sensor WHERE id>='$id_awal' AND id<='$id_akhir' ORDER BY id ASC");

?>

<!-- Tampilan grafik -->
<div class="panel panel-primary">
    <div class="panel-heading">
        Grafik Sensor
    </div>

    <div class="panel-body">
        <!-- canvas untuk grafik -->
        <canvas id="myChart"></canvas>

        <!-- gambar grafik -->
        <script type="text/javascript">
            //baca id canvas tempat grafik akan diletakkan
            var canvas = document.getElementById('myChart');
            //siapkan data tanggal dan suhu untuk grafik
            var data = {
                labels : [
                    <?php
                        while($data_tanggal = mysqli_fetch_array($tanggal))
                        {
                            echo '"'.$data_tanggal['tanggal'].'",' ;  //update data berupa json
                        }
                    ?>
                ] ,
                datasets : [
                {
                    label : "Suhu",
                    fill: true,
                    backgroundColor: "rgba(52, 231, 43, 0.2)",
                    borderColor : "rgba(52, 231, 43, 1)",
                    lineTension : 0.5,
                    pointRadius: 5,
                    data : [
                        <?php
                            while($data_suhu = mysqli_fetch_array($suhu))
                            {
                                echo $data_suhu['suhu'].',' ;
                            }
                        ?>
                    ]
                },
                {
                    label : "Kelembaban",
                    fill: true,
                    backgroundColor: "rgba(239, 82, 93, 0.2)",
                    borderColor : "rgba(239, 82, 93, 1)",
                    lineTension : 0.5,
                    pointRadius: 5,
                    data : [
                        <?php
                            while($data_kelembaban = mysqli_fetch_array($kelembaban))
                            {
                                echo $data_kelembaban['kelembaban'].',' ;
                            }
                        ?>
                    ]
                }
            ]
            } ;

            //option grafik
            var option ={
                showLines : true,
                animation : {duration : 0}
            };
            
            //cetak grafik kedalam canvas
            var myLineChart = Chart.Line(canvas, {
                data : data,
                options : option
            });
        </script>
    </div>
</div>