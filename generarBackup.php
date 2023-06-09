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

    
    <h1>Crear Backup</h1>

    <div class="container">
    <a href="index.html" class="btn btn-primary">volver al inicio</a>
  <form method="POST">
        
  <div class="form-group d-grid gap-2 col-6 mx-auto">
    <input type="submit" class="btn btn-primary" value="Crear Backup">
  </div>
</form>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Configuración de la base de datos
  $servername = "localhost";
  $username = "unad";
  $password = "12345678";
  $dbname = "bdunad301127_23";

  // Ruta y nombre de archivo de respaldo
  $backupFile = 'C:\xampp\htdocs\fase_4\backups\_' . date('YmdHis') . '.sql';

  // Comando para realizar el respaldo utilizando la herramienta mysqldump
  $command = "mysqldump --user={$username} --password={$password} --host={$servername} {$dbname} > {$backupFile}";

  // Ejecutar el comando
  system($command);

  // Verificar si el archivo de respaldo se creó correctamente
  if (file_exists($backupFile)) {
    ?>
  <div class="container mt-5">
  <div class="alert alert-success">La copia de seguridad de la base de datos ha sido creada exitosamente.</div>
</div> <?php   $backupFile;
  } else {
    ?>
  <div class="container mt-5">
  <div class="alert alert-danger">Error al crear el respaldo.</div>
</div> <?php 
  }
}
?>


</BODY>
</HTML>
