<?php namespace Controllers;

class rutasController extends \Core\controladorBase{
	public function contacto(){
		$this->view("contacto");
	}
	public function registro(){
		$this->view("registro");
	}
}

 ?>