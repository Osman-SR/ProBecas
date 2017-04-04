<?php
session_start();
if(!$_SESSION){
	header("location: ../index.html");
}

mysql_connect("localhost","root","");
	mysql_select_db("beca");

	$usuario= $_SESSION['usuario'];

	$sql =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			
			$nombre = $f['Nombre'];	
			$apellidop = $f['Apellidop'];
			$beca= $f['Beca'];
			$mensaje =$f['Mensaje'];
			$status= $f['Status'];
			$usuario = $f['Ncontrol'];
	}


 
$directorio = '../Archivos/'.$beca.'/'.$nombre. " ".$apellidop." ".$usuario . '/';
	
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Archivos</title>
	<link rel="icon" type="image/ico" href="../img/tec-logo.png" />
	<link rel="stylesheet" href="../css/estilo-archivo.css">  
	<link rel="stylesheet" href="../css/estilo-menu.css">
	<link rel="stylesheet" href="../css/fonts.css">
</head>
<body>
	


		<?php
	mysql_connect("localhost","root","");
	mysql_select_db("beca");
	
	$sql =mysql_query("select * from admin ");
	if($f2 = mysql_fetch_array($sql)){		
	
			$Aceptado = $f2['Aceptado'];
			$Rechazado = $f2['Rechazado'];	
			
	}
	?>
<script src="jquery.js" type="text/javascript"></script>
<script src="jquery.ui.draggable.js" type="text/javascript"></script>
<script src="jquery.alerts.js" type="text/javascript"></script>
<link href="jquery.alerts.css" rel="stylesheet" type="text/css" media="screen" />	
<script language="Javascript"> 
function resultado(){
<?php if ($status=="ACEPTADO"): ?>
//alert(" <?php echo $f2['Aceptado'] ?>  ","titulo");
jAlert("<h3><?php echo $f2['Aceptado'] ?></h3>", 'RESULTADO');
<?php endif ?>

<?php if ($status=="RECHAZADO"): ?>
jAlert("<h3><?php echo $f2['Rechazado'] ?></h3>", 'RESULTADO');
<?php endif ?>

<?php if ($status==""): ?>
jAlert("<h3> Solicitud en Proceso </h3>",'RESULTADO');
<?php endif ?>

}
</script>

<script language="Javascript">
function solicitud(){
	<?php
if ($beca=="BFE"){
	?>

	window.location="Solicitud_BFE.php";
	<?php
}elseif ($beca=="BFA") {
	?>
	window.location="Solicitud_BFA.php";

	<?php
}else{
	?>
	window.location="Solicitud.php";
	<?php
}
	?>					

}
</script>

<script language="Javascript">
function men(){
jAlert("<h3><?php echo $mensaje ?></h3>", 'MENSAJE');

//alert(" <?php echo $mensaje ?>   ");
}
</script>
<center>
	<div class="arriba">
	<div class="logos">
	<section class="extra_extra_header">
		    <div class="container">
		        <div class="row">
		            <div class="extra-header-banner col-md-12">
		            	<table>
		            <tr>
		              <td>  <img src="../img/logo-instituciones-sep.png" alt="Secretaría de Educación Pública"> </td>
		                 <td><p><font color="#000">TECNOLÓGICO NACIONAL DE MÉXICO</font></p> </td>
		                <td> <img src="../img/logo-instituciones-jalisco.png"  alt="Jalisco, Gobierno del Estado"> </td>
		                <td> <img src="../img/logo-instituciones-ITS-PTOVALLARTA.png" alt="Tec Vallarta - Instituto Tecnológico Superior"> </td>
		                </tr>
		                </table>
		             </div>
		        </div>
		    </div>
		</section>
	</div>
	<center>
	<table>
	   			<tr>
	   				<td><img src="../img/logo-Tec.jpg"  ></td>
	   				<td><img src="../img/logo.png"height="160" width="250"  ></td>
	   				<td><img src="../img/logo-ITS-header.png"  ></td>
	   				
	   			</tr>
	   		</table>
	</center>
		
	</div>
	</center>

	<header>
		
		<div class ="menu_bar">
		<a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
	</div>
		<nav>
			<ul>
				
				<li ><a href="Inicio.php?Usuario=<?php echo $usuario ?> "><span class="icon-home"></span>Inicio</a></li>	
				
				<li class="submenu">
					<a href="#"><span class="icon-file-text"></span>Tramite<span class="caret icon-circle-down"></span></a>
					<ul class="children">
						<li><a onclick="return solicitud()">Descargar Solicitud </a></li>
						<li><a href="Archivos.php?Usuario=<?php echo $usuario ?>">Subir Archivos</a></li>
						<li><a onclick="return resultado()" href="#?Resultado">Resultado</a></li>
											
					</ul>
				</li>

				<li class="submenu2">
				<a href="#"><span class="icon-user"></span>Alumno: <?php echo $f['Nombre'] ?><span class="caret icon-circle-down"></span></a>
				<ul class="children">
						<li><a href="Perfil.php?Usuario=<?php echo $usuario ?>">Informacion Personal</a></li>
						<li><a href="Password_actual.php?Usuario=<?php echo $usuario ?>">Modificar Contraseña</a></li>
						<li><a onclick="return men()" href="#?Mensaje">Mensaje</a></li>
						<li><a href="cerrar_sesion.php">Cerrar Sesión</a></li>

				</ul>
				</li>
			</ul>
		</nav>
	</header>
	
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("beca");
	
	$usuario= $_SESSION['usuario'];
	$sql =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			$beca= $f['Beca'];
			
			
	}
	$contador= 0;
	
	?>	
	 
		<div class="tex">	
		<section class="texto">
			<form class="formu" action ="validar_archivos.php" method="post" enctype="multipart/form-data">
			<center><h2>SUBIR ARCHIVOS</h2></center> 			
			<h3> <center><?php echo $f['Beca'] ?> </center> </h3>
			<br><h4><b>SOLAMENTE SE PODRA SUBIR DOS ARCHIVOS EN FORMATO PDF.</b></h4>
			
			<div class="doc">
			<br>				
				<?php
				if ($beca=="BPP") {
					echo "<font color=#B22222><b>Primer archivo PDF</b></font>.<br>";
					echo "1.Constancia de calificaciones.<br>";
					echo "<font color=#B22222><b>Segundo archivo PDF.</font></b><br>";
					echo "Solicitud de beca.";
					
				}if ($beca=="BHMA") {
					echo "<font color=#B22222><b>Primer archivo PDF</b></font>.<br>";
					echo "1.Documento que compruebe la vigencia laboral del militar.<br>";
					echo "2.Documento que compruebe que es familiar directo de militar.<br>";
					echo "3.Acta de nacimiento del alumno.<br><br>";
					echo "<font color=#B22222><b>Segundo archivo PDF.</font></b><br>";
					echo "Solicitud de beca.";
									}
				if ($beca=="BFA") {
					echo "<font color=#B22222><b>Primer archivo PDF</b></font>.<br>";
					echo "1.Documento que compruebe que es familiar directo.<br>";
					echo "<font color=#B22222><b>Segundo archivo PDF.</font></b><br>";
					echo "Solicitud de beca.";
					
				}
				if ($beca=="BE") {
					echo "<font color=#B22222><b>Primer archivo PDF</b></font>.<br>";
					echo "1.Archivos especial<br>";
					echo "<font color=#B22222><b>Segundo archivo PDF.</font></b><br>";
					echo "Solicitud de beca.";
					
				}
				if ($beca=="BSS") {
					echo "<font color=#B22222><b>Primer archivo PDF</b></font>.<br>";
					echo "1.Documento que compruebe que esta realiazndo el servicio social.<br>";
					echo "<font color=#B22222><b>Segundo archivo PDF.</font></b><br>";
					echo "Solicitud de beca.";
					
				}
				if ($beca=="BFE") {
					echo "<font color=#B22222><b>Primer archivo PDF</b></font>.<br>";
					echo "1.Carta de solicitud por parte del familiar egresado.<br>";
					echo "2.Copia de la IFE del egresado.<br>";
					echo "3.Copia de la credencial de egresado.<br>";
					echo "4.Documento que compruebe que es familiar directo.<br>";
					echo "<font color=#B22222><b>Segundo archivo PDF.</font></b><br>";
					echo "Solicitud de beca.";
					
				}
			
			?>
			 
			<br><br>
			
			<input type="file" name="archivo"  id="archivo" onmouseenter="desactiva()" /><br>
			<br><input type="submit"  id="btnarchivo" name="subir" value="Subir archivo" onmouseenter="desactiva()"  />
			<br>
			<br>
			<div class="arch">
			<h4>ARCHIVOS EN EL SISTEMA </h4>
			<?php
			
				if ($dir = opendir($directorio)){
					while($archivo = readdir($dir)){
						if($archivo !='.'  && $archivo !='..' ){
							$contador++;
								
 						echo "$contador&nbspArchivo: <strong>$archivo</strong>&nbsp &nbsp<a href='eliminar_archivos.php?archivonombre=$archivo'><font color=#B22222>Eliminar</font></a>";

 						echo "&nbsp &nbsp<a href='$directorio/$archivo'><font color=#B22222>Ver</font></a><br/>";
 						//echo "$contador";

						
						}
					}
						if ($contador==2) {
							echo '<script> alert("ARCHIVO COMPLETOS ESPERA A QUE EL COMITE DE BECAS VALIDE TU INFORMACIÓN");</script>';
						}else{
							echo "";
						}
																
					
					
				}
				
			?>
			</div>
			
				<script type="text/javascript">
				function desactiva(){

	 				if (<?php echo "$contador"; ?> >= 2){
					
					document.getElementById("archivo").disabled = true;	
					document.getElementById("btnarchivo").disabled = true;	
    				//document.formu.archivo.disabled=true;
    				//document.formu.subir.disabled=true;
    				}else{
    				document.formu.archivo.disabled=false;	
    				}
    	    		//alert('<?php echo "$contador"; ?>');
					}
				</script>			
			<br><br>
			<h5><b>Nota: Los archivos que no sean legibles serán tomados como incompleto y esto causara la cancelación de la beca.</b></h5>
			<br></div>
		</form>
		<br>
		</section>
		<div class="esp"><p>&nbsp;</p></div>
		</div>
		
	<footer>
	<p align="center">
	<a href="#">Transparencia &nbsp;&nbsp; | </a> &nbsp;<a href="http://www.tecvallarta.edu.mx/acerca-del-tec/">&nbsp;&nbsp;Acerca del Tec &nbsp;&nbsp;| </a> <a href="http://www.tecvallarta.edu.mx/admision/">&nbsp;&nbsp;Admisión &nbsp;&nbsp; |</a> <a href="http://www.tecvallarta.edu.mx/comunidad-tec/">&nbsp;&nbsp;Comunidad Tec &nbsp;&nbsp; |</a><a href="http://www.tecvallarta.edu.mx/tramites-y-servicios/">&nbsp;&nbsp;Trámites y Servicios &nbsp;&nbsp;|</a></a><a href="#">&nbsp;&nbsp;Academia &nbsp;&nbsp;</a>  
	</p>
<p align="center"><a href="http://www.tecvallarta.edu.mx/aviso-privacidad">Todos los Derechos Reservados ITS de Puerto Vallarta 2012 | Tel. (322) 226 5600 | informes@tecvallarta.edu.mx</a> </p>
	</footer>

<script src="https://code.jquery.com/jquery-latest.js" ></script>
<script src="../css/main.js" ></script>			
</body>
</html>