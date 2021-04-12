<?php
function ImprimeAsignacionGid($Campo,$Valor)
{
   return chr(34).$Campo.chr(34).":".chr(34).$Valor.chr(34);
  // return $Campo.":".chr(34).$Valor.chr(34);
}

function ImprimeObjeto ( $sDatosObjeto, $slista )
{
  $listaCampos = explode(",",$slista);
  $numCampos   = count( $listaCampos ) -1 ;
  //for ($k=count($listaCampos)-1, $fila =""; $k>0;  $fila.= ImprimeAsignacionGid($listaCampos[$k], $sDatosObjeto[ $listaCampos[$k] ]).",",$k-- );
  $fila ="";
  for ($k=0; $k<$numCampos;  $fila.= ImprimeAsignacionGid($listaCampos[$k], $sDatosObjeto[ $listaCampos[$k] ]).",",$k++ );

  $fila.= ImprimeAsignacionGid($listaCampos[$numCampos], $sDatosObjeto[ $listaCampos[$numCampos] ]);

  return  "{".$fila."}";
}

function ImprimeRegistros ( $registros, $slista, $forGridJS = true ,$TotalRegistros = null )
{
  $filas       = "";
  $numFilas    = ( $registros != null ) ? count( $registros ) -1 : -1;
  $listaCampos = explode(",",$slista);
  $UltimaFila  = count($listaCampos)-1;

   if ($numFilas > -1)
   {
	     for($i=0, $unafila = ""; $i<$numFilas; $i++, $filas.="{".$unafila."},")
	     {
	      for ($j=0, $unafila = ""; $j<$UltimaFila; $unafila.= ImprimeAsignacionGid($listaCampos[$j],$registros[$i][ $listaCampos[$j] ]).",",$j++ );

	      $unafila.= ImprimeAsignacionGid($listaCampos[$UltimaFila],$registros[$i][ $listaCampos[$UltimaFila] ])."";
	     }

	     for ($j=0, $unafila = ""; $j<$UltimaFila; $unafila.= ImprimeAsignacionGid($listaCampos[$j],$registros[$numFilas][ $listaCampos[$j] ]).",",$j++);

	     $unafila.= ImprimeAsignacionGid($listaCampos[$UltimaFila],$registros[$numFilas][ $listaCampos[$UltimaFila] ]) ."";

	     $filas.="{".$unafila."}";
   }

   if($filas =="1" )
   {
      $numFilas=0;
      for ($j=0 , $unafila = ""; $j<$UltimaFila; $unafila.= ImprimeAsignacionGid($listaCampos[$j],"-----").",", $j++);

	    $unafila.= ImprimeAsignacionGid($listaCampos[$UltimaFila],"-----") ;

      $filas= "{".$unafila."}";
   }

   $Jns="[".$filas."]";

   if( $TotalRegistros != null )  
     $numFilas=$TotalRegistros;
   else
    $numFilas++;
    
    if($forGridJS)
    {
    
     $Jns =     "{data:".$Jns.",";
     $Jns.="itemsCount:".$numFilas."}";
    }

   return  $Jns;
}

function ImprimeRegistrosPaginacion ( $registros, $slista, $forGridJS = true )
{
  $filas       = "";
  $numFilas    = ( $registros != null ) ? count( $registros ) -1 : -1;
  $listaCampos = explode(",",$slista);
  $UltimaFila  = count($listaCampos)-1;

   if ($numFilas > -1)
   {
	     for($i=0, $unafila = ""; $i<$numFilas; $i++, $filas.="{".$unafila."},")
	     {
	      for ($j=0, $unafila = ""; $j<$UltimaFila; $unafila.= ImprimeAsignacionGid($listaCampos[$j],$registros[$i][ $listaCampos[$j] ]).",",$j++ );

	      $unafila.= ImprimeAsignacionGid($listaCampos[$UltimaFila],$registros[$i][ $listaCampos[$UltimaFila] ])."";
	     }

	     for ($j=0, $unafila = ""; $j<$UltimaFila; $unafila.= ImprimeAsignacionGid($listaCampos[$j],$registros[$numFilas][ $listaCampos[$j] ]).",",$j++);

	     $unafila.= ImprimeAsignacionGid($listaCampos[$UltimaFila],$registros[$numFilas][ $listaCampos[$UltimaFila] ]) ."";

	     $filas.="{".$unafila."}";
   }

   if($filas =="1" )
   {
      $numFilas=0;
      for ($j=0 , $unafila = ""; $j<$UltimaFila; $unafila.= ImprimeAsignacionGid($listaCampos[$j],"-----").",", $j++);

	    $unafila.= ImprimeAsignacionGid($listaCampos[$UltimaFila],"-----") ;

      $filas= "{".$unafila."}";
   }

   $Jns="[".$filas."]";

    if($forGridJS)
    {
     $numFilas++;
     $Jns =     "{list:".$Jns.",";
     $Jns.="length:".$numFilas."}";
    }

   return  $Jns;
}

?>