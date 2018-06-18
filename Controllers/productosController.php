<?php namespace Controllers;

use \Models\producto as producto;
use \Models\descuento as descuento;

class productosController extends \Core\controladorBase
{
	public function index(){
		$a = 0;
		$productos = new producto();
		$result = $productos->getAll();
		
		if(count($result)>6){
			while ($a <= 6 && $result[$a]) {
				$enviar[$a] = $result[$a];
				$a++;
			}
			$this->view("productos",array(
				"productos"=>$enviar
			));
		}else{
			$this->view("productos",array(
				"productos"=>$result
			));
		}
	}
	
	public function categoria($id){
		$productos = new producto();
		$result = $productos->getAll();
		$enviar = Array();
		$cont=0;
		foreach ($result as $key) {
			if($key->id_categoria==$id){
				$enviar[$cont]=$key;
				$cont++;
			}
		}
		$this->view("productos",
		array("productos"=>$enviar),
		"categoria"
		);
	}

	public function ver($id){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$producto = new producto();
			$cookie = array();
			if(isset($_SESSION['id']))$usuario = $_SESSION['id'];
			else $usuario = -1;
			if(isset($_COOKIE["carrito-{$usuario}"])){
				$cookie = json_decode($_COOKIE["carrito-{$usuario}"],true);	
			}
			$aux=$cookie;
			$cookie =array();
			foreach($aux as $prod){
				if($prod["id"]==$id){
					$prod["cantidad"]+=$_POST['cantidad'];
					$producto->set("id",$id);
					$producto->read();
					if($prod["cantidad"]>$producto->get("cantidad")){
						$producto = new producto();
						$producto->set("id",$id);
						$descuento = new descuento();
						$descuentos = $descuento->getByProducto($id);
			
						if($producto->read()){
							$this->view("productos",array(
								"producto" => $producto,
								"descuentos"=>$descuentos,
								"error"=>"No hay suficientes"
							), "ver");
							return;
						}
					}
					$flag=true;
				}
				$cookie[]=$prod;
			}
			if(!isset($flag)){
				$producto->set("id",$id);
				$producto->read();
				if($_POST["cantidad"]>$producto->get("cantidad")){
					$producto = new producto();
					$producto->set("id",$id);
					$descuento = new descuento();
					$descuentos = $descuento->getByProducto($id);
		
					if($producto->read()){
						$this->view("productos",array(
							"producto" => $producto,
							"descuentos"=>$descuentos,
							"error"=>"No hay suficientes"
						), "ver");
						return;
					}
				}
				$cookie[] = array("id"=>$id,"cantidad"=>$_POST['cantidad']);
			}
			var_dump($cookie);
			$set = json_encode($cookie);
			setcookie("carrito-{$usuario}",$set,time()+7200,"/");
			header("Location: ".URL."carrito");
		}else{
			$producto = new producto();
			$producto->set("id",$id);
			$descuento = new descuento();
			$descuentos = $descuento->getByProducto($id);
			
			if($producto->read()){
				$this->view("productos",array(
					"producto" => $producto,
					"descuentos"=>$descuentos
				), "ver");
			}else $this->view("error");
		}
	}
}
?>