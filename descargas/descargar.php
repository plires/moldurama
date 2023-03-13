<?php
header("Content-disposition: attachment; filename=catalogo-2023.pdf");
header("Content-type: application/pdf");
readfile("catalogo-2023.pdf");
?>