<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear base de datos</title>
    <link rel="Stylesheet" href="css/bootstrap.css" />
  <link rel="Stylesheet" href="css/estilos.css" />
</head>
<body>

    
    <h1>Crear base de datos</h1>

    <div class="container">
    <a href="index.html" class="btn btn-primary">volver al inicio</a>
  <form method="POST">
        
  <div class="form-group d-grid gap-2 col-6 mx-auto">
    <input type="submit" class="btn btn-primary" value="Crear base de datos">
  </div>
</form>
</div>

<?php
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$servername = "localhost";
$admin_username = "root";
$admin_password = "";
$new_username = "unad";
$new_password= "12345678";

// Establecer conexión con el usuario administrador
$conn = new mysqli($servername, $admin_username, $admin_password);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Otorgar privilegios al usuario
$grantPrivilegesQuery = "GRANT ALL PRIVILEGES ON *.* TO '$new_username'@'localhost' IDENTIFIED BY '$new_password';";
if ($conn->query($grantPrivilegesQuery) === TRUE) {
    
} else {
    echo "Error al otorgar privilegios: " . $conn->error;
}


// Cerrar la conexión con el usuario administrador
$conn->close();

// Crear conexión con el nuevo usuario 'unad'
$conn = new mysqli($servername, $new_username, $new_password);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos con el nuevo usuario: " . $conn->connect_error);
}

// Verificar si la base de datos ya existe
$sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'bdunad301127_23'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  ?><div class="container mt-5">
  
  <div class="alert alert-warning">La base de datos bdunad301127_23 ya existe</div>
 
</div> 

<?php  
} else {
    // Crear la base de datos 'bdunad301127_23'
    $sql = "CREATE DATABASE bdunad301127_23";
    if ($conn->query($sql) === TRUE) {
      ?>
  <div class="container mt-5">
  <div class="alert alert-success">La base de datos bdunad301127_23 ha sido creada exitosamente.</div>
</div> <?php    
  
    } else {
        echo "Error al crear la base de datos: " . $conn->error;
    }
}

// Cerrar la conexión con el nuevo usuario
$conn->close();
}
?>

</body>
</html>
