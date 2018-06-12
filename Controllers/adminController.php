<?php namespace Controllers;

	use \Models\sub_cateoria as categoria;

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

			}else {
				$categoria = new categoria();
				$categorias = $categoria->getAll();
				$this->view("admin",array("categorias"=>$categorias),"add");
			}
		}
	}
 ?>