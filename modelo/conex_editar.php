<?php
	$clave = "";
	$usuario = "root";
	$nombrebd = "asistencia";
	try{
		$bd = new PDO('mysql:host=localhost;dbname='.$nombrebd, $usuario, $clave);
		
	}catch(Exception $e){
		
		echo "<script>
		Swal.fire({
			icon: 'error',
			title: 'Oops...',
			text: 'Error de Conexion a la Base de Datos!',
		});
		</script>".$e->getMessage();
	}

?>