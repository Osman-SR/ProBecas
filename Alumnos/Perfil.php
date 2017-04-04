<!doctype html>
<?php
session_start();
if(!$_SESSION){

	header("location: ../index.html");
}

?>	 

<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Perfil</title>
	<link rel="icon" type="image/ico" href="../img/tec-logo.png" />
	<link rel="stylesheet" href="../css/estilo-menu.css"> 
	<link rel="stylesheet" href="../css/estilo-perfil.css">
	<link rel="stylesheet" href="../css/fonts.css">

</head>
<body>
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("beca");
	
	$usuario= $_SESSION['usuario'];
	$sql =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			$nombre = $f['Nombre'];	
			$mensaje =$f['Mensaje'];
			$status= $f['Status'];
			$beca =$f['Beca'];
			
			
	}
	?>	
	
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
	<table class="logb">
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

						<script>
				function sololetras(evt){ 

				evt = (evt) ? evt : event; 
    			var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : 
    			((evt.which) ? evt.which : 0)); 
    			

				if (charCode > 32 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)){ 
        
		        return false; 
						} 
				return true; 

					}
				</script>

				<script >
				function CURP() {
				 var curp=document.forms['formu'].elements['Curp'].value;
     
    				if(curp.match(/^([a-z]{4})([0-9]{6})([a-z]{6})([0-9]{2})$/i))
    			{
    			document.formu.Guardar.disabled=false;
    			}else{
    			alert('Curp Incorrecta!');
    				document.formu.Guardar.disabled=true;
    			 return 0 ;
    			}		
    			}

				</script>

		<div class="tex">	
		<section class="texto">

	<form action="modificar_perfil.php" name="formu" method="post">
	
	<?php
	mysql_connect("localhost","root","");
	mysql_select_db("beca");
	
	$usuario= $_SESSION['usuario'];
	$sql =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f1 = mysql_fetch_array($sql)){		
	
			$nombre = $f1['Nombre'];	
			$apellidop = $f1['Apellidop'];
			$apellidom = $f1['Apellidom'];
			$semestre= $f1['Semestre'];
			$carrera= $f1['Carrera'];
			$email= $f1['Email'];
			$curp= $f1['Curp'];
			$sexo= $f1['Sexo'];
			$beca= $f1['Beca'];
			//$usuario = $f['usuario'];
			$usuario = $f1['Ncontrol'];
			
	}
	?>	
				
										<h2>MIS DATOS PERSONALES</h2>
										
										<table border = 0>
										<tr>
										<input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
										<td><b>No.Control</b></td>
										<td colspan = 3><input type="tex" name="usuario" disabled="disabled" value="<?php echo $f['Ncontrol'] ?>"></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><b>Nombres:</b></td>
										<td colspan = 3><input type="text" name="Nombre"  size = 60 value="<?php echo $f['Nombre'] ?>" onkeypress="return sololetras(event);"  ></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><b>Apellido Paterno:</td>
										<td><input type="text" name="Apellidop"  value="<?php echo $f['Apellidop'] ?>" onkeypress="return sololetras(event);"  >	</td>
										<td><b>Apellido Materno:</td>
										<td><input type="text"  name="Apellidom"  value="<?php echo $f['Apellidom'] ?>" onkeypress="return sololetras(event);" >	</td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><b>Semestre:</td>
										<td> 
										<select name="Semestre" type="se"  class="sem" required>
											<option <?php if($semestre=="1"){echo "selected";} ?> value="1">1°</option>
											<option <?php if($semestre=="2"){echo "selected";} ?> value="2">2°</option>
											<option <?php if($semestre=="3"){echo "selected";} ?> value="3">3°</option>
											<option <?php if($semestre=="4"){echo "selected";} ?> value="4">4°</option>
											<option <?php if($semestre=="5"){echo "selected";} ?> value="5">5°</option>
											<option <?php if($semestre=="6"){echo "selected";} ?> value="6">6°</option>
											<option <?php if($semestre=="7"){echo "selected";} ?> value="7">7°</option>
											<option <?php if($semestre=="8"){echo "selected";} ?> value="8">8°</option>
											<option <?php if($semestre=="9"){echo "selected";} ?> value="9">9°</option>
											<option <?php if($semestre=="10"){echo "selected";} ?> value="10">10°</option>
											<option <?php if($semestre=="11"){echo "selected";} ?> value="11">11°</option>
											<option <?php if($semestre=="12"){echo "selected";} ?> value="12">12°</option>
											<option>Semestre
											</select>
										</td>
										
										<td><b>Carrera:</td>
										<td colspan="2">
										<select name="Carrera" type="se" class="car" >
											<option <?php if($carrera=="ARQUITECTURA"){echo"selected";} ?>value="ARQUITECTURA">ARQUITECTURA</option>
											<option <?php if($carrera=="ISC"){echo "selected";} ?> value="ISC">ISC</option>
											<option <?php if($carrera=="IGEM"){echo "selected";} ?> value="IGEM">IGEM</option>
											<option <?php if($carrera=="TURISMO"){echo "selected";} ?> value="TURISMO">TURISMO</option>
											<option <?php if($carrera=="TICS"){echo "selected";} ?> value="TICS">TICS</option>
											<option <?php if($carrera=="GASTRONOMIA"){echo "selected";} ?> value="GASTRONOMIA">GASTRONOMIA</option>
											<option <?php if($carrera=="ELECTROMECANICA"){echo "selected";} ?> value="ELECTROMECANICA">ELECTROMECANICA</option>
											<option> Carrera 
										</select>
										</td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><b>Email:</td>
										<td colspan = 3><input type="text"  name="Email" size = 60  value="<?php echo $f['Email'] ?>"> </td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><b>Curp:</td>
										<td colspan = 3><input type="text"  name="Curp"  size = 60 value="<?php echo $f['Curp'] ?>" required title="Curp invalida." style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">  </td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><b>Género:</td>
										<td>Masculino<input <?php if($f['Sexo']=="Masculino"){echo "checked";}  ?> type="radio" name="Sexo"  value="Masculino"  ></td>
										<td>Femenino<input <?php if($f['Sexo']=="Femenino"){echo "checked";}  ?> type="radio" name="Sexo"  value="Femenino"  ></td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										<tr>
										<td><b>Tipo de Beca:</td>
										<td colspan = 3>
										<select name="Beca" class="bec" type="se"  required >
											<option <?php if($f['Beca']=="BPP"){echo "selected";} ?> value="BPP">BECA POR PROMEDIO</option>
											<option <?php if($f['Beca']=="BFA"){echo "selected";} ?> value="BFA">BECA FAMILIAR ADMINISTRATIVO</option>
											<option <?php if($f['Beca']=="BE"){echo "selected";} ?> value="BE">BECA ESPECIAL</option>
											<option <?php if($f['Beca']=="BSS" ){echo "selected";} ?> value="BSS">BECA DE SERVICIO SOCIAL</option>
											<option <?php if($f['Beca']=="BHMA"){echo "selected";} ?> value="BHMA">BECA HIJO DE MILITAR ACTIVO</option>
											<option <?php if($f['Beca']=="BFE"){echo "selected";} ?> value="BFE">BECA FAMILIAR EGRESADO</option>
											
											</select>
										</td>
										</tr>
										<tr>
										<td><br></td>
										</tr>
										
										<tr>
										<td colspan="4"><center><input type="submit"  name="Guardar" value="Actualizar" onmouseenter=" return CURP()" /></center></td>
										</tr>
										</table>
										
</form>
</section>
<div class="esp"><p>&nbsp;</p></div>
</div>
<div>



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