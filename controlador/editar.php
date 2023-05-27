<?php
	include_once ('../modelo/conex_editar.php');

	$Id_estudiante = $_POST['Id_estudiante'];
	$Fecha_ingreso = $_POST['fecha'];
	$Tipo_documento = $_POST['tipodoc'];
	$Documento = $_POST['documento'];
	$Nombres = $_POST['nombres'];
	$Apellidos = $_POST['apellidos'];
	$Edad = $_POST['edad'];
	$Correo = $_POST['correo'];
	$Telefono = $_POST['telefono'];
	$Id_Materia = $_POST['idmateria'];
	$Nombre_Materia = $_POST['materia'];
	

	$sentencia = $bd->prepare("UPDATE estudiantes SET Fecha_ingreso= ?, Tipo_documento= ?, Documento= ?, Nombres= ?, Apellidos= ?, Edad= ?, Correo= ?, Telefono= ?, Id_Materia= ?, Nombre_Materia= ? WHERE Id_estudiante= ?; ");


	$resultado = $sentencia->execute([$Fecha_ingreso, $Tipo_documento, $Documento, $Nombres, $Apellidos, $Edad, $Correo, $Telefono, $Id_Materia, $Nombre_Materia, $Id_estudiante]);

	

	if($resultado){
		echo "<script>
			location.href = '../vista/listados.php';
		</script>";
	}
	else {
		return 'Error';
		
	}

?>