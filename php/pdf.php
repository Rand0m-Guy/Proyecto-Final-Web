<?php
if ( !($_GET['function']='add' && $_GET['id_pag'])){
    header("Location: ../index.html");
    exit;
}
session_start();
$folio=$_SESSION['folio'];
$nombre=$_SESSION['nombre'];
$appat=$_SESSION['ap'];
$apmat=$_SESSION['am'];
$curp=$_SESSION['curp'];
$correo=$_SESSION['mail'];
$tel=$_SESSION['tel'];
$calle=$_SESSION['calle'];
$num_ext=$_SESSION['nex'];
$num_int=$_SESSION['nin'];
$colonia=$_SESSION['col'];
$cp=$_SESSION['cop'];
$entidad=$_SESSION['estadopdf'];
$alc_o_mun=$_SESSION['alcmun'];
$lugar=$_SESSION['lugarpf'];
$fecha=$_SESSION['date'];
$hora=$_SESSION['hora'];
$tipo_evento=$_SESSION['tipo'];
$num_personas=$_SESSION['np'];
$menu=$_SESSION['menupdf'];
$fotolugar=$_SESSION['lugarimg'];
require('fpdf185/fpdf.php');

class PDF_Rotate extends FPDF {
    var $angle=0;

    function Rotate($angle,$x=-1,$y=-1)
    {
        if($x==-1)
            $x=$this->x;
        if($y==-1)
            $y=$this->y;
        if($this->angle!=0)
            $this->_out('Q');
        $this->angle=$angle;
        if($angle!=0)
        {
            $angle*=M_PI/180;
            $c=cos($angle);
            $s=sin($angle);
            $cx=$x*$this->k;
            $cy=($this->h-$y)*$this->k;
            $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
        }
    }

    function _endpage()
    {
        if($this->angle!=0)
        {
            $this->angle=0;
            $this->_out('Q');
        }
        parent::_endpage();
    }
}

class PDF extends PDF_Rotate {
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('../img/icon-negro.png',10,8,20);
        // Salto de Línea
        $this->Ln(20);
        $this->AddFont('Sacramento','','Sacramento-Regular.php');
        $this->SetFont('Sacramento','',130);
        $this->SetTextColor(192,220,255);
        $this->RotatedText(45,220,'R h y t h m',45);
    }

    function RotatedText($x, $y, $txt, $angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle,$x,$y);
        $this->Text($x,$y,$txt);
        $this->Rotate(0);
    }
}

$pdf = new PDF();
$pdf->AddFont('Lexend','','Lexend-Regular.php');
$pdf->AddFont('Lexend','B','Lexend-ExtraBold.php');
$pdf->AddFont('Lexend','I','Lexend-Black.php');
$pdf->AddPage();
$pdf->SetFont('Lexend','I',18);
$pdf->Cell(0,10,utf8_decode('Comprobante de Reservación'),0,2,'C');
$pdf->Cell(0,10,utf8_decode($folio),0,2,'C');
$pdf->Ln(5);
$pdf->SetFont('Lexend','I',15);
$pdf->SetTextColor(76,17,48);
$pdf->Cell(0,10,'Datos del Solicitante',0,0,'L'); $pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Nombre(s):',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($nombre),0,0,'L');
$pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Apellido Paterno:',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($appat),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Apellido Materno:',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($apmat),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'CURP:',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($curp),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,utf8_decode('Correo Electrónico:'),0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($correo),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,utf8_decode('Teléfono:'),0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($tel),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Calle:',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($calle),0,0,'L');
$pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,utf8_decode('Número:'),0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($num_ext),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Interior:',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($num_int),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Entidad Federativa:',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($entidad),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Colonia:',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($colonia),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,utf8_decode('CP:'),0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($cp),0,0,'L'); $pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Lexend','I',15);
$pdf->SetTextColor(76,17,48);
$pdf->Cell(0,10,'Datos del Evento',0,0,'L'); $pdf->Ln();
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Lugar:',0,0,'L');
$pdf->Image('img/'.$fotolugar, 125, 208, 60);
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($lugar),0,0,'L');
$pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Fecha:',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($fecha),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Horario:',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($hora),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,utf8_decode('Número de Personas:'),0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($num_personas),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,'Tipo de Evento:',0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($tipo_evento),0,0,'L'); $pdf->Ln();
$pdf->SetFont('Lexend','I',12);
$pdf->Cell(60,10,utf8_decode('Menú:'),0,0,'L');
$pdf->SetFont('Lexend','',12);
$pdf->Cell(50,10,utf8_decode($menu),0,0,'L'); $pdf->Ln();
$pdf->Output();
?>