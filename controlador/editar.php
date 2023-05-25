<?php
	include '../modelo/conex_editar.php';

	$id = $_POST['id'];
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
	

	$sentencia = $bd->prepare("UPDATE estudiantes SET Fecha_ingreso= ?, Tipo_documento= ?, Documento= ?, Nombres= ?, Apellidos= ?, Edad= ?, Correo= ?, Telefono= ?, Id_Materia= ?, Nombre_Materia= ? WHERE Id= ?;");


	$resultado = $sentencia->execute([$Fecha_ingreso, $Tipo_documento, $Documento, $Nombres, $Apellidos, $Edad, $Correo, $Telefono, $Id_Materia, $Nombre_Materia, $id]);

	if($resultado){
		echo "<script>
		Swal.fire({
			position: 'top-end',
			icon: 'success',
			title: 'Actualización Exitosa',
			showConfirmButton: false,
			timer: 1500
		})
		location.href = '../vista/listado.php';</script>";
	}
	else{
		return "Error";
	}



?>