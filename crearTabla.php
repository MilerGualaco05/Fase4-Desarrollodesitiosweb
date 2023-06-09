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
  $username = "unad";
  $dbname = "bdunad301127_23";
  $password= "12345678";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die('Error al conectar a la base de datos: ' . $conn->connect_error);
  }

  // Comprobar si la tabla ya existe
  $table_name = 'codigo_producto';
  $check_table_query = "SHOW TABLES LIKE '$table_name'";
  $result = $conn->query($check_table_query);
  if ($result->num_rows > 0) {
      echo '<div class="alert alert-warning">La tabla ya existe</div>';
  } else {
      // Crear la tabla
      $sql = 'CREATE TABLE codigo_producto (
          id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          codigo_producto VARCHAR(30) NOT NULL,
          nombre_producto VARCHAR(50) NOT NULL,
          marca_producto VARCHAR(50) NOT NULL,
          precio_compra DECIMAL(10,2) NOT NULL,
          cantidad_comprada INT(6) NOT NULL
      )';

      if ($conn->query($sql) === TRUE) {
          echo '<div class="alert alert-success">Tabla creada correctamente</div>';
      } else {
          echo '<div class="alert alert-danger">Error al crear la tabla: ' . $conn->error . '</div>';
      }
  }

  $conn->close();
}
?>
</body>
</html>