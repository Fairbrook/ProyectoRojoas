<?php namespace Controllers;

use \Models\usuario as usuario;

class XMLController{
    private $xml;
    function FancyTable($header, $data){
        foreach($data as $prod){
            $producto = $this->xml->addChild("producto");
            for($i=0;$i<\count($header);$i++){
                $producto->addChild($header[$i],$prod[$i]);
            }
        }
    }
    function setInitialData($folio,$usuario,$compra,$entrega){
        $this->xml = new \SimpleXMLElement('<factura-'.$folio.'/>');
        $this->xml->addChild("folio",$folio);
        $nombre = $usuario->get("nombres");
        $nombre .= " ".$usuario->get("apellido_p");
        $nombre .= " ".$usuario->get("apellido_m");
        $cliente = $this->xml->addChild("cliente");
        $cliente->addChild("nombre",$nombre);
        $cliente->addChild("correo",$usuario->get("correo"));
        $cliente->addChild("direccion",$usuario->get("direccion"));
        $this->xml->addChild("compra",$compra);
        $this->xml->addChild("entegra",$entrega);
    }
    function setTotal($total){
        $this->xml->addChild("total",$total);
        Header('Content-type: text/xml');
        print($this->xml->asXML());
    }
}