<?php
require('../fpdf/fpdf.php');
class PDF extends FPDF
{
    function Footer(){
        $this->SetY(-25);
        $this->SetFont('Arial','I',7);
        $this->Cell(0,10,'Corea del sur #600 Col. El Mangal, Puerto Vallarta,Jalisco,México','T',0,'C');
        $this->Ln(1);
        $this->Cell(0,13,'Tel. 01(322) 22 6 56 00 - 01 (322) 22 5 12 96','T',0,'C');
        $this->Ln(-1);
        $this->Cell(0,20,'www.tecvallarta.edu.mx','T',0,'C');
        $this->Cell(0,10,'',0,0,'C',$this->Image('../img/logo-instituciones-sep.png',2,265,25));
        $this->Cell(0,10,'',0,0,'C',$this->Image('../img/sep.png',27,265,15));
        $this->Cell(0,10,'',0,0,'C',$this->Image('../img/logo_biene.png',43,265,25));
        $this->Cell(0,10,'',0,0,'C',$this->Image('../img/logo_secretaria.png',68,263,25));
        $this->Cell(0,10,'',0,0,'C',$this->Image('../img/jaltec.png',93,266,16));
        $this->Cell(0,10,'',0,0,'C',$this->Image('../img/cacei.png',110,263,20));
        $this->Cell(0,10,'',0,0,'C',$this->Image('../img/modelo.jpg',133,263,12));
        $this->Cell(0,10,'',0,0,'C',$this->Image('../img/certificacion.png',146,262,14));
        $this->Cell(0,10,'',0,0,'C',$this->Image('../img/logo_red.png',159,262,20));
        $this->Cell(0,10,'',0,0,'C',$this->Image('../img/inova.png',180,265,30));


    }
 
    function Header(){
        //Define tipo de letra a usar, Arial, Negrita, 15
        $this->SetFont('Arial','I',12);
        /* Líneas paralelas
         * Line(x1,y1,x2,y2)
         * El origen es la esquina superior izquierda
         * Cambien los parámetros y chequen las posiciones
         * */
        //$this->Line(10,10,206,10);
        //$this->Line(10,35.5,206,35.5);
        /* Explicaré el primer Cell() (Los siguientes son similares)
         * 30 : de ancho
         * 25 : de alto
         * ' ' : sin texto
         * 0 : sin borde
         * 0 : Lo siguiente en el código va a la derecha (en este caso la segunda celda)
         * 'C' : Texto Centrado
         * $this->Image('images/logo.png', 152,12, 19) Método para insertar imagen
         *     'images/logo.png' : ruta de la imagen
         *         152 : posición X (recordar que el origen es la esquina superior izquierda)
         *         12 : posición Y
         *     19 : Ancho de la imagen <span class="wp-smiley emoji emoji-wordpress" title="(w)">(w)</span>
         *     Nota: Al no especificar el alto de la imagen (h), éste se calcula automáticamente
         * */
        $this->Cell(30,25,'',0,0,'C',$this->Image('../img/jalisco.png', 80,12, 50));
        $this->Cell(30,25,'',0,0,'C',$this->Image('../img/logo-instituciones-ITS-PTOVALLARTA.png', 152,12, 42));

       
        
        
        //Se da un salto de línea de 25
       
    }

 



}
    
?>