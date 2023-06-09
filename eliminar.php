<!DOCTYPE html>
<html>
<head>
    <title>Eliminar base de datos, tabla o columnas</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/estilos.css" />
</head>
<body>
<h1>Eliminar</h1>
<a href="index.html" class="btn btn-primary">Volver al inicio</a>
<div class="container">
    
    <form method="POST" action="eliminar.php">
      <div class="form-group">
        <label for="tipo">Tipo:</label>
        <select class="form-control" id="tipo" name="tipo">
          <option value="eliminar_bd">Eliminar base de datos</option>
          <option value="eliminar_tabla">Eliminar tablas</option>
          <option value="filas">Eliminar filas</option>
        </select>
      </div>

      <?php
      // Código PHP para generar el menú desplegable de filas
      $servername = "localhost";
      $username = "unad";
      $password = "12345678";
      $dbname = "bdunad301127_23";

      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT id, codigo_producto, nombre_producto, marca_producto, precio_compra, cantidad_comprada FROM codigo_producto";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      ?>
        <div class="form-group">
          <label for="filas">Filas:</label>
          <select class="form-control" id="filas" name="filas[]" multiple>
            <?php
            foreach ($rows as $row) {
              $id = $row['id'];
              $codigo = $row['codigo_producto'];
              $nombre = $row['nombre_producto'];
              $marca = $row['marca_producto'];
              $precio = $row['precio_compra'];
              $cantidad = $row['cantidad_comprada'];
              echo "<option value='$id'>ID: $id | Código: $codigo | Nombre: $nombre | Marca: $marca | Precio: $precio | Cantidad: $cantidad</option>";
            }
            ?>
          </select>
        </div>
      <?php
      } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
      ?>

      <button type="submit" class="btn btn-primary">Eliminar</button>
    </form>
  </div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Configuración de la base de datos
    $servername = "localhost";
    $username = "unad";
    $password = "12345678";
    $dbname = "bdunad301127_23";

    // Conexión a la base de datos
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (isset($_POST['tipo'])) {
            if ($_POST['tipo'] == 'eliminar_bd') {
                // Eliminar la base de datos completa
                $query = "DROP DATABASE $dbname";
                $conn->exec($query);

                echo "La base de datos '$dbname' se eliminó correctamente.";
            } elseif ($_POST['tipo'] == 'eliminar_tabla') {
                // Eliminar todas las tablas de la base de datos
                $query = "SHOW TABLES";
                $result = $conn->query($query);
                $tables = $result->fetchAll(PDO::FETCH_COLUMN);

                foreach ($tables as $table) {
                    $query = "DROP TABLE $table";
                    $conn->exec($query);
                }

                echo "Todas las tablas se eliminaron correctamente.";
            } elseif ($_POST['tipo'] == 'filas') {
                // Eliminar filas de una tabla específica
                if (isset($_POST['tabla'])) {
                    $tabla = $_POST['tabla'];

                    // Verificar si se ha seleccionado alguna fila para eliminar
                    if (isset($_POST['filas']) && is_array($_POST['filas'])) {
                        $filas = $_POST['filas'];
                        $placeholders = rtrim(str_repeat('?,', count($filas)), ',');
                        $query = "DELETE FROM $tabla WHERE id IN ($placeholders)";
                        $stmt = $conn->prepare($query);
                        $stmt->execute($filas);

                        echo "Se eliminaron las filas seleccionadas de la tabla '$tabla' correctamente.";
                    } else {
                        echo "No se han seleccionado filas para eliminar.";
                    }
                } else {
                    echo "Debe especificar una tabla.";
                }
            }
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
}
?>

                </body>
                </html>
                