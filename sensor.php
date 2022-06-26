<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Sensor</title>

    <!--- panggil file bootsrap -->
    
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
    <script type="text/javascript" src="jquery-latest.js"></script>
    <link rel="stylesheet" type="text/css" href="media.css">

    <!-- panggil data grafik -->
    <script type="text/javascript">
        var refreshid = setInterval(function(){
            $('#responscontainer').load('data.php');
        }, 1000);
    </script>
</head>
<!-- Navbar -->
    
<nav class="navbar navbar-expand-lg bg-white py-1 fs-5 border-buttom shadow-sm" >
          <div class="container" >
          <a class="navbar-brand navbar-sensor" href="#" style="margin-left: 25px;">
          <img src="img/logoo.png" alt="Ajarin" width="" height="50">
          </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ms-auto ">
                <li class="nav-item me-3">
                  <a class="nav-link" aria-current="page" href="index.php">Stopkontak</a>
                </li>
                <li class="nav-item me-3">
                  <a class="nav-link active" href="#">Suhu&Kelembaban</a>
                </li>
                <li class="nav-item me-3">
                  <a class="nav-link" href="login.php">Log-Out</a>
                </li>
                
              </ul>
            </div>
          </div>
        </nav>
    
      
    <!-- Akhir Navbar -->
<body>
    <!-- Tempat tampilan grafik -->
    <div class="container" style="text-align: center;">
        <h3>Grafik Sensor</h3>
         <p>(Data yang ditampilkan adalah 5 data terakhir)</p>
    </div>

    <!-- Div untuk grafik -->
    <div class="container">
        <div class="container" id="responscontainer" style="width: 70%; text-align: center;"></div>
    </div>

    <!-- menampilkan gambar -->
    <div class="imagee container" style="text-align: center;">
        <img src="img/Banner.png" alt="" >
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
</body>
</html>