<!-- baca status terakhir relay 1 -->
<?php
  //include koneksi
  include "koneksi.php";

  $sql = mysqli_query($konek, "SELECT * FROM tb_kontrol");
  $data = mysqli_fetch_array($sql);
  //ambil status relay 1
  $relay = $data['relay'];
  //ambil posisi relay2
  $relayy = $data['relayy'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <!-- Style CSS -->
    <link rel="stylesheet" type="text/css" href="css.css">
    <link rel="stylesheet" type="text/css" href="media.css">
  
    <title>SmartHome kontrolling</title>

    <script type="text/javascript">

    function ubahstatus(value)
      {
        if(value==true) value="ON";
        else value="OFF";
        document.getElementById('status').innerHTML = value;

        //ajax merubah nilai status (http request)
        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function()
        {
          if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
          {
            //ambil respon web setelah berhasil merubah nilai
            document.getElementById('status').innerHTML = xmlhttp.responseText;
          }
        }
        //eksekusi file PHP untuk merubah nilai di databases
        xmlhttp.open("GET", "relay.php?stat=" + value, true);
        //kirim data
        xmlhttp.send();
      }

      function ubahstatus2(value)
      {
        if(value==true) value="ON";
        else value="OFF";
        document.getElementById('status2').innerHTML = value;

         //ajax merubah nilai status (http request)
         var xmlhttp = new XMLHttpRequest();

          xmlhttp.onreadystatechange = function()
          {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200)
            {
              //ambil respon web setelah berhasil merubah nilai
              document.getElementById('status2').innerHTML = xmlhttp.responseText;
            }
          }
          //eksekusi file PHP untuk merubah nilai di databases
          xmlhttp.open("GET", "relayy.php?statt=" + value, true);
          //kirim data
          xmlhttp.send();
      }

      function ubahstatus3(value)
      {
        if(value==true) value="ON";
        else value="OFF";
        document.getElementById('status3').innerHTML = value;
      }

      function ubahstatus4(value)
      {
        if(value==true) value="ON";
        else value="OFF";
        document.getElementById('status4').innerHTML = value;
      }

    </script>
   
    </head>
    <body>
  
      <!-- Navbar -->
    
      <nav class="navbar navbar-expand-lg bg-white py-1 fs-5 border-buttom shadow-sm" >
          <div class="container" >
          <a class="navbar-brand" href="#" style="margin-left: 25px;">
          <img src="img/logoo.png" alt="Ajarin" width="" height="50">
          </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ms-auto ">
                <li class="nav-item me-3">
                  <a class="nav-link active" aria-current="page" href="#">Stopkontak</a>
                </li>
                <li class="nav-item me-3">
                  <a class="nav-link" href="sensor.php">Suhu&Kelembaban</a>
                </li>
                <li class="nav-item me-3">
                  <a class="nav-link" href="login.php">Log-Out</a>
                </li>
                
              </ul>
            </div>
          </div>
        </nav>
    
      
    <!-- Akhir Navbar -->

    <div class="container" style="text-align: center"> 
        <h2>Kontrol SmartHome Relay NodeMCU ESP8266</h2>
    </div>
    
    <div class="container allcard" style="display: flex">
      <!-- Relay 1-->
    <div class="card  mb-3 " style="width: 20rem;">
     <div class="card-header">Relay 1</div>
        <div class="card-body">

          <!-- Switch -->
          <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="ubahstatus(this.checked)" <?php if($relay==1) echo "checked"; ?>  >
          <label class="form-check-label" for="flexSwitchCheckDefault">   <span id="status"><?php if($relay==1) echo "ON"; else echo "OFF"; ?></span>   </label>
          </div>

        </div>
      </div>

      <!-- Relay 2-->
      <div class="card  mb-3" style="width: 20rem;">
     <div class="card-header">Relay 2</div>
        <div class="card-body">

          <!-- Switch -->
          <div class="form-check form-switch">
          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" onchange="ubahstatus2(this.checked)" <?php if($relayy==1) echo "checked"; ?> >
          <label class="form-check-label" for="flexSwitchCheckDefault">   <span id="status2"><?php if($relayy==1) echo "ON"; else echo "OFF"; ?></span>   </label>
          </div>

        </div>
      </div>

    </div>

    </div>

    <div class="image container banner">
      <img src="img/Banner.png" alt="">
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
    


  </body>
</html>