<?php

  include_once("../controlador/registrar.php");
  if(isset($_POST['btn_consultar'])){

    $documento = $_POST['ConsultaDocumento'];
    $existe = 0;
    
    if($documento==""){
      echo "<script> Swal.fire('<h4>Señor Usuario Digite numero documento para su consulta</h4>')</script>";
    }
    
    else{
      $resultado = mysqli_query($conectar, "SELECT * FROM estudiantes WHERE Documento = '$documento'");
      
      while($consulta = mysqli_fetch_array($resultado)){
        
          echo "
            <center>
              <table width=\"80%\border\"1\">
                <tr>
                  <td><center><b>Fecha y Hora </b></center></td>
                  <td><center><b>Tipo Documento </b></center></td>
                  <td><center><b>Numero Documento </b></center></td>
                  <td><center><b>Nombres </b></center></td>
                  <td><center><b>Apellidos </b></center></td>
                  <td><center><b>Edad </b></center></td>
                  <td><center><b>Correo </b></center></td>
                  <td><center><b>Telefono </b></center></td>
                  <td><center><b>Id_Materia </b></center></td>
                  <td><center><b>Nombre_Materia </b></center></td>
                </tr>
                <tr>
                  <td><center>".$consulta['Fecha_Ingreso']."</center></td>
                  <td><center>".$consulta['Tipo_documento']."</center></td>
                  <td><center>".$consulta['Documento']."</center></td>
                  <td><center>".$consulta['Nombres']."</center></td>
                  <td><center>".$consulta['Apellidos']."</center></td>
                  <td><center>".$consulta['Edad']."</center></td>
                  <td><center>".$consulta['Correo']."</center></td>
                  <td><center>".$consulta['Telefono']."</center></td>
                  <td><center>".$consulta['Id_Materia']."</center></td>
                  <td><center>".$consulta['Nombre_Materia']."</center></td>
                </tr>
              </table>
            </center>";
            
          $existe++;
        }
        
      if($existe==0){
          
        echo "<script> Swal.fire('<h4>Número de Documento, no existe en nuestra base de datos</h4>')</script>";
          
      }		
    }
  }
  
  
?>