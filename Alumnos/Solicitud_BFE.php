<?php

header("Content-Type: text/php;charset=utf-8");
header('Content-Type: text/html; charset=UTF-8');

session_start();
if(!$_SESSION){
	header("location: ../index.html");
}

	
	require ('conexion.php');
	mysql_connect("localhost","root","");
	mysql_select_db("beca");
	
	$usuario= $_SESSION['usuario'];
	$sql =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			$id = $f['id_becados'];	
			$nombre = $f['Nombre'];	
			$usuario = $f['Ncontrol'];
			$apellidop = $f['Apellidop'];
			$apellidom = $f['Apellidom'];
			$semestre= $f['Semestre'];
			$carrera= $f['Carrera'];
			$beca= $f['Beca'];
			$tipo_beca="";
			$Porcentaje= $f['Porcentaje'];
			$folio= $f['Folio'];

			$Nota;
			$Nota2;
		


	if ($beca=="BFE") {
	$tipo_beca="BECA FAMILIAR EGRESADO";
	$Nota = 'NOTA: Esta Solicitud queda sujeta a autorización del comité de becas del Instituto y expreso mi confirmidad de que en caso de no presentar la ficha de';
	$Nota2 = 'depósito en ventanilla de control escolar en las fechas establecidas por el Instituto, quedara cancelada esta solicitud de beca.';
		
	
	}

	$sql3 =mysql_query("select * from admin where administrador='ADMINISTRADOR'");
	if($f3 = mysql_fetch_array($sql3)){	
	$periodo = $f3['Periodo'];		
	}
	//sale		
	}
		
	
if (date("F")) {	
		
		if (date("F")=="January") {
		$mes = "Enero";
		}
		if (date("F")=="February") {
		$mes = "Febrero";
		}
		if (date("F")=="March") {
		$mes = "Marzo";
		}
		if (date("F")=="April") {
		$mes = "Abril";
		}
		if (date("F")=="May") {
		$mes = "Mayo";
		}
		if (date("F")=="June") {
		$mes = "Junio";
		}
		if (date("F")=="July") {
		$mes = "Julio";
		}
		if (date("F")=="August") {
		$mes = "Agosto";
		}
		if (date("F")=="September") {
		$mes = "Septiembre";
		}
		if (date("F")=="October") {
		$mes = "Octubre";
		}
		if (date("F")=="November") {
		$mes = "Noviembre";
		}
		if (date("F")=="December") {
		$mes = "Diciembre";
		}
	
	
}


include_once('docpdf.php');




$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Ln(10);
    
    $pdf->Cell(30,25,'',0,0,'C',$pdf->Image('../img/jalisco.png', 80, 9, 50));
    //
    $pdf->Ln(15);
     $pdf->SetFont('Arial','B',10);
    $pdf->Cell(100,0,'                                                                                                                                                        SOLICITUD No .:'.$beca.' - 0'.$folio.'',' L ');$pdf->Ln(4);
    $pdf->SetFont('Arial','',11); 
//
    
   
    //

    $pdf->Cell(100,0,'                                                                                                            Puerto Vallarta, Jal. '.date("d").' de '.$mes.' del '.date("Y").'',' L ');
    $pdf->Ln(4);
    $pdf->Cell(100,0,utf8_decode('                                                                          Asunto: Solicitud de Beca Administrativa, Bonificación del '.$Porcentaje.' en '),' L ');

    $pdf->Cell(100,6,'                                                             cuota semestral.');

	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',10);
    $pdf->Cell(50,10,utf8_decode('COMITÉ DE BECAS DEL ITS DE PUERTO VALLARTA'),0, 10 , ' L ');
    //$pdf->Ln(0);
    $pdf->Cell(50,1,'PRESENTE.  ',0, 10 , ' L ');
 

    $pdf->Ln(4);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(50,15,'                                                  Por este conducto le solicito la Beca Administrativa por ser familiar directo de:',0, 10 , ' L ');
    $pdf->Ln(4);
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(50,-15,'_________________________________________________________________, egresado de este Instituto',0, 10 , ' L ');
    $pdf->Ln(6);
     $pdf->SetFont('Arial','',11);
    $pdf->Cell(50,15,utf8_decode('en la Generación _________  Para la Re-Inscripción al semestre:'),0, 10 , ' L ');
    $pdf->SetFont('Arial','B',11);
    
    //$pdf->Ln(4);
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(50,-15,utf8_decode('                                                                                                              '.$semestre.'  '),0, 10 , ' L ');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(50,15,utf8_decode('                                                                                                                       que comprende del periodo '),0, 10 , ' L ');
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(50,-3,utf8_decode(''.$periodo.' '.date("Y").','),0, 10 , ' L ');
    $pdf->SetFont('Arial','',11);
    $pdf->Cell(50,3,utf8_decode('                                            en virtud de cubrir con los requisitos señalados para esta beca.'),0, 10 , ' L ');
     $pdf->Ln(10);
     $pdf->Cell(50,15,utf8_decode('Sin más, quedo de Usted.'),0, 10 , ' L ');
     $pdf->Ln(10);
     $pdf->SetFont('Arial','B',9);
     $pdf->Cell(50,15,'NOMBRE Y FIRMA:  ',0, 10 , ' L ');
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(50,-15,utf8_decode('                                  '.$nombre.' '.$apellidop.' '.$apellidom.' '),0, 10 );
     $pdf->Ln(5);
     $pdf->SetFont('Arial','B',9);
     $pdf->Cell(50,15,'NO.CONTROL:  ',0, 10 , ' L ');
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(50,-15,'                                  '.$usuario.'  ',0, 10 );
     $pdf->SetFont('Arial','B',9);
     $pdf->Cell(50,15,'                                                           CARRERA:  ',0, 10 );
     $pdf->SetFont('Arial','',10);                         
     $pdf->Cell(50,-15,'                                                                                '.$carrera.'  ',0, 10 );
     $pdf->Ln(15);
     $pdf->SetFont('Arial','B',10);
     $pdf->Cell(50,15,'                                                                                              Vo. Bo.  ',0, 10 , ' L ');
     $pdf->Ln(5);
     $pdf->SetFont('Arial','B',10);
     $pdf->Cell(50,15,utf8_decode('                                                                            Lic. Arlene Crisol López Hernández               '),0, 10 );
     $pdf->Cell(50,-4,utf8_decode('                                               JEFA DE DIVISION DE CONTROL ESCOLAR Y SERVICIOS ESCOLARES  '),0, 10 );
     $pdf->Ln(10);
     $pdf->SetFont('Arial','',8);
      $pdf->Cell(50,15,utf8_decode(''.$Nota.'  '),0, 10 );
     $pdf->Cell(50,-9,utf8_decode(' '.$Nota2.' '),0, 10 );

     $pdf->Ln(73);
     $pdf->SetFont('Arial','',7);
     $pdf->Cell(50,-11,utf8_decode('                                                                                           Corea del sur #600 Col. El Mangal, Puerto Vallarta,Jalisco,México                '),0, 10 );
     $pdf->Cell(50,17,utf8_decode('                                                                                                                Tel. 01(322) 22 6 56 00 - 01 (322) 22 5 12 96               '),0, 10 );
     $pdf->Cell(50,-11,utf8_decode('                                                                                                                                www.tecvallarta.edu.mx               '),0, 10 );
    
     $pdf->Cell(50,-15,'',0,10,'C',$pdf->Image('../img/logo-instituciones-ITS-PTOVALLARTA.png',7,270,195));
    
      $pdf->Cell(30,25,'',0,0,'C',$pdf->Image('../img/logo-instituciones-ITS-PTOVALLARTA.png', 150, 12, 42));
  
      
       
 
        
 
       


 
    $pdf->Output('Solicitud de beca.pdf','I'); //Salida al navegador del pdf

?> 