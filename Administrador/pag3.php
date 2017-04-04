
<?php
mysql_connect("localhost","root","");
	mysql_select_db("becas");
$resultado = mysql_query("SHOW COLUMNS FROM isc");
if (!$resultado) {
    echo 'No se pudo ejecutar la consulta: ' . mysql_error();
    exit;
}
if (mysql_num_rows($resultado) > 0) {
    while ($fila = mysql_fetch_assoc($resultado)) {
        print_r($fila);
    }
}
?>
