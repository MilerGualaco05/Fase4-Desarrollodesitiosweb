<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Actualizar</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
      integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i"
      crossorigin="anonymous"
    ></script>
    <link rel="Stylesheet" href="css/estilos.css" />
  </head>

  <body>
    <main id="hero">

      <nav>
        <ul class="menu">
          <img src="imagenes/logo.png" alt="Bootstrap" width="150" height="100" />

          <li><a href="Index.html"><strong>Inicio</strong></a></li>
  
            <li class="boton3"><a href="administrador.html"><strong>Administrador</strong></a>
                <div class="listadesplegable3">
                    <a href="crearBD.php">Crear Base De Datos</a>
                    <a href="creartabla.php">Crear Tabla</a>
                    <a href="generarPdf.html">Generar reporte PDF</a>
                    <a href="generarBackup.html">Generar Backup</a>
                </div>
            
            </li>
  
            <li class="boton3"><a href="inventario.html"><strong>Inventario</a>
                <div class="listadesplegable3">
                    <a href="seleccionar.php">Consultar</a>
                    <a href="eliminar.php">Eliminar</a>
                    <a href="insertar.php">Insertar</a>
                    <a href="actualizar.php">Actualizar</a>
                </div>
            </li>
        
            <li><a href="utilidades.html"><strong>Utilidades</strong></a></li>

             </li>

        </ul>
      </nav>
      
    </main>

    <!-- codigo -->

    <center>
      <div class="container">
        <br>
        <h3>Gestion de productos</h3>
        <br>
        <form class="row g-3">
        
        <div class="col-auto">
        <label for="inputPassword2"class="visually-hidden">Id Producto</label>
        <input type="text"class="form-control"id="inputPassword2"placeholder="Id
        Producto">
        </div>
        <div class="col-auto">
        <button type="submit"class="btn btn-primary mb-3">Buscar Productos</button>
        </div>
        </div>
        <br>
        <form class="row g-3 needs-validation"novalidate>
        <div class="col-md-2">
        <label for="validationCustom01"class="form-label">Código</label>
        <input type="text"class="form-control"id="validationCustom01"value=""
        required>
        <div class="valid-feedback">
        correcto
        </div>
        </div>
        <div class="col-md-2">
        <label for="validationCustom01"class="form-label">Cantidad</label>
        <input type="number"class="form-control"id="validationCustom01"value=""
        required>
        <div class="valid-feedback">
        correcto
        </div>
        </div>
        <div class="col-md-8">
        <label for="validationCustom02"class="form-label">Nombre de producto</label>
        <input type="text"class="form-control"id="validationCustom02"value=""
        required>
        <div class="valid-feedback">
        Looks good!
        </div>
        </div>
        <div class="col-md-8">
        <label for="validationCustom02"class="form-label">Marca producto</label>
        <input type="text"class="form-control"id="validationCustom02"value=""
        required>
        <div class="valid-feedback">
        Looks good!
        </div>
        </div>
        <div class="col-md-4">
        <label for="validationCustomUsername"class="form-label">Precio de compra</label>
        <div class="input-group has-validation">
        <span class="input-group-text"id="inputGroupPrepend">$</span>
        <input type="text"class="form-control"id="validationCustomUsername"
        aria-describedby="inputGroupPrepend"required>
        <div class="invalid-feedback">
        Please choose a username.
        </div>
        </div>
        </div>
        <br>
        <div class="btn-group"role="group"aria-label="Basic checkbox toggle button group">
        <button class="btn btn-success"type="submit">Guardar producto</button>
        <button class="btn btn-warning"type="submit">Actulizar Producto</button>
        <button class="btn btn-danger"type="submit">Eliminar Producto</button>
        </div>
        </form>
        </div>
    </center>
    
    
  </body>
</html>




