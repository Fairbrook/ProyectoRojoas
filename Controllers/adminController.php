<?php namespace Controllers;

use \Models\sub_categoria as sub_categoria;
use \Models\producto as producto;
use \Models\categoria as categoria;
use \Models\descuento as descuento;
use \Models\factura as factura;
use \Models\usuario as usuario;

class adminController extends \Core\controladorBase{
	public function index(){
		if(!isset($_SESSION['manager']))header("Location: ".URL);
		else{
			$producto = new producto();
			$productos = $producto->getAll();
			$this->view("admin",array("productos"=>$productos));
		}
	}
	public function add(){
		if(!isset($_SESSION['manager']))header("Location: ".URL);
		if($_SERVER['REQUEST_METHOD']=='POST'){
			
			$producto = new producto();
			$descuento = new descuento();
			$fileName = $producto->getNextId();
			$id = $fileName;
			$fileName = $this->uploadImage($fileName);
			if($fileName==1)header("Location: ".URL."error".DS."mensaje".DS."Error al subir imagen");
			if($fileName==2)header("Location: ".URL."error".DS."mensaje".DS."Formato de archivo incorrecto");
			$producto->set("id",$id);
			$producto->set("nombre",$_POST['nombre']);
			$producto->set("cantidad",$_POST['cantidad']);
			$producto->set("precio",$_POST['precio']);
			$producto->set("descripcion",$_POST['descripcion']);
			$producto->set("imagen",$fileName);
			$producto->set("id_categoria",$_POST['categoria']);
			$producto->save();
			
			$descuento->set("id_producto",$id);
			$descuento->set("descuento",$_POST['desc1']);
			$descuento->set("cantidad",$_POST['cant1']);
			$descuento->save();

			$descuento->set("id",null);
			$descuento->set("descuento",$_POST['desc2']);
			$descuento->set("cantidad",$_POST['cant2']);
			$descuento->save();

			$descuento->set("id",null);
			$descuento->set("descuento",$_POST['desc3']);
			$descuento->set("cantidad",$_POST['cant3']);
			$descuento->save();

			header("Location: ".URL."error".DS."mensaje".DS."Registro exitoso");	
		}else {
			$categoria = new sub_categoria();
			$categorias = $categoria->getAll();
			$this->view("admin",array("categorias"=>$categorias),"add");
		}
	}
	public function addCat($type="cat"){
		if(!isset($_SESSION['manager']))header("Location: ".URL);

		if($_SERVER['REQUEST_METHOD']=='POST'){
			if($type=="cat"){
				$categoria = new categoria();
				$categoria->set("nombre",ucfirst(strtolower($_POST['nombre'])));
				$categoria->save();
			}else if($type=="sub"){
				$categoria = new sub_categoria();
				$categoria->set("nombre",ucfirst(strtolower($_POST['nombre'])));
				$categoria->set("descript",$_POST['descript']);
				$categoria->set("id_categoria",$_POST['categoria']);
				$categoria->save();
			}
		}else {
			$categoria = new categoria();
			$categorias = $categoria->getAll();
			$this->view("admin",array("categorias"=>$categorias),"addCat");
		}
	}

	public function mod($id){
		if(!isset($_SESSION['manager']))header("Location: ".URL);
		if(!isset($id))\header("Location: ".URL."error");
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$producto = new producto();
			$producto->set("id",$id);
			$producto->read();
			$producto->set("cantidad",$_POST['cantidad']);
			$producto->update();

			$descuento = new descuento();
			$descuentos = $descuento->getByProducto($id);

			$descuento->set("id",$descuentos[0]->id);
			$descuento->read();
			$descuento->set("descuento",$_POST['desc1']);
			$descuento->set("cantidad",$_POST['num1']);
			$descuento->update();

			$descuento->set("id",$descuentos[1]->id);
			$descuento->read();
			$descuento->set("descuento",$_POST['desc2']);
			$descuento->set("cantidad",$_POST['num2']);
			$descuento->update();

			$descuento->set("id",$descuentos[2]->id);
			$descuento->read();
			$descuento->set("descuento",$_POST['desc3']);
			$descuento->set("cantidad",$_POST['num3']);
			$descuento->update();
			header("Location: ".URL."error".DS."mensaje".DS."Actualización exitosa");
		}else{
			$producto = new producto();
			$producto->set("id",$id);
			if(!$producto->read())\header("Location: ".URL."error");
			$categoria = new sub_categoria();
			$categoria->set("id",$producto->get("id_categoria"));
			$categoria->read();
			$descuento = new descuento();
			$descuentos = $descuento->getByProducto($id);
			$this->view("admin",
					array(
						"producto"=>$producto,
						"categoria"=>$categoria,
						"descuentos"=>$descuentos
					),
					"update");
		}
	}

	public function completado($id){
		if(!isset($_SESSION['manager']))header("Location: ".URL);
		$factura = new factura();
		$factura->set("id",$id);
		$factura->read();
		$factura->set("estado",2);
		$factura->update();
		header("Location: ".URL."admin".DS."pedidos");
	}

	public function vencido($id){
		if(!isset($_SESSION['manager']))header("Location: ".URL);
		$factura = new factura();
		$factura->set("id",$id);
		$factura->read();
		$factura->set("estado",3);
		$factura->update();
		header("Location: ".URL."admin".DS."pedidos");
	}

	public function pedidos(){
		if(!isset($_SESSION['manager']))header("Location: ".URL);
		$factura = new factura();
		$facturas = $factura->getAll();
		$usuarios = array();
		foreach ($facturas as $x) {
			$usuario = new usuario();
			$usuario->set("id",$x->id_cliente);
			$usuario->read();
			$usuarios[] = $usuario;
		}
		$this->view("admin",array(
			"facturas"=>$facturas,
			"usuarios"=>$usuarios
		),"facturas");
	}
	private function uploadImage($name){
		$target = "C:\\xampp\\htdocs\\ProyectoRojoas\\img\\".$name;
		
		// Check if image file is a actual image or fake image
		/*$check = getimagesize($_FILES["img"]["tmp_name"]);
		if($check == false)return 3;*/
		
		// Check file size
		/*if ($_FILES["img"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}*/
		// Allow certain file formats
		
		$fullType = \explode("/",$_FILES["img"]["type"]);
		$fileType = $fullType[1];
		$target .= ".".$fileType;
		if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg") {
			return 2;
		}
		if (move_uploaded_file($_FILES["img"]["tmp_name"], $target)) {
			return ($name.".".$fileType);
		} else {
			return 1;
		}
		
		
	}
}
?>