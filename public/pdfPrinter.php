<?php
require('./fpdf186/fpdf.php');
//Estructura para la clase FODF. Implementación de Header y Footer, ejecutados por página
class PDFExample extends FPDF
{
    //Estructura del header
    function Header()
    {
        //Logo
        $this->Image('https://d1zviajkun9gxg.cloudfront.net/user/prod/2020/01/05/fastpages-892f9602-fc52-42e6-9e81-2ea8f1477f89.png',10,8,33);
        //Declaración de la fuente
        $this->SetFont('Arial','B',15);
        //Desplazamiento del título
        $this->Cell(80);
        //Título
        $this->Cell(30,10,'Title',1,0,'C');
        //Salto de línea
        $this->Ln(20);
    }

    // Estructura del footer
    function Footer()
    {
        //Posicionamiento al final de página del footer
        $this->SetY(-15);
        //Fuente del Footer
        $this->SetFont('Arial','I',8);
        //Contenido del footer (Nº Página)
        $this->Cell(0,10,'Pagina: '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Creación del objeto de la clase heredada con estructura personalizada
$pdf = new PDFExample();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
for($i=1;$i<=35;$i++)
    $pdf->Cell(0,10,'Imprimiendo linea: '.$i,0,1);
$pdf->Output();
?>