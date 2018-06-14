<?php namespace Controllers;

use \Models\producto as producto;
use \Models\descuento as descuento;

class carritoController extends \Core\controladorBase{

    
    public function index(){
        $result=Array();
		$total=0;
		if(isset($_SESSION['cookie'])){
			if(isset($_COOKIE["carrito--1"])&&isset($_SESSION['id'])){
				setcookie("carrito--1","",0,"/");
				setcookie("carrito-{$_SESSION['id']}",$_COOKIE["carrito--1"],time()+7200,"/");
			}
		}
		if(isset($_SESSION['id']))$usuario = $_SESSION['id'];
		else $usuario = -1;
		if(isset($_COOKIE["carrito-{$usuario}"])){
			$cookie = \json_decode($_COOKIE["carrito-{$usuario}"],true);
			
			
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
					"nombre"=>$producto->get("nombre"),
					"cantidad"=>$prod["cantidad"],
					"subtotal"=>$subtotal);
					$total+=$subtotal;
				}
			}
			
			$this->view("carrito",array('productos' => $productos,'total'=>$total));
    }

    public function borrar($id){
        $result=Array();
		$total=0;
		if(isset($_SESSION['cookie'])){
			if(isset($_COOKIE["carrito--1"])&&isset($_SESSION['id'])){
				setcookie("carrito--1","",0,"/");
				setcookie("carrito-{$_SESSION['id']}",$_COOKIE["carrito--1"],time()+7200,"/");
			}
		}
		if(isset($_SESSION['id']))$usuario = $_SESSION['id'];
		else $usuario = -1;
		if(isset($_COOKIE["carrito-{$usuario}"])){
			$cookie = \json_decode($_COOKIE["carrito-{$usuario}"],true);
            $aux=array();
            $cookie;
			foreach($cookie as $prod){
                if($prod["id"]!=$id){
                    echo $prod["id"];
					$aux[]=$prod;
				}
            }
            setcookie("carrito-{$usuario}",\json_encode($aux),time()+7200,"/");
            \header("Location: ".URL."carrito");
        }
    }
}
?>