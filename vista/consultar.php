<!Doctype html>
<html lang="es">
<head>
	<title>Formulario Asistencia</title>
	<link rel="shortcut icon" href="../img/logo.png">
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	
	<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
	
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
            <a class="nav-link active  text-white" aria-current="page" href="#">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link  text-white"  href="listado.php">Listado</a>
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
          <button class="btn btn-outline-dark text-white" type="submit">Buscar</button>
        </form>
      </div>
    </div>
  </nav>
  <br>
  <div id="container">
    <h2 class="display-6 text-danger">Consulta de Registrados</h2>
    <form action="" method="post">	
      <table>
      <tr>
      <td><label>Señor Usuario Digite su numero documento para Consultar su registro</label><br><br>
        <input type="text" name="ConsultaDocumento" class="form-control" style="width: 100%">
        </td>
      </tr><br>
      <td colspan="2"><br>
      <center>
        <input type="submit" name="btn_consultar" value="Consultar" class="btn btn-dark">
      </center></td>
        
      </tr>
      </table>
    <td colspan="2"></td>
    <br>
    </center>

<!-----Modulo de Consulta ---->
  <?php
  include_once("../modelo/conexionadd.php");
  if(isset($_POST['btn_consultar']))
  {
    $documento = $_POST['ConsultaDocumento'];
    $existe = 0;
    
    if($documento=="")
    {
      echo "<script> Swal.fire('<h4>Señor Usuario Digite numero documento para su consulta</h4>')</script>";
    }
    
    else{
      $resultado = mysqli_query($conectar, "SELECT * FROM estudiante WHERE Documento = '$documento'");
      
    
      while($consulta = mysqli_fetch_array($resultado))
      {
        echo "
        <center><table width=\"80%\border\"1\">
        <tr>
        <td><center><b>Fecha y Hora </b></center></td>
        <td><center><b>Tipo Documento </b></center></td>
        <td><center><b>Numero Documento </b></center></td>
        <td><center><b>Nombres </b></center></td>
        <td><center><b>Apellidos </b></center></td>
        <td><center><b>Edad </b></center></td>
        <td><center><b>Correo </b></center></td>
        <td><center><b>Movil </b></center></td>
        <td><center><b>Id Materia </b></center></td>
        <td><center><b>Nombre Materia </b></center></td>
        </tr>
        <tr>
        <td><center>".$consulta['FechaIngreso']."</center></td>
        <td><center>".$consulta['TipoDocumento']."</center></td>
        <td><center>".$consulta['Documento']."</center></td>
        <td><center>".$consulta['Nombres']."</center></td>
        <td><center>".$consulta['Apellidos']."</center></td>
        <td><center>".$consulta['Edad']."</center></td>
        <td><center>".$consulta['Correo']."</center></td>
        <td><center>".$consulta['Telefono']."</center></td>
        <td><center>".$consulta['Id_Materia']."</center></td>
        <td><center>".$consulta['NombreMateria']."</center></td>
        </tr>
        </table>
        </center>";
        
        $existe++;
        }
        
        if($existe==0){
          
          echo "<script> Swal.fire('<h4>Numero Digitalizado no existe en nuestra base de datos</h4>')</script>";
          
        }		
      
    }
  }
  
  
  ?>
  
  </form>
  </div>

</body>
</html>