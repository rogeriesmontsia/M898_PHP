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
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Checkout example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">

    

    <!-- Bootstrap core CSS -->
<link href="Checkout%20example%20%C2%B7%20Bootstrap%20v5.0_files/bootstrap.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
  
  <h1>Benvingut, <?php echo $username; ?>!</h1>



    <a href="logout.php">Tancar sessió</a>
    
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
    <label for="informacio">Información:</label>
    <textarea name="informacio" id="informacio" required></textarea>
    </div>
    
    <div>
    <button type="submit">Guardar</button>
    </div>
</form>

    
    
    </div>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Formulari</h4>
        
        
        <div class="col-md-4">
    <label for="state" class="form-label">Selecciona l'equip afectat</label>
    <select class="form-select" id="state" required="">
        <option value="" selected="selected">Choose...</option>
        <?php
        require_once 'conexiodb.php';

        // Obtener el ID del alumno
        $password = $_SESSION['password'];

        // Realizar la consulta a la base de datos para obtener las opciones
        $query = "SELECT idMaterial FROM Assignacions WHERE idAlumne ='$password'";
        $result = $conn->query($query);

        // Verificar errores de conexión y consulta
        if ($conn->connect_error) {
            die("Error de conexión a la base de datos: " . $conn->connect_error);
        }

        if (!$result) {
            die("Error en la consulta: " . $conn->error);
        }

        // Iterar sobre los resultados y generar las opciones del desplegable
        while ($row = $result->fetch_assoc()) {
            $stateName = $row['idMaterial'];
            echo "<option>$stateName</option>";
        }
        ?>
    </select>
    <div class="invalid-feedback">
        Please provide a valid state.
    </div>
</div>





        
        
        
        
        <form class="needs-validation" novalidate="">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="firstName" placeholder="" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="lastName" placeholder="" required="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" class="form-control" id="username" placeholder="Username" required="">
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-12">
              <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-select" id="country" required="">
                <option value="" selected="selected">Choose...</option>
                <option>United States</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            

    </select>
    <div class="invalid-feedback">
        Please provide a valid state.
    </div>
</div>

            <div class="col-md-3">
              <label for="zip" class="form-label">Zip</label>
              <input type="text" class="form-control" id="zip" placeholder="" required="">
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Save this information for next time</label>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked="checked" required="">
              <label class="form-check-label" for="credit">Credit card</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required="">
              <label class="form-check-label" for="debit">Debit card</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required="">
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">Name on card</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required="">
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">Credit card number</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required="">
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">Expiration</label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">

          <button class="w-100 btn btn-primary btn-lg" type="submit">Envia el formulari</button>
        </form>
      </div>
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
  

</body></html>
