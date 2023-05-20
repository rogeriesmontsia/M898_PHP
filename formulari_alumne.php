<?php
require_once 'conexiodb.php';

// Obtener el nombre de usuario de la variable de sesión
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
    // Obtener el último valor de id en la tabla Incidencies
    $query = "SELECT MAX(id) AS max_id FROM Incidencies";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();
    $maxId = $row['max_id'];
    $username = $_SESSION['username'];
    echo "Nombre de usuario: " . $username;
    
    // Incrementar el valor de id en uno
    $id = $maxId + 1;

    // Verificar si el ID de alumno existe en la tabla Alumnes
    $query = "SELECT id FROM Alumnes WHERE nom = '$username'";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        // Obtener el primer registro de la consulta
        $row = $result->fetch_assoc();

        // Obtener el ID del usuario
        $idAlumne = $row['id'];

        // Obtener los valores del formulario
        $idDispositiu = $_POST['idDispositiu'];
        $informacio = $_POST['informacio'];
        $dataOberta = date('Y-m-d');

        // Realizar la inserción en la base de datos
        $query = "INSERT INTO Incidencies (id, informacio, dataOberta, dataTancada, idAlumne, idDispositiu, idEstat) VALUES ('$id', '$informacio', '$dataOberta', NULL, '$idAlumne', '$idDispositiu', NULL)";
        $result = $conn->query($query);

        if ($result) {
            // Inserción exitosa
            echo "Datos insertados correctamente";
        } else {
            // Error al insertar datos
            echo "Error al insertar datos: " . $conn->error;
        }
    } else {
        // El ID del alumno no es válido
        echo "El ID de alumno no es válido";
    }

    // Cerrar la conexión
    $conn->close();
}
?>

