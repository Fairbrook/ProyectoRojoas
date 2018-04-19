<?php namespace Controllers;
use \Models\usuario as usuario;
class errorController extends \Core\controladorBase{
	public function index(){
		$this->view("error");
	}
}
 ?>
