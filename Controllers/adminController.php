<?php namespace Controllers;

use \Models\sub_categoria as sub_categoria;
use \Models\producto as producto;
use \Models\categoria as categoria;

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
		if($_SERVER['REQUEST_METHOD']=='POST'){
			
			$producto = new producto();
			$fileName = $producto->getNextId();
			$producto->set("id",$fileName);
			$fileName = $this->uploadImage($fileName);
			if($fileName==1)header("Location: ".URL."error".DS."mensaje".DS."Error al subir imagen");
			if($fileName==2)header("Location: ".URL."error".DS."mensaje".DS."Formato de archivo incorrecto");
			$producto->set("nombre",$_POST['nombre']);
			$producto->set("cantidad",$_POST['cantidad']);
			$producto->set("precio",$_POST['precio']);
			$producto->set("descripcion",$_POST['descripcion']);
			$producto->set("imagen",$fileName);
			$producto->set("id_categoria",$_POST['categoria']);
			$producto->save();
		}else {
			$categoria = new sub_categoria();
			$categorias = $categoria->getAll();
			$this->view("admin",array("categorias"=>$categorias),"add");
		}
	}
	public function addCat($type="cat"){
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