<?php
require_once 'conexiodb.php';
session_start();

// Verificar si el usuario ya ha iniciado sesión, redirigirlo a la página de inicio si es así
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: home.php');
    exit;
}

// Verificar si se envió el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Realizar la consulta a la base de datos para verificar las credenciales
    $query = "SELECT id, nom, esProfe FROM Alumnes WHERE nom = '$username' AND id = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        // Obtener el valor de esProfe
        $row = mysqli_fetch_assoc($result);
        $esProfe = $row['esProfe'];

        if ($esProfe) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit;
        } else {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header('Location: home.php');
            exit;
        }
    } else {
        $error = 'Usuari o contrassenya incorrectes';
    }
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
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <main class="form-signin">
        <form method="POST" action="">
        
        <img class="mb-4 mx-auto d-block" src="https://agora.xtec.cat/insmontsia/wp-content/uploads/usu12/2021/09/logo_ins_montsia.png" alt="" width="300" height="150">
           
            <h1 class="h3 mb-3 fw-normal">Inicia sessió</h1>

            <?php if (isset($error)) { ?>
                <p class="text-danger"><?php echo $error; ?></p>
            <?php } ?>

            <div class="form-floating">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <label for="username">Usuari</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Contrasenya</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Recorda l'usuari i contrasenya
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Inicia sessió</button>
            <p class="mt-5 mb-3 text-muted">© 2022–2023</p>
        </form>
    </main>
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

