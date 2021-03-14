<?php
require_once("includes/load.php");
echo get_date();



$fecha_actual = date("Y-m-d");
//sumo 1 día
echo "<br>";
echo date("Y-m-d",strtotime($fecha_actual."+ 1 days")); 
//resto 1 día
echo "<br>";
echo date("Y-m-d",strtotime($fecha_actual."- 1 days")); 