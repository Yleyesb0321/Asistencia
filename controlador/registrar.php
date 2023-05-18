<?php

$host = "localhost";
$user = "root";
$clave = "";
$bd = "asistencia";

$conectar = new Mysqli($host, $user, $clave, $bd);

if(isset($_POST['btn_guardar'])){
  $Fecha_ingreso = $_POST['fecha'];
  $Tipo_documento = $_POST['tipodoc'];
  $Documento = $_POST['documento'];
  $Nombres = $_POST['nombres'];
  $Apellidos = $_POST['apellidos'];
  $Edad = $_POST['edad'];
  $Correo = $_POST['correo'];
  $Telefono = $_POST['telefono'];
  $Id_Materia  = $_POST['idmateria'];
  $Nombre_Materia = $_POST['materia'];
	
  if($Fecha_ingreso =="" || $Tipo_documento =="" || $Documento =="" || $Nombres =="" || $Apellidos =="" || $Edad =="" || $Correo =="" || $Telefono =="" || $Id_Materia =="" || $Nombre_Materia ==""){
    echo "<script> Swal.fire('Todos los Campos son obligatorios')</script>";
  }
  else{
    $guardar = mysqli_query(
      $conectar, 
      "INSERT INTO estudiantes (Fecha_Ingreso, Tipo_documento, Documento, Nombres, Apellidos, Edad, Correo, Telefono, Id_Materia, Nombre_Materia) 
      VALUES ('$Fecha_ingreso', '$Tipo_documento', '$Tipo_documento', '$Nombres', '$Apellidos', '$Edad', '$Correo', '$Telefono', '$Id_Materia', '$Nombre_Materia')");
  }
	echo "<script> Swal.fire('Registro Exitoso')</script>";
	
}
?>