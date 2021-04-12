<?php
/******************************************************** Funciones para generar controles en formularios *********************************************/
/*
 * su objetivo es optimizar el despliegue de controles en la interfaz gráfica
 *
/******************************************************************************************************************************************************/

/* ============================================================================= */
/* funcion que Genera un input tipo Texto con el valor del campo buscado*/
/* ============================================================================= */
 function GeneraCampoTexto($nombre,$tvalor) {

	$sTexto = " <input class='editbox_search' type='text'  id='editbox_search' name='$nombre' title='valor a buscar'  value=".chr(34).$tvalor.chr(34)." /> ";
	return $sTexto;
}

/* ============================================================================= */
/* funcion que Genera un input tipo Boton */ 
/* ============================================================================= */
 function GeneraBoton($sUnNombre,$sUnCaption,$sunvalor=0) {

	$sBoton = "";
	$sBoton .= " <input type='submit' ";
	$sBoton .= " id='".$sUnNombre."'  name='".$sUnNombre."'  ";
	$sBoton .= " value=".chr(34).$sUnCaption.chr(34)." tag=".chr(34).$sunvalor.chr(34)." ";
	$sBoton .= "  /> ";
	return $sBoton;


}

/* ============================================================================= *\
 * funcion que Genera un RadioBoton *
       $nombre: Nombre del campo
       $tvalor: Valor del Campo
 $bSelecionado: Si se encuentra selecionado o no, por omion no.

\* ============================================================================= */
 function GeneraCampoRadioBoton($nombre,$tvalor, $bSelecionado = false, $funcionOnClick ="", $id = "") {

  $sSelect = $bSelecionado ? 'checked' : '';

  $sonclick = ($funcionOnClick != "") ? " onclick='".$funcionOnClick."();"."' " : '';

  $sId  = "";
  if( $id == "" )
  $sId  .= " id  = ".chr(34).$nombre.chr(34)." ";
  else
  $sId  .= " id  = ".chr(34).$id .chr(34)." ";

  $sTexto = "";
	$sTexto .= " <input type='radio' ";
	//$sTexto .= " id  = ".chr(34).$nombre.chr(34)." ";
	$sTexto .= $sId ;
	$sTexto .= " name  = ".chr(34).$nombre.chr(34)." ";
	$sTexto .= " value = ".chr(34).$tvalor.chr(34)." ";
	$sTexto .= " ".$sonclick." ";
	$sTexto .= " ".$sSelect." ";
	$sTexto .= " />";

	return $sTexto;

}

/* ============================================================================= *\
 * funcion que Genera un RadioBoton *
       $nombre: Nombre del campo
       $tvalor: Valor del Campo
 $bSelecionado: Si se encuentra selecionado o no, por omion no.

\* ============================================================================= */
 function GeneraCampoCheckBox($nombre,$tvalor, $bSelecionado = false) {


  $sSelect = $bSelecionado ? 'checked' : '';
            //<input type="checkbox" name="checkbox11" id="checkbox11" />
	$sTexto = " <input type='checkbox' name=".chr(34).$nombre.chr(34)." "."id=".chr(34).$nombre.chr(34)." value=".chr(34).$tvalor.chr(34)." ".$sSelect." />";

	return $sTexto;

}

function GeneraCampoCheckBoxConEtiqueta($nombre,$tvalor, $bSelecionado = false,$etiquetaCheckBox = "") {


  $sSelect = $bSelecionado ? 'checked' : '';
            //<input type="checkbox" name="checkbox11" id="checkbox11" />
	$sTexto = " <input type='checkbox' name=".chr(34).$nombre.chr(34)." "."id=".chr(34).$nombre.chr(34)." value=".chr(34).$tvalor.chr(34)." ".$sSelect." />";

	if( $etiquetaCheckBox != "" )
	$sTexto .= "<label>".$etiquetaCheckBox." </label>";

	return $sTexto;

}


function GeneraCampoCheckBoxConEtiquetayFuncion($nombre,$tvalor, $bSelecionado = false,$etiquetaCheckBox = "", $funcionCheckBox = "") {


  $sSelect = $bSelecionado ? 'checked' : '';
  $sonclick = ($funcionCheckBox != "") ? " onclick='".$funcionCheckBox."();"."' " : '';

            //<input type="checkbox" name="checkbox11" id="checkbox11" />
	$sTexto  = "";
	$sTexto .=" <input type='checkbox' ";
	$sTexto .=" name=".chr(34).$nombre.chr(34)." ";
	$sTexto .=" id=".chr(34).$nombre.chr(34)." ";
	$sTexto .=" ".$sonclick." ";
	$sTexto .=" value=".chr(34).$tvalor.chr(34)." ";
	$sTexto .=" ".$sSelect." ";
	$sTexto .=" />";

	if( $etiquetaCheckBox != "" )
	$sTexto .= "<label>".$etiquetaCheckBox." </label>";

	return $sTexto;

}

function GeneraCampoHidden($nombre,$tvalor) {

  $sTexto = "";
	$sTexto .= "<input type=".chr(34)."hidden".chr(34)." ";
	$sTexto .= " name=".chr(34).$nombre.chr(34)." ";
	$sTexto .= " id=".chr(34).$nombre.chr(34)." ";
	$sTexto .= " value=".chr(34).$tvalor.chr(34)." >";

	return $sTexto;

}
//
/* ============================================================================= *\
 * funcion que Genera un TextoABool *
       $ValorTexto: Valor para convertir a boolean

        Rergesa true como boolean si resive la cadena VERDADERO o la cadena true

\* ============================================================================= */
 function TextoABool($ValorTexto) {

  return strtoupper ( $ValorTexto ) ==  strtoupper ("VERDADERO")  ? true : strtoupper ( $ValorTexto ) ==  strtoupper ("true")  ? true : strtoupper ( $ValorTexto ) ==  strtoupper ("si")  ? true : $ValorTexto  == "1"  ? true : $ValorTexto  == 1  ? true: false;

}

/* ============================================================================= *\
 * funcion que Genera un TextoABool *
       $ValorTexto: Valor para convertir a boolean

        Rergesa true como boolean si la cadena $ValorVerdadero , es igual al
                valor de la cadena $ValorTexto a evaluar.
\* ============================================================================= */
 function EvaluaTextoABoolPHP($ValorTexto, $ValorVerdadero = "") {

  return strtoupper ( $ValorTexto ) ==  strtoupper ($ValorVerdadero)  ? true :  false;

}

/* ============================================================================= *\
 * funcion que Genera un TextoABool *
       $ValorTexto: Valor para convertir a boolean

        Rergesa true como boolean si la cadena $ValorVerdadero , es igual al
                valor de la cadena $ValorTexto a evaluar.
\* ============================================================================= */
 function EvaluaTextoABoolMysql($ValorTexto, $ValorVerdadero = "") {

  return (strtoupper ( $ValorTexto ) ==  strtoupper ($ValorVerdadero)  ? 1 :  0 );

}


 function EvaluaTextoABoolMysqlFromArray(&$elArray, $NombresValiables,  $ValoresVerdadero, $separadorArreglo="|") {

   $Nombres=array();
   $ValorVerdadero=array();

   $Nombres          = explode($separadorArreglo,$NombresValiables);
   $ValoresVerdadero = explode($separadorArreglo,$ValoresVerdadero);

  $arrlength = count($Nombres);

  for($x = 0; $x < $arrlength; $x++)
   $elArray[$Nombres[$x]] = EvaluaTextoABoolMysql($elArray[$Nombres[$x]], $ValoresVerdadero[$x] );

}


function EvaluaBoolMysqlFromArray(&$elArray, $NombresValiables,  $ValoresVerdadero, $separadorArreglo="|") {

   $Nombres=array();
   $ValorVerdadero=array();

   $Nombres          = explode($separadorArreglo,$NombresValiables);
   $ValoresVerdadero = explode($separadorArreglo,$ValoresVerdadero);

  $arrlength = count($Nombres);

  for($x = 0; $x < $arrlength; $x++)
   $elArray[$Nombres[$x]] = TextoABool($elArray[$Nombres[$x]], $ValoresVerdadero[$x] );

}

function AsignaBoolMysqlToArrayText(&$elArray, $NombresValiables,  $BoolMysql = true, $separadorArreglo="|") {

   $Nombres=array();
   $ValorVerdadero=array();

   $Nombres          = explode($separadorArreglo,$NombresValiables);


  $arrlength = count($Nombres);

  for($x = 0; $x < $arrlength; $x++)
   $elArray[$Nombres[$x]] = $BoolMysql  ? 1 :  0  ;

}

/* ============================================================================= *\
 * funcion que Genera un TextoABool *
       $ValorTexto: Valor para convertir a boolean

        Rergesa true como boolean si resive la cadena VERDADERO o la cadena true

\* ============================================================================= */
 function NiegaUnBool($ValorBoolANegar) {

  return $ValorBoolANegar ?  false : true ;

}

/* ============================================================================= *\
  GetArrayFromSession
                      Recupera las variables de session de un  y las pasa a un arreglo

  $sListaVariables cadena que contiene los nombres de las variables a rescatar de
                  del arreglo $_SESSION (Nombre de las variables de session )
  $sSeparador      Separador del arreglo anterior
  $ImpValores      Si se imprimen o no los valores, mientras son  rescatados
\* ============================================================================= */
 function GetArrayFromSession($sListaVariables, $sSeparador = "|", $ImpValores = false ) {

    $sDatosARegresar=array();

   $sDatos = explode($sSeparador,$sListaVariables);

   foreach( $sDatos as $key => $value) {
		       if( $ImpValores ) {echo " ".$sDatos [$key]." ".$value."<br>";}
			     $sDatosARegresar[$sDatos[$key]] = $_SESSION [$value];
		     }

	return $sDatosARegresar;

}

/* ============================================================================= *\
  InitTheArray
                 Inicializa un arreglo con el valor que se le de.

  $sListaVariables cadena que contiene los nombres de las variables a rescatar de
                  del arreglo $_SESSION (Nombre de las variables de session )
  $sSeparador      Separador del arreglo anterior
  $SValorParaTodos   El valor que tendran todos los elementos del arreglo
\* ============================================================================= */
 function InitTheArray($sListaVariables, $sSeparador = "|", $SValorParaTodos = "" , $ImpValores = false  ) {

   $sDatosARegresar=array();

   $sDatos = explode($sSeparador,$sListaVariables);

   foreach( $sDatos as $key => $value) {
		       //if( $ImpValores ) {echo " ".$sDatos [$key]." ".$value."<br>";}
			     $sDatosARegresar[$sDatos[$key]] = $SValorParaTodos;
		     }

	return $sDatosARegresar;

}

/* ============================================================================= *\
  InitTheArray
                 Inicializa un arreglo con el valor que se le de.

  $sListaVariables cadena que contiene los nombres de las variables a rescatar de
                  del arreglo $_SESSION (Nombre de las variables de session )
  $sSeparador      Separador del arreglo anterior
  $SValorParaTodos   El valor que tendran todos los elementos del arreglo
\* ============================================================================= */
 function SetTheArrayInSession($sArraydeDatos) {

    foreach( $sArraydeDatos as $key => $value) {
		  $_SESSION [$key] = $value;
		}

}


/* =============================================================================
 *  Funcion: Genera una control tipo Select
 *           Recibe:
           1.-$NombreSelect: Cadena, El nombre del control
					 2.-$Selecionado: cadena, El elemento selecionado
					 3.-$opciones:  arreglo, La lista de las opciones a desplegar
 *
 *=============================================================================
*/
function ImprimeSelectDesdeArray($NombreSelect, $Selecionado,$opciones, $EventoYFuncionJavaScrip ="", $funcionChange =""){

	//if($funcionChange !="")

	$selecHeader = "";
	$selecHeader.="<select ";
	$selecHeader.="  id='".$NombreSelect."' name='".$NombreSelect."' ";


	/*if($onBlur !="")
	$selecHeader.=" onBlur=".chr(34)."foco('".$onBlur."')".chr(34)." ";*/
	if( $EventoYFuncionJavaScrip !="" ) {
	   //onkeydown="javascript:keyDown(event,'<php echo $NomModelo;>');"
	  $selecHeader.=$EventoYFuncionJavaScrip;
	}


	if($funcionChange !="")
	{
	 	$funcionChange=chr(34).$funcionChange.chr(34);

	  $selecHeader.=" onChange=".$funcionChange." ";
	}

	$selecHeader.=" >";

	$selecFoother= "</select>";

	//Le agregamos la opcion de seleccion al campo selecionado
	$Selecionado=trim($Selecionado);
	//$Selecionado=replace($Selecionado, " ","");
	// Valores nulos
	if ( $Selecionado == "0" )
	  $Selecionado = "";

	if ( $Selecionado != ""  ) {  $opciones[strtoupper ( $Selecionado)]["valor"].=" selected=".chr(39)."selected".chr(39).""; }


	$selecFilas="";
	foreach($opciones as $opcion) {
		$selecFilas.= " <option value=".$opcion["valor"]." > ".$opcion["etiqueta"]." </option>";
	}

	//arma select completo
	$selec = "";
	$selec.= $selecHeader;
	$selec.= $selecFilas;
	$selec.= $selecFoother;

    return $selec;


}


function PreparaArrayParaSelect($NombresSelect, $ValoresSelect, $sSeparador = "|"){

/*
$opciones = array(
    "sNombre"   => array("valor"=>chr(34)."sNombre".chr(34),   "etiqueta"=>" Nombre "),
    "sEquipo"   => array("valor"=>chr(34)."sEquipo".chr(34),   "etiqueta"=>" Equipo "),
    "sLogin"    => array("valor"=>chr(34)."sLogin".chr(34),    "etiqueta"=>" Login "),
    "h_Entrada" => array("valor"=>chr(34)."h_Entrada".chr(34), "etiqueta"=>" Hora de Entrada "),
    "h_Salida"  => array("valor"=>chr(34)."h_Salida".chr(34),  "etiqueta"=>" Hora de Salida ")
				         );

*/
  $opciones = array( );
  $Nombres = explode($sSeparador,$NombresSelect);
  $Valores = explode($sSeparador,$ValoresSelect);


   foreach( $Nombres as $key => $value ) {
		       //if( $ImpValores ) {echo " ".$sDatos [$key]." ".$value."<br>";}
			     //$sDatosARegresar[$sDatos[$key]] = $SValorParaTodos;

		      // $opciones [ $value]   = array("valor"=>chr(34).$value.chr(34),   "etiqueta"=>chr(34)." ".$value." ".chr(34));
		       $opciones [strtoupper ($value)]   = array("valor"=>chr(34).$value.chr(34),   "etiqueta"=>" ".$value." ");
		     }

 return $opciones;


}

function ImpFuncionJavaTab( $NombreSiguienteTab ){

 $FuncionTab = "";
 $FuncionTab .= " onkeydown=".chr(34)."javascript:keyDown(event,'".$NombreSiguienteTab."' );".chr(34)." ";

 return $FuncionTab;


}



/* ============================================================================= */
/* funcion que Genera un Boton para agregar a la BD*/
/* ============================================================================= */
function generaBotonAgregar($liga1,$liga2){
   $text= "";
   $text = $text .  "<table border=".chr(34)."0".chr(34)." align='left' cellpadding=".chr(34)."0".chr(34)." cellspacing=".chr(34)."1".chr(34)." >".chr(13).chr(13);
   $text = $text .  "<tr >".chr(13);
   $text = $text .  "<td><label>".chr(13).chr(13);
   $ligaIni="<a href='".$liga1."' >";
   $ligaFin="</a>";
   $text = $ligaIni."<img src='".$liga2."' title='NUEVO' border='0'>".$ligaFin;
   $text = $text .  "</label>".chr(13).chr(13);
   $text = $text .  " </td> ".chr(13);
   $text = $text .  "</tr>  ".chr(13);
   $text = $text .  "  </table>".chr(13);
   return  $text;

}
 /******************************************************************************************************************************************************/
?>
<?php
/************************************************* Funciones para listar registros en tablas dinámicas  ************************************************/
/*
 * su objetivo es optimizar el despliegue de tablas en la interfaz gráfica
 *
/******************************************************************************************************************************************************/
/* ........................................................................................................
      Funcion de devolver si un numero es par o non.
*/
function es_Par_Non($valor,$filaColorPar, $filaColorImPar) {
  $Xrt=$valor;
  $ParNon=($Xrt%2);
  if ($ParNon==1) {
    $colorFila=$filaColorImPar; //NON
  } else {
    $colorFila=$filaColorPar;   //PAR
  }
  return $colorFila;
}

 /* ........................................................................................................
/* ============================================================================= */
/* funcion que muestra una lista de datos en una tabla expandible                */
/* ============================================================================= */
function ImprimeTablaJExpand( $registros , $camposHeader, $camposBD, $pagEd, $pagDel, $pagF="")
{

	 $rowHeader = "";
	 $tablaInicio="";

	 $tablaInicio="<table id=".chr(34)."report".chr(34).">";
	 $tablaInicio.="<tr > ";
	 $tablaInicio.="<th >Num</th> ";

	for ($j=1; $j<count($camposHeader); $j++){
		$rowHeader.=  " <th>".$camposHeader[$j]."</th> ";
	 }
	 $rowHeader.= " <th>Detalles</th>";

	 $tablaInicio.= $rowHeader." </tr>";

     //Rows
     $filas= "";
     $numRegistro = "1";
	 $numFilas = count($registros);

	 if ($numFilas > -1) {
	      if ( count($registros) > 0 ) {
	  		if ( count($camposBD) > 0 ) {
			   for($i=0; $i<$numFilas; $i++) {

				 $numRegistro = $i + 1;
				 $fila  = "";
				 $fila .= " <tr>";
				 $fila .= " <td> ".$numRegistro ."  </td> ";

				 for ($j=1; $j<count($camposBD); $j++){
					 $fila .= " <td> ".$registros[$i][ $camposBD[$j] ]."</td> ";
					 $ligaIni1="<a href='".$pagEd."?ID=".$registros[$i][ $camposBD[0] ]."' >";
					 $ligaIni2="<a href='".$pagDel."?valor=".$registros[$i][ $camposBD[0] ]."&action=delete' onclick='return confirmDel();'>";
					 $ligaIni3="<a href='".$pagF."?ID=".$registros[$i][ $camposBD[0] ]."' >";

				 }

				 $ligaFin="</a>";
				 $fila .= " <td> <div class=".chr(34)."arrow".chr(34)."></div> </td> ";
				 $fila .= " </tr>";

				 $fila .= " <tr>";
				 $fila .= " <td colspan='2'>";
				 $fila .= " <img src='".rutaimagenes('images').$numRegistro.".jpg"."' width=".chr(34)."125".chr(34)." height=".chr(34)."85".chr(34).">";
				 $fila .= " </td> ";
				 $fila .= " <td colspan='".(count($camposBD)-4)."'>";
				 $fila .= " <h4>Documentos</h4> ";
				 $fila .= " <ul>";
                 $fila .= "   <li><a href=".chr(34)."#".chr(34)." >Origen en original</a></li>";
                 $fila .= "   <li><a href=".chr(34)."#".chr(34)." >Origen en copia</a></li>";
                 $fila .= "   <li><a href=".chr(34)."#".chr(34)." >Intermedia en original</a></li>";
                 $fila .= " </ul> ";
				 $fila .= " </td> ";
				/* $fila .= " <td> ";
				 $fila .=  $ligaIni3." <img src='".rutaimagenes('images')."folder.png"."' title='REGISTRO DE DOCUMENTOS' width=".chr(34)."48".chr(34)." height=".chr(34)."48".chr(34).">".$ligaFin;
				 $fila .= " </td> ";	*/
				 $fila .= " <td>". $ligaIni1."<img src='".rutaimagenes('images')."car_edit.png"."' title='EDITAR DATOS' border='0'  width=".chr(34)."48".chr(34)." height=".chr(34)."48".chr(34).">".$ligaFin."</td>";
				 $fila .= " <td>". $ligaIni2."<img src='".rutaimagenes('images')."car_delete.png"."' alt='ELIMINAR' title='ELIMINAR' border='0' width=".chr(34)."48".chr(34)." height=".chr(34)."48".chr(34).">".$ligaFin."</td>";
				 $fila .= " <td>  </td> ";
				 $fila .= " </tr>";
				 $filas.=$fila;

			   } //fin for
       		}  //fin if 3
         }//fin if 2
	}//fin if 1

    if($filas == "" )
    {

		 $fila  = "";
		 $fila .= " <tr >";
		 $fila .= " <td></td> ";

         if ( count($camposBD) > 0 ){
             for ($j=0; $j<count($camposBD); $j++){
		         $fila .= " <td> "." Sin Coincidencias "."</td> ";
			 }
		     $fila .= " <td colspan='3'> --- </td> ";
		 }
		 $fila .= " </tr>";
         $filas.=$fila;
    }


    $tablaFin="</table> <br />";

    return $tablaInicio.$filas.$tablaFin;

 }

/*******
 $ligaIni4="<a href='".rutaimagenes('vistas')."asientos.php?ID=".$registros[$i][ $camposBD[0] ]."' >";
					 $ligaIni5="<a href='".rutaimagenes('vistas')."creditos.php?ID=".$registros[$i][ $camposBD[0] ]."' >";
					 $ligaIni6="<a href='".rutaimagenes('vistas')."edoCuenta.php?ID=".$registros[$i][ $camposBD[0] ]."' >";
$fila .= " <td> ";
				  $fila .=  $ligaIni4." <img src='".rutaimagenes('images')."gastos.png"."' alt='GASTOS' title='GASTOS' width=".chr(34)."48".chr(34)." height=".chr(34)."48".chr(34).">".$ligaFin;
				 $fila .= " </td> ";
				 	 $fila .= " <td> ";
				  $fila .=  $ligaIni5." <img src='".rutaimagenes('images')."creditcards.png"."' alt='CREDITOS' title='CREDITOS' width=".chr(34)."48".chr(34)." height=".chr(34)."48".chr(34).">".$ligaFin;
				 $fila .= " </td> ";
				 	 $fila .= " <td> ";
				  $fila .=  $ligaIni6." <img src='".rutaimagenes('images')."cuenta.png"."' alt='ESTADO DE CUENTA' title='ESTADO DE CUENTA' width=".chr(34)."48".chr(34)." height=".chr(34)."48".chr(34).">".$ligaFin;
				 $fila .= " </td> ";

*/////////////////////////////////////////
 /* ........................................................................................................
  /* ........................................................................................................
/* ============================================================================= */
/* funcion que muestra una lista de datos en una tabla expandible                */
/* ============================================================================= */
function ImprimeDataTable( $registros , $camposHeader, $camposBD)
{

	 $rowHeader = "";
	 $tablaInicio="";

	 $tablaInicio="<table id=".chr(34)."report".chr(34).">";
	 $tablaInicio.="<tr > ";
	 $tablaInicio.="<th >Ver</th> ";

	 for ($j=1; $j<count($camposHeader); $j++){
		$rowHeader.=  " <th>".$camposHeader[$j]."</th> ";
	 }

	 $tablaInicio.= $rowHeader." </tr>";

     //Rows
     $filas= "";
     $numRegistro = "1";
	 $numFilas = count($registros);

	 if ($numFilas > -1) {
	      if ( count($registros) > 0 ) {
	  		if ( count($camposBD) > 0 ) {
			   for($i=0; $i<$numFilas; $i++) {

				 $numRegistro = $i + 1;
				 $fila  = "";
				 $fila .= " <tr>";
				 $fila .= " <td> ".$numRegistro ." <input type='radio' name='id' id='id' value='".$registros[$i][ $camposBD[0] ]."|".$registros[$i][ $camposBD[1] ]."|".$registros[$i][ $camposBD[3] ]."|".$registros[$i][ $camposBD[4] ]."' /> </td> ";

				 for ($j=1; $j<count($camposBD); $j++){
					 $fila .= " <td> ".$registros[$i][ $camposBD[$j] ]."</td> ";

				 }

				 $fila .= " </tr>";

				 $filas.=$fila;

			   } //fin for
       		}  //fin if 3
         }//fin if 2
	}//fin if 1

    if($filas == "" )
    {

		 $fila  = "";
		 $fila .= " <tr >";

         if ( count($camposBD) > 0 ){
             for ($j=0; $j<count($camposBD); $j++){
		         $fila .= " <td> "." Sin Coincidencias "."</td> ";
			 }

		 }
		 $fila .= " </tr>";
         $filas.=$fila;
    }


    $tablaFin="</table> <br />";

    return $tablaInicio.$filas.$tablaFin;

 }

/******************************************************************************************************************************************************/
?>
