<?php namespace Controllers;

require 'phpmailer/PHPMailer/src/Exception.php';
require 'phpmailer/PHPMailer/src/PHPMailer.php';
require 'phpmailer/PHPMailer/src/SMTP.php';

use \Models\usuario as usuario;
use \Models\tarjeta as tarjeta;
use \Models\producto as producto;
use \Models\manager as manager;
use \Models\descuento as descuento;
use \Models\factura as factura;
use \Models\venta as venta;

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
	
		
		public function login($mode=""){
			$usuario = new usuario();
			if($mode=="cookie")$_SESSION['cookie']=true;
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
			$factura = new factura();
			$total=0;
			$usuario->set('id',$_SESSION['id']);
			$usuario->read();
			$cookie = \json_decode($_COOKIE["carrito-{$_SESSION['id']}"],true);
			$productos = array();
			foreach($cookie as $prod){
				$producto = new producto();
				$producto->set("id",$prod["id"]);
				$producto->read();
				$subtotal=$prod["cantidad"]*$producto->get("precio");
				$descuento = new descuento();
				$descuentos = $descuento->getByProducto($prod["id"]);
				foreach($descuentos as $x){
					if($prod["cantidad"]>=$x->cantidad){
						$subtotal=$prod["cantidad"]*$producto->get("precio");
						$subtotal-=$subtotal*($x->descuento/100);
					}
				}
				$productos[] = array(
					"id"=>$producto->getId(),
					"cantidad"=>$prod["cantidad"],
					"subtotal"=>$subtotal);
					$total+=$subtotal;
			}
			$factura->set("id_cliente",$_SESSION['id']);
			$factura->set("total",$total);
			$factura->set("estado",1);
			$factura->save();
			foreach($productos as $prod){
				$venta = new venta();
				$venta->set("id_fac",$factura->getId());
				$venta->set("subtotal",$prod["subtotal"]);
				$venta->set("cantidad",$prod["cantidad"]);
				$venta->set("id_producto",$prod["id"]);				
				$venta->save();
			}
			setcookie("carrito-{$_SESSION['id']}","",0,"/");
			
				
				
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