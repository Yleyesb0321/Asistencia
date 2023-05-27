$('.editbtn').on('click',function(){
  
	$tr=$(this).closest('tr');
	var datos=$tr.children("td").map(function(){
		return $(this).text();
	});
  $('#update_id').val(datos[0]);
  $('#fecha').val(datos[1]);
  $('#tipodoc').val(datos[2]);
  $('#documento').val(datos[3]);
  $('#nombres').val(datos[4]);
  $('#apellidos').val(datos[5]);
  $('#edad').val(datos[6]);
  $('#correo').val(datos[7]);
  $('#telefono').val(datos[8]);
  $('#idmateria').val(datos[9]);
  $('#materia').val(datos[10]);

});
