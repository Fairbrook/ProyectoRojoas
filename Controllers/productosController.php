<?php namespace Controllers;
	
	use \Models\producto as producto;

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
				$cookie = "";
				if(isset($_COOKIE['carrito']))$cookie = $_COOKIE['carrito'];
				if(\strlen($cookie)>0)setcookie("carrito",$cookie."-".$id,time()+7200,"/");
				else setcookie("carrito",$id,time()+7200,"/");
			}else{
				$productos = new producto();
				$productos->set("id", $id);

				if($productos->read()){
					$this->view("productos",array(
					"producto" => $productos
					), "ver");
				}else $this->view("error");
			}
		}
	}
 ?>