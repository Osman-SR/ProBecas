<?php
session_start();
if(!$_SESSION){
	header("location: ../index.html");
}
require ('conexion.php');
	
	
$usuario=$_GET['usuario'];
	

$query="Select * From becados Where Ncontrol='$usuario'";

 $resultado=$mysql->query($query);

 $row=$resultado->fetch_assoc();

$semestre= $row['Semestre'];
$carrera= $row['Carrera'];
$sexo= $row['Sexo'];
$beca= $row['Beca'];
$status= $row['Status'];
$Porcentaje= $row['Porcentaje'];
$usuario= $row['Ncontrol'];

$contador= 0;
?>

<html>
<meta charset="UTF-8">
<head>
	<title>Modificar</title>
	<link rel="icon" type="image/ico" href="../img/tec-logo.png" />
	<link rel="stylesheet" href="../css/estilo-admin.css">
	<link rel="stylesheet" href="../css/estilo-menu-admin.css">
	<link rel="stylesheet" href="../css/fonts.css">
</head>
<body>
<header>
<center>
	<div class="arriba">
	<div class="logos">
	<section class="extra_extra_header">
		    <div class="container">
		        <div class="row">
		            <div class="extra-header-banner col-md-12">
		            	<table class="logotipos">
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
	<table class="logb">
		<tr>
			<td><img src="../img/logo.PNG" height="160" width="250" ></td>
			<td><img src="../img/logo-Tec.jpg"  ></td>
			
		</tr>
	</table>
		
	</div>
	
	  </center>
	
	<div class ="menu_bar">
		<a href="#" class="bt-menu"><span class="icon-menu"></span>Menu</a>
	</div>
		<nav>
			<ul>
				
				<li><a href="index.php"><span class="icon-home"></span>Inicio</a></li>
				<li class="submenu">
					<a href="#"><span class="icon-file-text"></span>Carreras<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="arquitectura.php">ARQUITECTURA</a></li>
						<li><a href="igem.php">IGEM</a></li>
						<li><a href="isc.php">ISC</a></li>
						<li><a href="tics.php">TICS</a></li>
						<li><a href="gastronomia.php">GASTRONOMIA</a></li>
						<li><a href="electro.php">ELECTROMECANICA</a></li>
						<li><a href="turismo.php">TURISMO</a></li>
					</ul>	
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-file-text"></span>Becas<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="arquitectura.php">BECA ADMINISTRATIVO</a></li>
						<li><a href="igem.php">BECA PROMEDIO</a></li>
						<li><a href="isc.php">BECA ESPECIAL</a></li>
						<li><a href="tics.php">BECA SERVICIO</a></li>
						<li><a href="gastronomia.php">BECA HIJO MILITAR</a></li>
						<li><a href="electr.php">BECA EGRESADO</a></li>
					</ul>	
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-file-text"></span>Status<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="aceptado.php">ACEPTADOS</a></li>
						<li><a href="rechazado.php">RECHAZADOS</a></li>
					</ul>	
				</li>
				<li class="submenu">
					<a href="#"><span class="icon-cog"></span>Graficas<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="gbecas.php">BECAS</a></li>
						<li><a href="gcarreras.php">CARRERAS</a></li>
						<li><a href="gsexo.php">SEXO</a></li>

					</ul>	
				</li>

					<li class="submenu">
					<a href="#"><span class="icon-cog"></span>Configuracion<span class="caret icon-circle-down"></a>
					<ul class="children">
						
						
						<li><a  href="descargar_archivos.php?id=Archivos.zip" >DESCARGAR ARCHIVOS</a></li>
						<li><a onclick="return restaurar()" href="restaurar.php" >RESTAURAR BASE DE DATOS</a></li>
						<li><a onclick="return restaurararchivos()" href="restaurar_archivos.php" >RESTAURAR ARCHIVOS</a></li>
						
					</ul>	
				</li>

				<li class="submenu">
					<a href="#"><span class="icon-user"></span>Administrador<span class="caret icon-circle-down"></a>
					<ul class="children">
						<li><a href="../img/MANUAL-A.pdf">MANUAL</a></li>
						<li><a href="cuenta.php">CUENTA</a></li>
						<li><a href="Password_actual.php">ACTUALIZAR CONTRASEÑA</a></li>
						<li><a href="cerrar_sesion.php" >CERRAR SESSIÓN</a></li>
					</ul>	
				</li>	
			
			
			</ul>
		
		</nav>
	
	</header>
	<!-- archivos-->
		<?php
		mysql_connect("localhost","root","");
		mysql_select_db("beca");
		$sql =mysql_query("select * from becados where Ncontrol='$usuario' ");
	if($f = mysql_fetch_array($sql)){		
	
			
			$nombre = $f['Nombre'];	
			$apellidop = $f['Apellidop'];
			$beca= $f['Beca'];
			$usuario = $f['Ncontrol'];
	}

$arc='f';
 
$directorio = '../Archivos/'.$beca.'/'.$nombre. " ".$apellidop." ".$usuario . '/';

		
			
				if ($dir = opendir($directorio)){
					while($archivo = readdir($dir)){
						if($archivo !='.'  && $archivo !='..' ){
							$contador++;
								
 												
						}
					}
					if ($contador==2) {

							$arc="Completos";
						}else{
							 $arc="Incompletos";
						}
																						
					
				}
				
			?>

	<!---->


<div class="tex">	
	<section class="texto">

<form name="modificar_usuario" method="post" action="mod_usuario.php">
<center>
<table >
<center><h2>MODIFICAR ALUMNOS</h2></center>

	<tr>
		<td><label>No.Control:</label></td>
		<td colspan="3"><input type="tex" name="usuario" size="15" value="<?php echo $row['Ncontrol']; ?>" disabled="disabled" /> </td>
		</tr>
		<tr>
	<td><br></td>
	</tr>
		<tr>
	<tr>
		<input type="hidden" name="usuario" value="<?php echo $usuario; ?>">
		<td><label>Nombres:</label></td>
		<td colspan="3"><input type="text" name="Nombre" size="50" value="<?php echo $row['Nombre']; ?>"  > </td>	
	</tr>

	<tr>
	<td><br></td> 
	</tr>

	<tr>
		<td><label>Apellido Paterno:</label></td>
		<td colspan="3"><input type="text" name="Apellidop" size="30" value="<?php echo $row['Apellidop']; ?>"  > </td>
	</tr>
	<tr>
	<td><br></td> 
	</tr>
	<tr>	
	
		<td><label>Apellido Materno:</label></td>
		<td colspan="3"><input type="text" name="Apellidom" size="30" value="<?php echo $row['Apellidom']; ?>"/> </td>	
	</tr>

	<tr>
	<td><br></td>
	</tr>

	<tr>
		
			<td><label>Carrera:</label></td>
		<td colspan="3"><select name="Carrera" >
											<option <?php if($carrera=="ARQUITECTURA"){echo"selected";}?> value="ARQUITECTURA">ARQUITECTURA</option>
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

		<td><label>Semestre:</label></td>
		
		<td colspan="3"><select name="Semestre"  >
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
											<option>Semestre
											</select></td>	
	
		
	</tr>

	<tr>
	<td><br></td>
	</tr>

	<tr>
		<td><label> Email:</label></td>
		<td colspan="3"><input type="text" name="Email"  value="<?php echo $row['Email']; ?>"/> </td>	
	</tr>

	<tr>
	<td><br></td>
	</tr>

	<tr>
		<td><label>Curp:</label></td>
		<td colspan="3"><input type="text" name="Curp" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();" value="<?php echo $row['Curp']; ?>"/> </td>	
	</tr>

	<tr>
	<td><br></td>
	</tr>

	<tr>
		<td><label>Tipo de Beca:</label></td>
		<td colspan="3"><select name="Beca"  >

											<option <?php if($beca=="BPP"){echo "selected";} ?> value="BPP">BECA POR PROMEDIO</option>
											<option <?php if($beca=="BFA"){echo "selected";} ?> value="BFA">BECA FAMILIAR ADMINISTRATIVO</option>
											<option <?php if($beca=="BE"){echo "selected";} ?> value="BE">BECA ESPECIAL</option>
											<option <?php if($beca=="BSS" ){echo "selected";} ?> value="BSS">BECA DE SERVICIO SOCIAL</option>
											<option <?php if($beca=="BHMA"){echo "selected";} ?> value="BHMA">BECA HIJO DE MILITAR ACTIVO</option>
											<option <?php if($beca=="BFE"){echo "selected";} ?> value="BFE">BECA FAMILIAR EGRESADO</option>
											</select></td>

	</tr>										
	<tr>
	<td><br></td> 
	</tr>
	<tr>
		<td><label>Género:</label></td>
		<td><select name="Sexo"  >
											<option <?php if($sexo=="Masculino"){echo "selected";} ?> value="Masculino">Masculino</option>
											<option <?php if($sexo=="Femenino"){echo "selected";} ?> value="Femenino">Femenino</option>
											<option>Sexo
											</select> </td>	
										
			
			
	</tr>

	<tr>
	<td><br></td>
	</tr>
	
	<tr>
		<td><label>Status:</label></td>
		<td colspan="3"><select name="Status"  >
											<option value="" selected>Status
											<option <?php if($status=="ACEPTADO"){echo "selected";} ?> value="ACEPTADO">Aceptado</option>
											<option <?php if($status=="RECHAZADO"){echo "selected";} ?> value="RECHAZADO">Rechazado</option>
											</select></td>

	</tr>
	<tr>
	<td><br></td>
	</tr>
	<tr>
	<td><label>Porcentaje:</label></td>
	<td colspan="3"><input type="text" name="Porcentaje" size="15" value="<?php echo $row['Porcentaje']; ?>"> </td>
	</tr>
	<tr>
	<td><br></td>
	</tr>
	<tr>
	<td><label>Archivos:</label></td>
	<td colspan="3"><input type="tex" name="archivos" size="15" value="<?php  echo $arc ?>" disabled="disabled" > </td>
	</tr>
	<tr>
	<td><br></td>
	</tr>
	<tr>
	<td><label>Mensaje:</label></td>
	<td><textarea name="Mensaje" cols="50" > <?php echo $row['Mensaje']; ?></textarea></td>
	</tr>
	<tr>
	<td><br></td>
	</tr>
	<tr>
		<td colspan="4"><center><input type="submit" name="submit" value="Guardar"></center></td>
	</tr>
</table></center>
	
</form>
</section>
<div class="esp"><p>&nbsp;</p></div>
</div>

	<center>
	<footer>
	<p align="center">
	<a href="#">Transparencia &nbsp;&nbsp; | </a> &nbsp;<a href="http://www.tecvallarta.edu.mx/acerca-del-tec/">&nbsp;&nbsp;Acerca del Tec &nbsp;&nbsp;| </a> <a href="http://www.tecvallarta.edu.mx/admision/">&nbsp;&nbsp;Admisión &nbsp;&nbsp; |</a> <a href="http://www.tecvallarta.edu.mx/comunidad-tec/">&nbsp;&nbsp;Comunidad Tec &nbsp;&nbsp; |</a><a href="http://www.tecvallarta.edu.mx/tramites-y-servicios/">&nbsp;&nbsp;Trámites y Servicios &nbsp;&nbsp;|</a></a><a href="#">&nbsp;&nbsp;Academia &nbsp;&nbsp;</a>  
	</p>
<p align="center"><a href="http://www.tecvallarta.edu.mx/aviso-privacidad">Todos los Derechos Reservados ITS de Puerto Vallarta 2012 | Tel. (322) 226 5600 | informes@tecvallarta.edu.mx</a> </p>
	</footer>
	</center>

</body>
</html>

