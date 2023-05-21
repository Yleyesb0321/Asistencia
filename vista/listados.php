<?php
  include_once '../modelo/filtrar.php';
  $objeto = new Conexion();
  $conexion = $objeto->Conectar();


  $consulta = "SELECT * FROM estudiantes";
  $resultado = $conexion->prepare($consulta);
  $resultado->execute();
  $usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);

?>
<!Doctype html>
<html lang="es">
<head>
	<title>Formulario Asistencia</title>
	<link rel="shortcut icon" href="../img/logo.png">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	
	<!---- Alertas con estilo --->
	<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	
	<!---- Iconos de los botones bonito --->
	<script src="https://kit.fontawesome.com/dcb1bbced2.js" crossorigin="anonymous"></script>

  <!--Iconos de Redes Sociales-->
	<link rel="stylesheet" href="https://kit.fontawesome.com/dcb1bbced2.css" crossorigin="anonymous">
	
	</head>
<body>
  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <img src="../img/logo.png" width="5%">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active  text-white" aria-current="page" href="../index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-white"  href="listados.php">Listado</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link  text-white" href="formAsistencia.php">Registrar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="consultar.php">Consultar</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-primary text-white" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
	<br><br>
	<div class="container">
    <h1 class="text-center text-dark">Listado de Registrados</h1><br><br>

		<table id="tablaUsuarios" class="table-striped table-success" style="width: 100%">
			<thead>
        <tr>
          <th scope="col">Item</th>	
          <th scope="col">Fecha Ingreso</th>		
          <th scope="col">Tipo Documento</th>	
          <th scope="col">Numero Documento</th>		
          <th scope="col">Nombres</th>		
          <th scope="col">Apellidos</th>		
          <th scope="col">Edad</th>		
          <th scope="col">Correos</th>	
          <th scope="col">Telefono</th>		
          <th scope="col">Id Programa</th>		
          <th scope="col">Nombre Programa</th>	
          <th scope="col">Editar</th>	
          <th scope="col">Eliminar</th>	
        </tr>
      </thead>
      <tbody>
      <!-- Logica para filtrar datos de la tabla estudiante	-->
        <?php
        foreach($usuarios as $filtro){
        ?>
        <tr>
          <td><?php echo $filtro['Id_estudiante']?></td>
          <td><?php echo $filtro['Fecha_ingreso']?></td>
          <td><?php echo $filtro['Tipo_documento']?></td>
          <td><?php echo $filtro['Documento']?></td>
          <td><?php echo $filtro['Nombres']?></td>
          <td><?php echo $filtro['Apellidos']?></td>
          <td><?php echo $filtro['Edad']?></td>
          <td><?php echo $filtro['Correo']?></td>
          <td><?php echo $filtro['Telefono']?></td>
          <td><?php echo $filtro['Id_Materia']?></td>
          <td><?php echo $filtro['Nombre_Materia']?></td>

          <!--Boton Editar-->
          <td>
            <button type="button" class="btn btn-success editbtn" data-bg-toogle="modal" data-bg-target="#editar"><i class="fa-solid fa-file-pen"></i>
            </button>
          </td>

          <!--Boton Eliminar-->
          <td>
            <button type="button" class="btn btn-danger deletebtn" data-bg-toogle="modal" data-bg-target="#eliminar"><i class="fa-solid fa-trash-can"></i>
            </button>
          </td>

        </tr>
        <?php
        }
        ?>
      </tbody>	
		</table>
	
	
	</div>
  <br><br>
  <!-- Footer -->
  <footer class="text-center text-white bg-dark">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-linkedin"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-github"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Company name
            </h6>
            <p>
              Here you can use rows and columns to organize your footer content. Lorem ipsum
              dolor sit amet, consectetur adipisicing elit.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-white">Angular</a>
            </p>
            <p>
              <a href="#!" class="text-white">React</a>
            </p>
            <p>
              <a href="#!" class="text-white">Vue</a>
            </p>
            <p>
              <a href="#!" class="text-white">Laravel</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-white">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-white">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-white">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-white">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              info@example.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center text-white p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="#"> Yecid Leyes || Software Development 🎯 </a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

</body>
</html>