<?php namespace Controllers;
	class estudiantesController extends \Core\controladorBase{
		public function index($mensaje=''){
			$this->view("estudiantes",array(
				"hola"=>"adios"
			));
		}
	}
 ?>