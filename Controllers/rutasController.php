<?php namespace Controllers;

class rutasController extends \Core\controladorBase{
	public function contacto(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			require './phpmailer'.DS.'class.phpmailer.php';

			$mail = new \PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->Host = 'smtp.gmail.com';
			$mail->Username = 'no-replay@simon-baby.com';
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
				echo "ehuevo";
			}else echo "verga";
		}
		else $this->view("contacto");
	}
	public function registro(){
		$this->view("registro");
	}
}

 ?>