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
$password = $_SESSION['password'];

// Realizar la consulta para obtener el ID del usuario desde la tabla Alumnes
$query = "SELECT id FROM Alumnes WHERE nom = '$username'";
$result = $conn->query($query);

// Verificar si se obtuvo un resultado válido
if ($result && $result->num_rows > 0) {
    // Obtener el primer registro de la consulta
    $row = $result->fetch_assoc();

    // Obtener el ID del usuario
    $idAlumne = $row['id'];

    // Guardar el ID del usuario en la variable de sesión
    $_SESSION['id'] = $idAlumne;
} else {
    // Manejar el caso cuando no se encuentra el usuario en la tabla Alumnes
    // Puedes mostrar un mensaje de error, redireccionar a una página de error, etc.
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">
    <!-- Bootstrap core CSS -->
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
    <link href="Checkout%20example%20%C2%B7%20Bootstrap%20v5.0_files/form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">
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
<div class="container">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto mb-4" src="Checkout%20example%20%C2%B7%20Bootstrap%20v5.0_files/bootstrap-logo.svg" alt="" width="72" height="57">
            <h2>Sol·licitud d'equip informàtic</h2>
            <p class="lead">Per a sol·licitar equip informàtic cal emplenar el formulari que tenim a continuació</p>
            <form action="formulari_alumne.php" method="POST">
                <div>
                    <label for="idDispositiu">ID del dispositiu:</label>
                    <input type="text" name="idDispositiu" id="idDispositiu" required>
                </div>
                <div>
                    <label for="informacio">Informació:</label>
                    <textarea name="informacio" id="informacio" required></textarea>
                </div>
                <div>
                    <button type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </main>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017–2021 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>
<script src="Checkout%20example%20%C2%B7%20Bootstrap%20v5.0_files/bootstrap.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="Checkout%20example%20%C2%B7%20Bootstrap%20v5.0_files/form-validation.js"></script>
</body>
</html>
