<?php
$NowTime         = date('H:i:s', time());
$NowDate         = date("Y-m-d");
$unaFechaInicio  ="2021-04-01";
$unaFechaFin     ="2021-04-30";
$unaFechaFinal   = date("d-m-Y", strtotime($unaFechaFin));
$unaFechaInicial = date("d-m-Y", strtotime($unaFechaInicio));
$periodo         = "Pruebas para ";//"";
$Año             = date("Y");

if( $unaFechaInicio <= $NowDate )
   if( $NowDate <= $unaFechaFin )
 $periodo = "";
 
$periodo .= "";

return array(
    "FechaInicio" => $unaFechaInicio,
    "FechaFin"    => $unaFechaFin,
    "Periodo"     => $periodo
);
?>