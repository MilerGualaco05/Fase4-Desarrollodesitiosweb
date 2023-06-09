<!DOCTYPE html>
<html>
<head>
    <title>Formulario de productos</title>
    <link rel="Stylesheet" href="css/bootstrap.css" />
  <link rel="Stylesheet" href="css/estilos.css" />
</head>
<body>



<!DOCTYPE html>
<html>
<head>
    <title>Consulta de productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Consulta de productos</h1>
        <a href="index.html" class="btn btn-primary">volver al inicio</a>
        <form method="POST" action="">
            <div class="form-group">
                <label for="codigo_producto">Código de Producto:</label>
                <input type="text" class="form-control" name="codigo_producto" id="codigo_producto">
            </div>
            <div class="form-group">
                <label for="keyword">Palabras clave:</label>
                <input type="text" class="form-control" name="keyword" id="keyword">
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <hr>

        <?php
         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$servername = "localhost";
$username = "unad";
$password = "12345678";
$dbname = "bdunad301127_23";
$codigo_producto = isset($_POST['codigo_producto']) ? $_POST['codigo_producto'] : '';
$keyword = isset($_POST['keyword']) ? $_POST['keyword'] : '';

// Parámetros de paginación
$resultsPerPage = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($page - 1) * $resultsPerPage;

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Revisar conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Construir la consulta SQL con la búsqueda de palabras clave y paginación
$sql = "SELECT id, codigo_producto, nombre_producto, marca_producto, precio_compra, cantidad_comprada FROM codigo_producto";
$countSql = "SELECT COUNT(*) AS count FROM codigo_producto";
$whereClause = "";

if (!empty($codigo_producto)) {
    $whereClause = " WHERE codigo_producto = '$codigo_producto'";
}

if (!empty($keyword)) {
    $keyword = mysqli_real_escape_string($conn, $keyword);
    if (!empty($whereClause)) {
        $whereClause .= " AND (nombre_producto LIKE '%$keyword%' OR marca_producto LIKE '%$keyword%')";
    } else {
        $whereClause = " WHERE (nombre_producto LIKE '%$keyword%' OR marca_producto LIKE '%$keyword%')";
    }
}

$sql .= $whereClause;
$countSql .= $whereClause;

// Obtener el total de resultados
$countResult = mysqli_query($conn, $countSql);
$countRow = mysqli_fetch_assoc($countResult);
$totalResults = $countRow['count'];
$totalPages = ceil($totalResults / $resultsPerPage);

// Obtener los resultados para la página actual
$sql .= " LIMIT $startFrom, $resultsPerPage";
$result = mysqli_query($conn, $sql);
?>
       <?php
       if (mysqli_num_rows($result) > 0) {
        // Mostrar resultados
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p><strong>ID:</strong> " . $row["id"] . "</p>";
            echo "<p><strong>Código de Producto:</strong> " . $row["codigo_producto"] . "</p>";
            echo "<p><strong>Nombre de Producto:</strong> " . $row["nombre_producto"] . "</p>";
            echo "<p><strong>Marca de Producto:</strong> " . $row["marca_producto"] . "</p>";
    
            // Verificar si las claves existen antes de imprimir el valor
            if (isset($row["precio_compra"])) {
                echo "<p><strong>Precio de Compra:</strong> " . $row["precio_compra"] . "</p>";
            } else {
                echo "<p><strong>Precio de Compra:</strong> No disponible</p>";
            }
    
            if (isset($row["cantidad_comprada"])) {
                echo "<p><strong>Cantidad Comprada:</strong> " . $row["cantidad_comprada"] . "</p>";
            } else {
                echo "<p><strong>Cantidad Comprada:</strong> No disponible</p>";
            }
    
            echo "<br>";
        }
    } else {
        echo "0 resultados";
    }
    
    // Mostrar paginador
    if ($totalPages > 1) {
        echo '<nav aria-label="Pagination">';
        echo '<ul class="pagination justify-content-center">';
        for ($i = 1; $i <= $totalPages; $i++) {
            echo '<li class="page-item ' . ($i == $page ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }
        echo '</ul>';
        echo '</nav>';
    }
    
    mysqli_close($conn);
 } ?>
   
    
    
    
    
    
       



</body>
</html>
