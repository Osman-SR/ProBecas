

<?php
header("Content-Type: text/php;charset=utf-8");
header('Content-Type: text/html; charset=UTF-8');

session_start();
if(!$_SESSION){

	header("location: ../Index.html");
}

	
	mysql_connect("localhost","root","");
	mysql_select_db("becas");
	
	$usuario= $_SESSION['usuario'];
	$sql =mysql_query("select * from usuarios where usuario='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			$id = $f['id'];	
			$nombre = $f['Nombre'];	
			$usuario = $f['usuario'];
			$apellidop = $f['Apellidop'];
			$apellidom = $f['Apellidom'];
			$semestre= $f['Semestre'];
			$carrera= $f['Carrera'];
			$beca= $f['Beca'];
			$Porcentaje= $f['Porcentaje'];
			if ($beca=="BECA POR PROMEDIO") {
		
	$sql3 =mysql_query("select * from promedio Where usuario='$usuario'");
	if($f3 = mysql_fetch_array($sql3)){	
	$idd= $f3['id'];	
	}
	}
		if ($beca=="BECA FAMILIAR MILITAR ACTIVO") {
		
	$sql3 =mysql_query("select * from militar Where usuario='$usuario'");
	if($f3 = mysql_fetch_array($sql3)){	
	$idd= $f3['id'];	
	}
	}

	if ($beca=="BECA ESPECIAL") {
		
	$sql3 =mysql_query("select * from especial Where usuario='$usuario'");
	if($f3 = mysql_fetch_array($sql3)){	
	$idd= $f3['id'];	
	}
	}

	if ($beca=="BECA FAMILIAR ADMINISTRATIVO") {
		
	$sql3 =mysql_query("select * from administrativo Where usuario='$usuario'");
	if($f3 = mysql_fetch_array($sql3)){	
	$idd= $f3['id'];	
	}
	}

	if ($beca=="BECA DE SERVICIO SOCIAL") {
		
	$sql3 =mysql_query("select * from servicio Where usuario='$usuario'");
	if($f3 = mysql_fetch_array($sql3)){	
	$idd= $f3['id'];	
	}
	}

	if ($beca=="BECA FAMILIAR EGRESADO") {
		
	$sql3 =mysql_query("select * from egresado Where usuario='$usuario'");
	if($f3 = mysql_fetch_array($sql3)){	
	$idd= $f3['id'];	
	}
	}
	//sale		
	}
	$sql2 =mysql_query("select * from folio Where usuario='$usuario' ");
	if($f1 = mysql_fetch_array($sql2)){	
	$folio= $f1['Tipo'];	
		
	
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
		if (date("F")=="Janu") {
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


    		
    		  			
    		
    		
    

//aqui esta lo de pdf
include_once('docpdf.php');

 
    $pdf = new PDF();
    $pdf->AddPage('P', 'Letter'); //Vertical, Carta
    $pdf->SetFont('Arial','',11); //Arial, negrita, 12 puntos
    $pdf->Ln();
    //
    
    $pdf->Ln();
     $pdf->SetFont('Arial','B',10);
    $pdf->Cell(100,0,'                                                                                                                                                        SOLICITUD No .:'.$folio.'-'.$idd.'',' L ');$pdf->Ln(4);
    $pdf->SetFont('Arial','',10); 
//
    
   
    //

    $pdf->Cell(100,0,'                                                                                                                             Puerto Vallarta, Jal. '.date("d").' de '.$mes.' del '.date("Y").'',' L ');
    $pdf->Ln(4);
    $pdf->Cell(100,0,utf8_decode('                                                                                        Asunto: Solicitud de Beca Administrativa, Bonificación del '.$Porcentaje.' en '),' L ');

    $pdf->Cell(100,6,'                                                                    cuota semestral.');
	$pdf->Ln(4);
	$pdf->SetFont('Arial','B',9);
    $pdf->Cell(50,10,utf8_decode('COMITÉ DE BECAS DEL ITS DE PUERTO VALLARTA'),0, 10 , ' L ');
    //$pdf->Ln(0);
    $pdf->Cell(50,1,'PRESENTE.  ',0, 10 , ' L ');
 

    $pdf->Ln(4);
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,15,'                                 Por este conducto le solicito la Beca Administrativa:',0, 10 , ' L ');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50,-15,'                                                                                                                          '.$beca.' ',0, 10 , ' L ');
    $pdf->Ln(6);
     $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,15,'al alumno:          ',0, 10 , ' L ');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(50,-15,utf8_decode('                  '.$nombre.' '.$apellidop.' '.$apellidom.'  '),0, 10 , ' L ');
    $pdf->SetFont('Arial','',10);
    $pdf->Cell(50,15,utf8_decode('                                                                                   Para la Re-Inscripción al semestre: '.$semestre.' que comprende del periodo '),0, 10 , ' L ');
    $pdf->Cell(50,-3,utf8_decode('Febrero- Julio 2016, en virtud de cubrir con los requisitos señalados para esta beca.'),0, 10 , ' L ');
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
     $pdf->Cell(50,15,'                                                                   Carrera:  ',0, 10 );
     $pdf->SetFont('Arial','',10);
     $pdf->Cell(50,-15,'                                                                                '.$carrera.'  ',0, 10 );
     $pdf->Ln(15);
     $pdf->SetFont('Arial','B',10);
     $pdf->Cell(50,15,'                                                                                              Vo. Bo.  ',0, 10 , ' L ');
     $pdf->Ln(5);
     $pdf->SetFont('Arial','B',9);
     $pdf->Cell(50,15,'                                                                    LIC. Arlene Arlene DOMÍNGUEZ MALDONADOU  ',0, 10 );
     $pdf->Cell(50,-4,'                                                     SUBDIRECTOR DE CONTROL ESCOLAR Y SERVICIOS ESCOLARES  ',0, 10 );
     $pdf->Ln(10);
     $pdf->SetFont('Arial','',8);
      $pdf->Cell(50,15,utf8_decode('Esta Solicitud queda sujeta a autorización del comité de becas del Instituto. '),0, 10 );


   
 
    $pdf->Output('Solicitud de beca.pdf','I'); //Salida al navegador del pdf
}
?>