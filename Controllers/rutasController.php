<?php namespace Controllers;

use \Models\usuario as usuario;
class rutasController extends \Core\controladorBase{

	public function contacto(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			require './phpmailer'.DS.'class.phpmailer.php';

			$mail = new \PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->Host = 'smtp.gmail.com';
			$mail->Username = 'ceti.kevin@gmail.com';
			$mail->Password = '040499cran';
			$mail->Port = 587;
			$mail->From = 'ceti.kevin@gmail.com';
			$mail->FromName = "Ropa el carlos";
			$mail->AddAddress('kevinvr@hotmail.es');
			$mail->IsHTML(true);
			$mail->Subject="Comentarios de ".$_POST['nombre'];
			$mail->Body = require './Views/contacto/contenido.php';
			$exito = $mail->Send();

			if ($exito) {
				echo "ahuevo";
			}else echo "verga";
		}
		else $this->view("contacto");
	}

	public function registro(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$registrar = new usuario();
			$registrar->set('nombres',$_POST['nombres']);
			$registrar->set('apellido_p',$_POST['apellido_p']);
			$registrar->set('apellido_m',$_POST['apellido_m']);
			$registrar->set('direccion',$_POST['direccion']);
			$registrar->set('nombres',$_POST['nombres']);
			$registrar->set('correo',$_POST['correo']);
			$registrar->set('contrasena',$_POST['contrasena']);
			$registrar->save();
		}else $this->view("registro");
	}
}

 ?>