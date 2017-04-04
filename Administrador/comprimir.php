<?php

header("Content-disposition: attachment; filename=Archivos.zip");
header("Content-type: MIME");
readfile("../Descarga/Archivos.zip");

echo '<script> window.location="index.php"; </script>';


?>