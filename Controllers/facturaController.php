<?php namespace Controllers;

use \Models\factura as factura;

class facturaController extends \Core\controladorBase{
    function make($id){

    }
    function index(){
        if(!isset($_SESSION['id']))header("Location: ".URL);
        $factura = new factura();
		$facturas = $factura->getByUsuario($_SESSION['id']);
		$this->view("facturas",array("facturas"=>$facturas));
    }
}
?>