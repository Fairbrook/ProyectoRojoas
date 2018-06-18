<?php namespace Controllers;

use \Models\factura as factura;
use \Controllers\PDF as PDF;
use \Models\usuario as usuario;
use \Models\venta as venta;
use \Models\producto as producto;
use \Controllers\XMLController as XML;

class facturaController extends \Core\controladorBase{
    function make($id){
        
    }
    function index(){
        if(!isset($_SESSION['id']))header("Location: ".URL);
        $factura = new factura();
		$facturas = $factura->getByUsuario($_SESSION['id']);
		$this->view("facturas",array("facturas"=>$facturas));
    }
    function pdf($id){
        $factura = new factura();
        $pdf = new PDF();

        $factura->set("id",$id);
        $factura->read();
        $venta = new venta();
        $ventas = $venta->getByFactura($id);

        $usuario = new usuario();
        $usuario->set("id",$factura->get("id_cliente"));
        $usuario->read();

        $pdf->setInitialData($factura->getId(),$usuario,$factura->get("pedido"),$factura->get("entrega"));
        $header = array("Nombre","descripcion","Cantidad","Precio","Total");
        $data = array();
        $producto = new producto();
        foreach($ventas as $x){
            $producto->set("id",$x->id_producto);
            $producto->read();
            $data[]=array(
                $producto->get("nombre"),
                $producto->get("descripcion"),
                $x->cantidad,
                $producto->get("precio"),
                $x->subtotal
            );
        }
        $pdf->FancyTable($header,$data);
        $pdf->setTotal($factura->get("total"));
        $pdf->Output("I","Factura-".$factura->getId());
    }

    function xml($id){
        $factura = new factura();
        $xml = new XML();
        $factura->set("id",$id);
        $factura->read();
        $venta = new venta();
        $ventas = $venta->getByFactura($id);

        $usuario = new usuario();
        $usuario->set("id",$factura->get("id_cliente"));
        $usuario->read();

        $xml->setInitialData($factura->getId(),$usuario,$factura->get("pedido"),$factura->get("entrega"));
        $header = array("Nombre","descripcion","Cantidad","Precio","Total");
        $data = array();
        $producto = new producto();
        foreach($ventas as $x){
            $producto->set("id",$x->id_producto);
            $producto->read();
            $data[]=array(
                $producto->get("nombre"),
                $producto->get("descripcion"),
                $x->cantidad,
                $producto->get("precio"),
                $x->subtotal
            );
        }
        $xml->FancyTable($header,$data);
        $xml->setTotal($factura->get("total"));
    }
}
?>