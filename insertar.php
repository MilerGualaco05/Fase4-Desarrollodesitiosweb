<!DOCTYPE html>
<html>
<head>
    <title>Insertar Datos</title>
    <!-- Agregar enlaces a los archivos de Bootstrap CSS -->
    <link rel="Stylesheet" href="css/bootstrap.css" />
  <link rel="Stylesheet" href="css/estilos.css" />
</head>
<body>
<h1>Insertar Datos</h1>



    <div class="container">
    <a href="index.html" class="btn btn-primary">volver al inicio</a>
        
        <form method="POST" action="insertar.php">
            <div class="form-group">
                <label for="codigo">Código de Producto:</label>
                <input type="text" class="form-control" id="codigo" name="codigo_producto" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre de Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre_producto" required>
            </div>
            <div class="form-group">
                <label for="marca">Marca de Producto:</label>
                <input type="text" class="form-control" id="marca" name="marca_producto" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio de Compra:</label>
                <input type="number" step="0.01" class="form-control" id="precio" name="precio_compra" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad Comprada:</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad_comprada" required>
            </div>
            <button type="submit" class="btn btn-success">Insertar</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $servername = "localhost";
        $username = "unad";
        $dbname = "bdunad301127_23";
        $password = "12345678";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Error en la conexión: " . $conn->connect_error);
        }

        // Obtener los valores de los campos del formulario
        $codigoProducto = $_POST['codigo_producto'];
        $nombreProducto = $_POST['nombre_producto'];
        $marcaProducto = $_POST['marca_producto'];
        $precioCompra = $_POST['precio_compra'];
        $cantidadComprada = $_POST['cantidad_comprada'];

        // Consulta SQL para insertar los datos
        $sql = "INSERT INTO codigo_producto (codigo_producto, nombre_producto, marca_producto, precio_compra, cantidad_comprada) 
                VALUES ('$codigoProducto', '$nombreProducto', '$marcaProducto', $precioCompra, $cantidadComprada)";

        if ($conn->query($sql) === TRUE) {
             ?><div class="alert alert-success">Datos insertados correctamente.</div><?php ;
        } else {
            echo "Error al insertar datos: " . $conn->error;
        }

        // Cerrar conexión
        $conn->close();
    }
    ?>
</body>
</html>

