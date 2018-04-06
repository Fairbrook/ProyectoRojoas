<?php  
	$contenido = "Ha recivido un comentario de ".$_POST['nombre']."\nCorreo: ".$_POST['email']."\nTelefono: ".$_POST['tel']."\n Comentario: ".$_POST['mensaje'];
	if(mail("ceti.kevin@gmail.com", "Comentario de ".$_POST['nombre'], $contenido)==true)echo "Enviado exitosamente";
	else echo "Error al enviar";
	mail($_POST['email'],'Confirmacion','Datos enviados correctamente');
?>