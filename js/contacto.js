function send(){
	$.post(
		"enviarCorreo.php",
		{
			'tel':$('#telefono').val(),
			'mensaje':$('#mensaje').val(),
			'email':$('#email').val(),
			'nombre':$('#nombre').val()
		},
		function action(data){
			alert(data);
		}
	)
}