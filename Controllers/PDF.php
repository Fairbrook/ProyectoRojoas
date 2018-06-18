<?php namespace Controllers;
require("fpdf181/fpdf.php");

use \Models\usuario as usuario;

class PDF extends \FPDF
{
    private $ww;
    private $y1;
    private $y2;

    function Header()
    {
        
        $title = "Ropa el carlos";
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Calculamos ancho y posición del título.
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        // Colores de los bordes, fondo y texto
        $this->SetTextColor(0);
        // Ancho del borde (1 mm)
        $this->SetLineWidth(1);
        // Título
        $this->Cell($w,9,$title,0,0,'C',false);
        // Salto de línea
        $this->Ln(10);
    }
    
    function Footer()
    {
        // Posición a 1,5 cm del final
        $this->SetY(-15);
        // Arial itálica 8
        $this->SetFont('Arial','I',8);
        // Color del texto en gris
        $this->SetTextColor(128);
        // Número de página
        $this->Cell(0,10,iconv('UTF-8', 'windows-1252','Página ').$this->PageNo(),0,0,'C');
    }
    
    function BasicTable($header, $data)
    {
        // Cabecera
        foreach($header as $col)
        $this->Cell(40,7,$col,1);
        $this->Ln();
        // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
            $this->Cell(40,6,$col,1);
            $this->Ln();
        }
    }
    
    // Tabla coloreada
    function FancyTable($header, $data)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(80,80,80);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,128,128);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        // Cabecera
        $margin = 10;
        $this->ww = array(50, 85, 20, 15,20);
        for($i=0;$i<count($header);$i++)
        $this->Cell($this->ww[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetTextColor(0);
        $this->SetFont('');
        // Datos
        $fill = false;
        foreach($data as $row)
        {
            $this->y1 = $this->GetY();
            $this->MultiCell($this->ww[0],6,$row[0],'LR','L');
            $pos = $margin+$this->ww[0];
            $this->SetY($this->y1);
            $this->SetX($pos);
            $this->MultiCell($this->ww[1],6,$row[1],'LR','L');
            $pos = $margin;
            $this->y2 = $this->GetY();
            $this->Line($pos,$this->y1,$pos,$this->y2);
            $this->SetY($this->y1);
            $pos+=$this->ww[0]+$this->ww[1];
            $this->SetX($pos);
            $this->Cell($this->ww[2],6,number_format($row[2]),'LR',0,'R');
            $this->Line($pos,$this->y1,$pos,$this->y2);
            $this->Cell($this->ww[3],6,number_format($row[3]),'LR',0,'R');    
            $pos+=$this->ww[2];
            $this->Line($pos,$this->y1,$pos,$this->y2);
            $this->Cell($this->ww[4],6,number_format($row[4]),'LR',0,'R');    
            $pos+=$this->ww[3];
            $this->Line($pos,$this->y1,$pos,$this->y2);        
            $pos+=$this->ww[4];
            $this->Line($pos,$this->y1,$pos,$this->y2);        
            $this->Line($margin,$this->y2,$pos,$this->y2);
            $this->SetY($this->y2);
        }
    }
    
    function setInitialData($folio,$usuario,$compra,$entrega){
        $this->SetTitle("Factura-".$folio);
        $this->AddPage();
        $this->SetFont('Arial','',50);
        $this->Cell(0,20,"Factura");
        $this->Ln();
        $this->SetFont('Arial','',12);
        $this->Cell(0,6,"Folio: ".$folio);
        $this->Ln();
        $nombre = $usuario->get("nombres");
        $nombre .= " ".$usuario->get("apellido_p");
        $nombre .= " ".$usuario->get("apellido_m");
        $this->Cell(0,6,"Nombre del cliente:  ".iconv('UTF-8', 'windows-1252',$nombre));
        $this->Ln();
        $this->Cell(0,6,"Correo:  ".$usuario->get("correo"));
        $this->Ln();
        $this->Cell(0,6,iconv('UTF-8', 'windows-1252',"Dirección: ".$usuario->get("direccion")));
        $this->Ln();
        $this->Cell(0,6,"Fecha de compra: ".$compra);
        $this->Ln();
        $this->Cell(0,6,"Fecha de entrega: ".$entrega);
        $this->Ln(15);
    }

    function setTotal($total){
        $this->SetY($this->y2);
        $this->SetX(-1*($this->ww[4]+$this->ww[3]+10));
        $this->SetFont('Arial','B',15);
        $this->Cell($this->ww[3],8,"Total","LRB",0);
        $this->SetFont('Arial','',12);
        $this->Cell($this->ww[4],8,$total,"LRB",0,"R");
    }
    
}