 	<?php
  session_start();
if(!$_SESSION){
  header("location: ../index.html");
}
	mysql_connect("localhost","root","");
	mysql_select_db("beca");
	

	$sql ="select * from becados where Carrera='ISC' ";
	$result = mysql_query($sql);
	$resultado = mysql_num_rows($result);
	//echo 'ISC: '.$resultado.'';

	$sql1 ="select * from becados where Carrera='IGEM' ";
	$result1 = mysql_query($sql1);
	$resultado1 = mysql_num_rows($result1);
	

		$sql2 ="select * from becados where Carrera='ELECTROMECANICA' ";
	$result2 = mysql_query($sql2);
	$resultado2 = mysql_num_rows($result2);


	$sql3 ="select * from becados where Carrera='GASTRONOMIA' ";
	$result3 = mysql_query($sql3);
	$resultado3 = mysql_num_rows($result3);

		$sql4 ="select * from becados where Carrera='TICS' ";
	$result4 = mysql_query($sql4);
	$resultado4 = mysql_num_rows($result4);

		$sql5 ="select * from becados where Carrera='TURISMO' ";
	$result5 = mysql_query($sql5);
	$resultado5 = mysql_num_rows($result5);

		$sql6 ="select * from usuarios where Carrera='ARQUITECTURA' ";
	$result6 = mysql_query($sql6);
	$arq = mysql_num_rows($result6);
	
	?>	

	 
<html>
  <head>
  <title>Administrador</title>
  <meta charset="UTF-8">
  <title>Becas Tec Vallarta</title>
  
  <link rel="stylesheet" href="../css/estilo-menu-admin.css">
  <link rel="stylesheet" href="../css/estilo-admin.css">
  <link rel="stylesheet" href="../css/fonts.css">
  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
                     <td><p><font color="#000"> Tecnológico Nacional de México</font></p> </td>
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
      <td>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
      <td><img src="../img/logo-Tec.jpg"  ></td>
      <td>&nbsp;&nbsp;&nbsp;&nbsp;  </td>
      
    </tr>
  </table>
    
  </div>
  
    </center>
   
    <script language="Javascript">
function restaurar(){
 
{
var agree=confirm("ESTAS SEGURO QUE QUIERES RESTAURAR LA BASE DE DATOS.");
if (agree)
  return true ;
else
   return false ;
alert("RESTAURACION CANCELADA");
}

}
</script>
    <script language="Javascript">
function restaurararchivos(){
 
{
var agree=confirm("ESTAS SEGURO QUE QUIERES RESTAURAR LOS ARCHIVOS.");
if (agree)
  return true ;
else
   return false ;
alert("RESTAURACION CANCELADA");
}

}


</script>

<script language="Javascript">
function eli(){
 
{
var agree=confirm("ESTAS SEGURO QUE QUIERES ELIMINAR AL ALUMNO.");
if (agree)
  return true ;
else
   return false ;
alert("ELIMINACION CANCELADA");
}

}


</script>
<script language="Javascript">
function desactivar(){
{
var agree=confirm("ESTAS SEGURO QUE QUIERES DESACTIVAR LA PAGINA.");
if (agree)
  return true ;
else
   return false ;
alert("DESACTIVACION CANCELADA");
}

}
</script>

<script language="Javascript">
function activar(){
{
var agree=confirm("ESTAS SEGURO QUE QUIERES ACTIVAR LA PAGINA.");
if (agree)
  return true ;
else
   return false ;
alert("ACTIVACION CANCELADA");
}

}
</script>



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
            <li><a href="bfa.php">BECA ADMINISTRATIVO</a></li>
            <li><a href="bp.php">BECA PROMEDIO</a></li>
            <li><a href="be.php">BECA ESPECIAL</a></li>
            <li><a href="bss.php">BECA SERVICIO</a></li>
            <li><a href="bhma.php">BECA HIJO MILITAR</a></li>
            <li><a href="bfe.php">BECA EGRESADO</a></li>
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
            <li><a href="./Excel/principal.php" >DESCARGAR EXCEL</a></li>
            <li><a href="descargar_archivos.php?id=Archivos.zip" >DESCARGAR ARCHIVOS</a></li>
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
            <li><a href="cerrar_sesion.php" >CERRAR SESSION</a></li>
          </ul> 
        </li>



      </ul>
    
    </nav>
  
  </header>

  <div class="tex"> 
  <section class="texto">
<center><b><h2>GRAFICA POR TIPO DE CARRERA</h2></b></center>

  <center>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['CARRERAS', 'ALUMNOS'],
  
           ['ARQUITECTURA', <?php echo $arq ?>],
           ['ISC', <?php echo $resultado ?>],
           ['IGEM', <?php echo $resultado1 ?>],
           ['GASTRONOMIA', <?php echo $resultado3 ?>],
           ['ELECTROMECANICA', <?php echo $resultado2 ?>],
           ['TICS', <?php echo $resultado4 ?>],
           ['TURISMO', <?php echo $resultado5 ?>],
      
        ]);

        var options = {
          chart: {
            title: 'GRAFICAS DE CARRERAS',
            subtitle: 'ESTADISTICAS',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 900px; height: 500px;"></div>
  </center>
  </body>
  
  </section>
  <div class="esp"><p>&nbsp;</p></div>
  </div>

  <center>
  <footer>
  <p align="center">
  <a href="http://www.tecvallarta.edu.mx/admision/">Transparencia &nbsp;&nbsp; | </a> &nbsp;<a href="http://www.tecvallarta.edu.mx/acerca-del-tec/">&nbsp;&nbsp;Acerca del Tec &nbsp;&nbsp;| </a> <a href="http://www.tecvallarta.edu.mx/admision/">&nbsp;&nbsp;Admisión &nbsp;&nbsp; |</a> <a href="http://www.tecvallarta.edu.mx/comunidad-tec/">&nbsp;&nbsp;Comunidad Tec &nbsp;&nbsp; |</a><a href="http://www.tecvallarta.edu.mx/tramites-y-formatos/">&nbsp;&nbsp;Trámites y Servicios &nbsp;&nbsp;|</a> 

</p>

<p align="center">Todos los Derechos Reservados ITS de Puerto Vallarta 2012 | Tel. (322) 226 5600 | informes@tecvallarta.edu.mx </p>

  </footer>
  </center>
</html>
