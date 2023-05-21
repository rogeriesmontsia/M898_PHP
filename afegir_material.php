<?php
session_start();
require_once 'conexiodb.php';

// Verificar si el usuario ha iniciado sesión, de lo contrario redirigirlo al formulario de inicio de sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: index.php');
    exit;
}

// Obtener el nombre de usuario de la sesión
$username = $_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>GestInf</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    

    <!-- Bootstrap core CSS -->
<link href="Dashboard%20Template%20%C2%B7%20Bootstrap%20v5.0_files/bootstrap.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="Dashboard%20Template%20%C2%B7%20Bootstrap%20v5.0_files/dashboard.css" rel="stylesheet">
  <style type="text/css">/* Chart.js */
@keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}</style></head>
  <body> 
    

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Benvingut, <?php echo $username; ?>!</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="logout.php">Tancar sessió</a>
    </div>
  </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
             <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
              Incidències
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="material.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file" aria-hidden="true"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
              Material assignat a alumnes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="assignar_material.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" aria-hidden="true"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
              Assignar material als alumnes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="inserir_usuaris.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
              Inserir usuaris
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="llista_alumnes.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2" aria-hidden="true"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
              Llista d'alumnes
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="afegir_material.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers" aria-hidden="true"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>
              Afegir material
            </a>
          </li>
        </ul>

        
        
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        

     
<div class="container">
    <div class="row">
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <h2>Afegir material</h2>

        <form action="" method="post">
  <div class="form-group">
    <label for="id">ID:</label>
    <input type="text" name="id" id="id" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="idTipus">ID Tipo:</label>
    <input type="text" name="idTipus" id="idTipus" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="idInventari">ID Inventario:</label>
    <input type="text" name="idInventari" id="idInventari" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="etiquetaDepInf">Etiqueta Departamento de Informática:</label>
    <input type="text" name="etiquetaDepInf" id="etiquetaDepInf" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="numSerie">Número de Serie:</label>
    <input type="text" name="numSerie" id="numSerie" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="macEthernet">MAC Ethernet:</label>
    <input type="text" name="macEthernet" id="macEthernet" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="macWifi">MAC Wi-Fi:</label>
    <input type="text" name="macWifi" id="macWifi" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="SACE">SACE:</label>
    <input type="text" name="SACE" id="SACE" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="dataAdquisicio">Fecha de Adquisición:</label>
    <input type="date" name="dataAdquisicio" id="dataAdquisicio" class="form-control" required>
  </div>

  <div class="form-group">
    <label for="idUbicacio">ID Ubicación:</label>
    <input type="text" name="idUbicacio" id="idUbicacio" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>
</form>

      </main>
    </div>
  </div>
</body>
</html>

<?php
require_once 'conexiodb.php'; // Asegúrate de incluir el archivo que contiene la conexión a la base de datos

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Obtener los valores ingresados por el usuario
  $id = $_POST["id"];
  $idTipus = $_POST["idTipus"];
  $idInventari = $_POST["idInventari"];
  $etiquetaDepInf = $_POST["etiquetaDepInf"];
  $numSerie = $_POST["numSerie"];
  $macEthernet = $_POST["macEthernet"];
  $macWifi = $_POST["macWifi"];
  $SACE = $_POST["SACE"];
  $dataAdquisicio = $_POST["dataAdquisicio"];
  $idUbicacio = $_POST["idUbicacio"];

  // Verificar si la conexión fue exitosa
  if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
  }

  // Preparar la consulta de inserción
  $stmt = $conn->prepare("INSERT INTO Material (id, idTipus, idInventari, etiquetaDepInf, numSerie, macEthernet, macWifi, SACE, dataAdquisicio, idUbicacio) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

  // Vincular los parámetros
  $stmt->bind_param("ssssssssss", $id, $idTipus, $idInventari, $etiquetaDepInf, $numSerie, $macEthernet, $macWifi, $SACE, $dataAdquisicio, $idUbicacio);

  // Ejecutar la consulta
  if ($stmt->execute()) {
    echo "Material agregado correctamente";
  } else {
    echo "Error al agregar el material: " . $stmt->error;
  }

  // Cerrar la conexión y liberar recursos
  $stmt->close();
  $conn->close();
}
?>


    </main>
  </div>
</div>









    <script src="Dashboard%20Template%20%C2%B7%20Bootstrap%20v5.0_files/bootstrap.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="Dashboard%20Template%20%C2%B7%20Bootstrap%20v5.0_files/feather.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="Dashboard%20Template%20%C2%B7%20Bootstrap%20v5.0_files/Chart.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="Dashboard%20Template%20%C2%B7%20Bootstrap%20v5.0_files/dashboard.js"></script>
  

</body></html>