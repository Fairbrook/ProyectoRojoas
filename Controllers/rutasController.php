<?php namespace Controllers;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';

use \Models\usuario as usuario;
use \Models\tarjeta as tarjeta;
use \Models\producto as producto;
use \Models\manager as manager;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class rutasController extends \Core\controladorBase{

	public function contacto(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$mail = new PHPMailer(true);
			$mail->IsSMTP();
			$mail->SMTPDebug = 0;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			$mail->IsHTML(true);
			$mail->Username = 'ceti.kevin@gmail.com';
			$mail->Password = '04041999';
			$mail->SetFrom('ceti.kevin@gmail.com');
			$mail->FromName = "Ropa el carlos";
			$mail->AddAddress('thebeastkevin@gmail.com');
			$mail->Subject="Comentarios de ".$_POST['nombre'];
			$mail->Body = require './Views/contacto/contenido.php';
			$exito = $mail->Send();

			if ($exito) {
				$this->view("contacto",array(),"exito");
			}else $this->view("contacto",array(),"error");
		}
		else $this->view("contacto");
	}

	public function registro(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$fecha = \explode("-",$_POST['exp']);
			$registrar = new usuario();
			$tarjeta = new tarjeta();
			$registrar->set('username',$_POST['usuario']);
			$registrar->set('nombres',$_POST['nombres']);
			$registrar->set('apellido_p',$_POST['apellido_p']);
			$registrar->set('apellido_m',$_POST['apellido_m']);
			$registrar->set('direccion',$_POST['direccion']);
			$registrar->set('nombres',$_POST['nombres']);
			$registrar->set('correo',$_POST['correo']);
			$registrar->set('contrasena',$_POST['contrasena']);
			$registrar->set('fecha_nac',$_POST['nac']);
			$registrar->set('type',0);
			$usuario = $registrar->save();

			$tarjeta->set('numero',$_POST['tarjeta']);
			$tarjeta->set('cod_seg',$_POST['cvv']);
			$tarjeta->set('month',$fecha[1]);
			$tarjeta->set('year',$fecha[0]);
			$tarjeta->set("id_usuario",$registrar->getId());
			$tarjeta->save();
			if (isset($usuario)) {
				$_SESSION['nombres']=$registrar->get('nombres');
				$_SESSION['id']=$registrar->getId();
				header("Location: ".URL);
			}
		}else $this->view("registro");
	}

	public function carrito(){
		$result=Array();
		$total=0;
		if(isset($_COOKIE['carrito'])){
			$cookie = $_COOKIE['carrito'];
			$idProductos = explode("-",$cookie);
			$prod = new producto();
			$productos = $prod->getAll();
			$total = 0;

			foreach ($productos as $producto) {
				foreach($idProductos as $id){
					if($id == $producto->id){
						$result[] = $producto;
						$total+=$producto->precio;
					}
				}			
			}
		}

		$this->view("carrito",array('productos' => $result,'total'=>$total));
	}

	public function login(){
		$usuario = new usuario();
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$usuario->set('username',$_POST['username']);
			$usuario->set('contrasena',$_POST['pass']);
			$id = $usuario->login();
			if($id==-1){
				$manager = new manager();
				$manager->set("username",$_POST['username']);
				$manager->set("password",$_POST['pass']);
				if($manager->login()==-1)
				$this->view("login",array("error"=>"error"));
				else{
					$_SESSION['manager']=true;
					header("Location: ".URL."admin");
				}
			}
			else {
				$usuario->set('id',$id);
				$usuario->read();
				$_SESSION['nombres']=$usuario->get('nombres');
				$_SESSION['id']=$usuario->getId();
				header("Location: ".URL);
			}
		}else $this->view("login");
	}


	public function fecha(){
		$date = date("Y-m-d"); 
        $date_det = explode("-",$date);
        $cont=0;
        while($cont!=3){
            $jd = gregoriantojd($date_det[1],$date_det[2],$date_det[0]);
            $day = jddayofweek($jd,0);
            if($day!=6 && $day!=0)$cont++;
            $date_det[2]++;
        }
        return date("M-d-Y", mktime(0,0,0,$date_det[1],$date_det[2],$date_det[0]));
	}

	public function comprar(){
		$usuario = new usuario();
		$usuario->set('id',$_SESSION['id']);
		$usuario->read();

		require './phpmailer'.DS.'class.phpmailer.php';
			$mail = new \PHPMailer();
			$mail->IsSMTP();
			$mail->SMTPDebug = 1;
			$mail->SMTPAuth = true;
			$mail->SMTPSecure = 'ssl';
			$mail->Host = 'smtp.gmail.com';
			$mail->Port = 465;
			$mail->IsHTML(true);
			$mail->Username = 'ceti.kevin@gmail.com';
			$mail->Password = '04041999';
			$mail->SetFrom('no-replay@ropaelcarlos.comm');
			$mail->FromName = "Ropa el carlos";
			$mail->AddAddress($usuario->get('correo'));
			$mail->Subject="Estado de su pedido";
			$mail->Body = "Su pedido llega el ".$this->fecha();
			$exito = $mail->Send();

			if ($exito) {
				$this->view("comprar",array(),"exito");
			}else $this->view("comprar",array(),"error");
	}

	public function logout(){
		unset($_SESSION['nombres']);
		unset($_SESSION['id']);
		unset($_SESSION['manager']);
		header("Location: ".URL);
	}

}

 ?>