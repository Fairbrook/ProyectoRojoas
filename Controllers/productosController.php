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
			$this->view("productos",
				array("productos"=>$result),
				"categoria"
			);
		}

		public function ver($id){
			$productos = new producto();
			$productos->set("id", $id);

			if($productos->read()){
				$this->view("productos",array(
				"producto" => $productos
				), "ver");
			}else $this->view("error");
		}
	}
 ?>