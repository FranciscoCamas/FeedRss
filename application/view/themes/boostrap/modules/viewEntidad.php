<?php
require_once "libControlHTML.php";

class viewEntidad{

function remplazar�yAcentos ($remplazable,$modo){
// Original
$caracteres = array("�","�","�","�","�","�","�","�");
$standar    = array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;","&Ntilde;",chr(191));

//$standar  = array("�","�","�","�","�","�","�","�");
 //$caracteres  =array("&aacute;","&eacute;","&iacute;","&oacute;","&uacute;","&ntilde;","&Ntilde;",chr(191));

//$standar=array("a","e","i","o","u","n","N",chr(191));
 if( $modo == "0" )
   $stringresult = str_replace($caracteres, $standar, $remplazable);
  else
   $stringresult = str_replace($standar,$caracteres , $remplazable);

 return $stringresult;
}

public function getTextRedLeft($sText){

$sTextRedLef  = "<H4><p ALIGN=LEFT>";
$sTextRedLef .= "<FONT COLOR=" . chr(34) . "red" . chr(34) . ">";
//$sTextRedLef .= htmlentities($sText,ENT_COMPAT,"UTF-8");
$sTextRedLef .= utf8_encode($sText);
//$sTextRedLef .= $sText;
$sTextRedLef .= "</FONT>";
$sTextRedLef .= "</p></H4>";

 return $sTextRedLef;
}

public function getTextRedBlue($sText){

$sTextRedLef  = "<H4><p ALIGN=LEFT>";
$sTextRedLef .= "<FONT COLOR=" . chr(34) . "navy" . chr(34) . ">";
//$sTextRedLef .= htmlentities($sText,ENT_COMPAT,"UTF-8");

$sTextRedLef .= utf8_encode($sText);
$sTextRedLef .= "</FONT>";
$sTextRedLef .= "</p></H4>";

 return $sTextRedLef;
}

public function getClassDIVVTextRed($ClassName,$ClassValue){

$TextRed ="<FONT COLOR=" . chr(34) . "red" . chr(34) . "> ";
$TextRed.= "<divv class=".chr(34) .$ClassName. chr(34)." >".$ClassValue."</divv>";
$TextRed.="</FONT>";

 return $TextRed;
}

public function getClassDIVVTextHidden($ClassName,$ClassValue){
return "<divv style=".chr(34) ."visibility:hidden".chr(34) ." class=".chr(34) .$ClassName.   chr(34)." >".$ClassValue."</divv>";
}


public function GeneraRadioInline($sID,$sName,$sText,$tvalor="",$bSelecionado = false, $funcionOnClick ="") {

 $sSelect  = $bSelecionado ? 'checked' : '';
 $sOnclick = ($funcionOnClick != "") ? " onclick='".$funcionOnClick."();"."' " : '';
 $svalor   = ($tvalor         != "") ? " value = '".$tvalor."' ":"";
 
 $sRadioInline ="<label class='radio-inline'>";
 $sRadioInline.=  "<input type='radio' id='".$sID."' name='".$sName."' ";
 $sRadioInline.=  $svalor.$sSelect.$sOnclick." >".$sText;
 $sRadioInline.="</label>";

return $sRadioInline;
}

public function panelFooter( ){
 
 $sFooter = "<div class='panel-footer'>";
 $sFooter.="<table border='0' cellpadding='2' cellspacing='1' id='bordeTabla'>";
 $sFooter.= "<tr><td> <td></tr>";
 $sFooter.= "<tr><td> En caso de que algun dato sea incorrecto, contacte a <td></tr>";
 $sFooter.= "<tr><td>  Francisco Javier Camas Tec.  <td></tr>";
 $sFooter.= "<tr><td> Responsale. <td></tr>";
 $sFooter.= "<tr><td>  <td></tr>";
 $sFooter.= "<tr><td> Correo: francisco.camas@correo.uady.mx <td></tr>";
 $sFooter.= "<tr><td>  <td></tr>";
 $sFooter.= "</table>";
 $sFooter.="</div>";
 
 return $sFooter;
}


public function getLabelAndTextInput( $sLabel,$sCampo,$splaceholder,$sType,$sValue,$sColLabel,$sColInput){
//<!-- Text input http://getbootstrap.com/css/#forms -->
// <!-- change col-sm-N to reflect how you would like your column spacing (http://getbootstrap.com/css/#forms-control-sizes) -->
$InPutText ="<div class='form-group'>";
$InPutText.= "<label for='".$sCampo."' class='control-label ".$sColLabel."'>".$sLabel."</label>";
$InPutText.= "<div class='".$sColInput."'>";
$InPutText.=  "<input class='form-control' name='".$sCampo."' id='".$sCampo."' ";
$InPutText.=  "placeholder='".$splaceholder."' required='' type='".$sType."'  value='".$sValue."' >";   
$InPutText.="</div>";
$InPutText.="</div>";

return $InPutText;
}


/********************************************************************Funcion paginar**********************************************************************/
/*
/* ============================================================================= */
/* actual:          Pagina actual
 * total:           Total de registros
 * por_pagina:      Registros por pagina
 * enlace:          Texto del enlace
 * Devuelve un texto que representa la paginacion
/* ============================================================================= */
function paginar($actual, $total, $por_pagina, $enlace) {

	$ListaPaginas = "";
	$sBoostrap ="";

	if ( $por_pagina ==0 )	$por_pagina=1;

	if ( $actual    == 0 )	$actual    =1;

	$total_paginas = ceil($total/$por_pagina) +1;

  if ($total_paginas > 2)
	{

	$LimiteInferior = 3;
	$LimiteSuperior = $total_paginas  - 2;
	//$Tama�oVentana  = 5;

	$InicioVentana = $actual - 2 ;
	$FinVentana    = $actual + 3 ;

	$sTextoSeparadorIzquierda ="<li><a> ... </a> </li>" ;
	$sTextoSeparadorDerecha   ="<li><a> ... </a> </li>" ;

	if ($InicioVentana <= $LimiteInferior)
	{
	   $InicioVentana = $LimiteInferior;
	  // $FinVentana = $LimiteInferior + $Tama�oVentana;
	   $sTextoSeparadorIzquierda ="";
	}

	if ($FinVentana >= $LimiteSuperior)
	{
	  $FinVentana = $LimiteSuperior ;
	  //$InicioVentana = $actual -3 ;
	  $sTextoSeparadorDerecha ="";
	}



	 // Siempre vana  estar visibles las priemras dos opciones
	for ($i=1; $i<$LimiteInferior; $i++)
	 $ListaPaginas .= $this->generaBotonPaginacion($i,$i,$i==$actual? true: false);

	$ListaPaginas .= $sTextoSeparadorIzquierda;

	 /* Desplegamos la ventana de tama�o 5, amenos que los limites,
	    esten en esten detro del mminimo o del maximos, en ese caso
	    yase calcularon y despleiga */
	for ($i=$InicioVentana; $i<$FinVentana; $i++)
	 $ListaPaginas .= $this->generaBotonPaginacion($i,$i,$i==$actual? true: false);

	$ListaPaginas .= $sTextoSeparadorDerecha;

	// Siempre estaran visibles almenos las ultimas dos opciones
	for ($i= $LimiteSuperior; $i<$total_paginas; $i++)
	 $ListaPaginas .= $this->generaBotonPaginacion($i,$i,$i==$actual? true: false);

	 $sBoostrap.="<ul class=".chr(34)."pagination".chr(34).">";

  $sBoostrap.= $this->generaBotonPaginacion("1","Inicio");
  $sBoostrap.= $ListaPaginas ;
  $sBoostrap.= $this->generaBotonPaginacion(--$total_paginas,"Fin");

  $sBoostrap.="</ul>";

	}else
	{
	 $total_paginas=2;
	$sBoostrap.="<ul class=".chr(34)."pagination".chr(34).">";
	 $sBoostrap.= $this->generaBotonPaginacion("1","1");
	$sBoostrap.="</ul>";
	}




	return $sBoostrap;
}


function validaPaginayTotalPaginas(&$pagina, &$totalpag, &$tamano ){

  if( ceil($totalpag/$tamano) != $pagina) {
     if( $totalpag < $pagina*$tamano)
     {
	     $pagina=1;
	    // solo existe una p�gina ya que hay menos registros que el tama�o de pagina
	    if ($totalpag < $tamano) {  $totalpag=1; }

     }
  }
}



function generaBotonPaginacion($Valor, $Caption = "", $Selecionado = False)
{

   $LinkLi="";
  //
   //$LinkLi="<li><a id=".chr(34)."pag".chr(34)." tag=".chr(34).$Valor.chr(34)." > ".$Caption." </a> </li>";

   $classAct ="";
   $span     = "";

   if ($Caption == "")
     $Caption = $Valor;

   if($Selecionado)
   {
   $classAct =" class=".chr(34)."active".chr(34)." ";
   $span   = "<span class=".chr(34)."sr-only".chr(34).">(p�gina actual)</span>";
   }

   $LinkLi  = "<li ".$classAct." > ";

   $LinkLi .= "<a name=".chr(34)."pag".chr(34)." id=".chr(34)."pag".chr(34)." tag=".chr(34).$Valor.chr(34)."   > ".$Caption."";

   $LinkLi .= $span ;

   $LinkLi .= " </a> </li>";



   return $LinkLi;

}

function generaLimitesPagina($pagina, $tamano )
{

   // Limite inferior  de la pagina
   if( $pagina-1 > 0) { $inicio = ($pagina-1)*$tamano; }  else {  $inicio = 0; }
   $limitesPagina=" ".$inicio.",".$tamano;

   return $limitesPagina;

}


function generaPieConPaginacion($pagina, $totalpag, $tamano,$archivo_actual ){

  $pieDePagina = "";
  $mienlace    = "";
  $Desplegando = $tamano ;

  if( $totalpag  < $tamano * $pagina  ) {   $Desplegando = $totalpag - $tamano *( $pagina -1) ; }

  $pieDePagina .= "<div id='text3' class='fl'> Mostrando ".$Desplegando." Ingresos de un total de ".$totalpag." </div> <br\>";
  /*$pieDePagina .= "<p id='text3'> ver m�s ingresos </p>";*/

  $mienlace=$archivo_actual."?pag=";
   // Imprimimos el letrero con los numeros de pagina
  $pieDePagina .=  "<div id='text4'> ver m�s ingresos </div> <br\>";
  $pieDePagina .= " <div id='text4'> ".$this->paginar($pagina, $totalpag, $tamano, $mienlace)."</div>";

 return $pieDePagina;

}
/*fin de las funciones de paginaci�n*/


/* =============================================================================
 *  Funcion: Genera el formulario para la opci�n de busqueda
 *           Recibe:
                     1.$txtsearch

 *
 *=============================================================================
*/
 function searchBy($txtsearch, $nameTextField, $nameBoton, $valorBoton){

   header('Content-Type: text/html; charset=iso-8859-1');
   $text = "";
   $text = $text ." <div id='myForm' > " ;
   $text = $text .  "<table border=".chr(34)."0".chr(34)." cellpadding=".chr(34)."0".chr(34)." cellspacing=".chr(34)."1".chr(34).">".chr(13).chr(13);
   $text = $text .  "<tr>".chr(13);
   $text = $text .  "<td><label>".chr(13).chr(13);
   $text = $text .  "<input name=".chr(34)."search".chr(34)." type=".chr(34)."hidden".chr(34)." value=".chr(34)."yes".chr(34)." />".chr(13).chr(13);
   $text = $text .  "</label>".chr(13).chr(13);
   $text = $text .  GeneraCampoTexto($nameTextField,$txtsearch);
   $text = $text .  GeneraBoton($nameBoton, $valorBoton);



   $text = $text .  "</td>  ".chr(13);
   $text = $text .  "</tr>  ".chr(13);
   $text = $text .  "</table>".chr(13);
   $text = $text .  "</div> ";

   return  $text;

}


/* ============================================================================= */
/* funcion que muestra en pantalla la lista de clientes        */
/* ============================================================================= */
 function imprimirRegistros($listaC, $listaHeader, $listaCampos,$CampoID,$PaginaAcual,$TamanoPagina,$VerDetalles = false ,$VerEliminar= false ) {
  $colorLetra = "#000033";
  $filaColorPar = "#d8d8d8";
  $filaColorImPar = "#e8e8e8";

  return $this->ImprimeTabla( $listaC , $listaHeader, $listaCampos, $colorLetra, $filaColorPar, $filaColorImPar,$CampoID,$PaginaAcual,$TamanoPagina,$VerDetalles,$VerEliminar);

   //echo remplazarÑyAcentos ( "<p> Mostrando ".$numreg2." Ingresos de un total de ".$numreg.". Ver más ingresos ".paginar($pagina, $totalpag, $tamano, $mienlace)."</p>","0");
  //$numreg2 = "2";
  //echo "<p> Mostrando ".$numreg2." Ingresos de un total de ".count($listaC).". Ver más ingresos ".paginar("", count($listaC), 5, "")."</p>";


 }

/* ........................................................................................................
/* ============================================================================= */
/* funcion que muestra en pantalla una tabla dado un listado de registros        */
/* ============================================================================= */
function ImprimeTabla( $registros , $camposHeader, $camposBD, $colorLetra, $filaColorPar, $filaColorImPar, $CampoID="ID",$PaginaAcual=0,$TamanoPagina=10,$VerDetalles ,$VerEliminar )
{
	//colorLetra FFD700
	//Header
	 $estiloLetraIni= "<font color='".$colorLetra."'> " ;
	 $estiloLetraFin   = "</font> " ;

	 $rowHeader = "";
	 $tablaInicio="";

	 //echo " Encabeado [".print_r($camposBD)." ]";
	 //$tablaInicio.="<div id=".chr(34)."myForm".chr(34)." >    ";
	 $tablaInicio.="<table border='0' cellpadding='0' cellspacing='1' id=".chr(34)."report".chr(34).">";
	 $tablaInicio.="<tr > ";
	 $tablaInicio.="<th > &nbsp; Num &nbsp; </th> ";

	 foreach($camposHeader as $campo) {
		$rowHeader.=  " <th>".$campo."</th> ";
	 }

	 //$rowHeader.= " <th> Detalles </th>";

	  $rowHeader.= " <th> &nbsp; </th>";

	 $tablaInicio.= $rowHeader." </tr>";

     //Rows
     $filas= "";
     $numRegistro = 0;

	 $numFilas = count($registros);

	 if ( $PaginaAcual <1 )  $PaginaAcual =1;

	 if ($numFilas > -1) {
	      if ( count($registros) > 0 ) {
	  		if ( count($camposBD) > 0 ) {
			   for($i=0; $i<$numFilas; $i++) {

				 $numRegistro = ($PaginaAcual-1)*$TamanoPagina +  $i + 1;
				 //$filaColor =es_Par_Non($numRegistro,$filaColorPar, $filaColorImPar);

				 $fila  = "";
				 $fila .= " <tr>";
				 $fila .= " <td> ".$numRegistro ."  </td> ";

				 // Importante el campo num 1 siempre debe de ser el campo ID, su indice es CERO
				 for ($j=1; $j<count($camposBD); $j++){
					  $fila .= " <td> ".htmlentities($registros[$i][ $camposBD[$j] ],ENT_COMPAT,"UTF-8")."  &nbsp; </td> ";
					 //  $fila .= " <td> ".$registros[$i][ $camposBD[$j] ]."  &nbsp; </td> ";

					 //$fila .= " <td> ".$this->remplazar�yAcentos($registros[$i][ $camposBD[$j] ],1)."  &nbsp; </td> ";

				 }
				 $ligaFin="</a>";
				 $ruta1 = "";//rutaimagenes('images')."search.png";
				 $ruta2 = "";//rutaimagenes('images')."b_drop.png"; IDvista[".$registros[$i][ $camposBD[0] ]."]  ";

			   if ($VerDetalles) {
				 $fila .= " <td align='center'>"."<label> ";
			   $fila .= " <input type='button' name='".$CampoID."' id='ver' value=' ver ' tag=".$registros[$i][ $camposBD[0] ]."   />";
         $fila .= " </label>";
         }

				 if ($VerEliminar) {
				 $fila .= " <td align='center'>"."<label>";
         $fila .= " <input type='button' name='".$CampoID."' id='eliminar' value=' eliminar ' tag=".$registros[$i][ $camposBD[0] ]."   />";
         $fila .= " </label>";
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
		 $fila .= " <tr bgcolor=".$filaColorImPar.">";
		 $fila .= " <td> "."1" ."  </td> ";

         if ( count($camposBD) > 0 ){
             for ($j=0; $j<count($camposBD); $j++){
		         $fila .= " <td> "." Sin Coincidencias "."  &nbsp; </td> ";
			 }
		     $fila .= " <td> --- </td> ";
		 }
		 $fila .= " </tr>";
         $filas.=$fila;
    }


    $tablaFin="</table>   <br />";

   // header('Content-Type: text/html; charset=iso-8859-1');
    return $tablaInicio.$filas.$tablaFin;

 }
/*-------------------------------------------------*/
/* Nuevo componetes protoptipo para reemplzar las otras funciones*/

public function GeneraBotom($name,$onclickFunc,$sText,$btnclass,$spanclass,$sTootip) {

$unBotom    = "";

$unBotom .= "<button type=" . chr(34) . "button" . chr(34) . " class=" . chr(34) . $btnclass . chr(34) . " ";
$unBotom .=        "name=".chr(34).$name . chr(34) . "   id=" . chr(34) . $name .chr(34) . " ";

if ($sTootip !="")
$unBotom .= "data-toggle=" . chr(34) . "tooltip" . chr(34) . " title=" . chr(34) . $sTootip . chr(34) . "";
if ($onclickFunc !="" )
$unBotom   .= " onclick=". chr(34) . $onclickFunc. chr(34) ;

$unBotom   .= " >";
$unBotom   .= " <span class=". chr(34) . $spanclass . chr(34) . "></span> ";
//$unBotom .= htmlentities($sText,ENT_COMPAT,"UTF-8");
$unBotom .= $sText;
$unBotom   .= " </button>";
$unBotom   .= "&nbsp;&nbsp;&nbsp;&nbsp;";

return  $unBotom;
}

public function GeneraAnclaEstiloBotom($name,$onclickFunc,$sText,$btnclass,$spanclass,$unlink,$sTootip) {

$unBotomAncla = "";

$unBotomAncla  .= " <a class=" . chr(34) . $btnclass . chr(34) ."";
if ($unlink != "" )
$unBotomAncla  .= " href1=" . chr(34) . $unlink . chr(34) . "";

$unBotomAncla  .= " name=" . chr(34) .$name. chr(34) . " id=" . chr(34) .$name .chr(34) . "";

if ($sTootip !="")
$unBotomAncla .= "data-toggle=" . chr(34) . "tooltip" . chr(34) . " title=" . chr(34) . $sTootip . chr(34) . "";

if ($onclickFunc != "" )
$unBotomAncla  .= " onclick=". chr(34) . $onclickFunc. chr(34) ;
$unBotomAncla  .= " >";
$unBotomAncla  .= "     <span class=" . chr(34) . $spanclass . chr(34) . "></span> ".$sText." ";
$unBotomAncla  .= " </a>";

return  $unBotomAncla;
}


public function GeneraDiv($name,$sText,$sClass) {

$unDiv = "";

$unDiv .="<div ";
$unDiv .=   "id=". chr(34) .$name. chr(34) . "";
$unDiv .= "name=". chr(34) .$name. chr(34) . " ";

if ($sClass != "" )
$unDiv .="class=". chr(34) .$sClass. chr(34) . " ";

$unDiv .= "> ";

if ($sText != "" )
$unDiv .= $sText;

$unDiv .=" </div> ";

return  $unDiv;
}


public function GenerInputText($sNombre, $splaceholder,$sClass) {

  $sInputText  ="";
  $sInputText .="<input ";
  $sInputText .=   "id=".chr(34).$sNombre.chr(34)." ";
  $sInputText .=   "name=".chr(34).$sNombre.chr(34)." ";
  $sInputText .=   "placeholder=".chr(34).$splaceholder.chr(34)." ";
  $sInputText .=   "class=".chr(34).$sClass.chr(34)." ";
  $sInputText .="> ";

return  $sInputText;
}


public function GenereraListadoConBuscador( $GridName, $txtsearchName,   $txtsearchCaption,
                                            $doSearchFunction,$doSearchNameBtn,$doSearchNameBtnTooltip,
                                            $ListAllFunction, $ListAllNameBtn, $ListAllNameBtnTooltip ){

   $tablaBuscadorCampo  ="<div class=". chr(34) . "input-group". chr(34) . ">";
   $tablaBuscadorCampo .= $this->GenerInputText( $txtsearchName , $txtsearchCaption,"input-lg")."&nbsp;&nbsp;&nbsp;&nbsp;";
   $tablaBuscadorCampo .= $this->GeneraBotom($doSearchNameBtn, $doSearchFunction ,"BUSCAR","btn btn-primary","glyphicon glyphicon-search" ,$doSearchNameBtnTooltip);
   $tablaBuscadorCampo .= $this->GeneraAnclaEstiloBotom($ListAllNameBtn ,$ListAllFunction ,"VER A TOD@S","btn btn-success","glyphicon glyphicon-refresh","", $ListAllNameBtnTooltip);
   $tablaBuscadorCampo .=" </div> ";

   return "-".$tablaBuscadorCampo."<div name='".$GridName."' id='".$GridName."'></div>";
}

public function GeneratxtSearchEnter( $txtsearch, $searchFun  ){

 $txtsearchEvent ="<script type=".chr(34)."text/javascript".chr(34)." language=".chr(34)."JavaScript".chr(34)." > ";
 $txtsearchEvent.="$('#".$txtsearch."').keypress(function(event){ ";
 $txtsearchEvent.="var keycode = (event.keyCode ? event.keyCode : event.which); ";
 $txtsearchEvent.="if( keycode == '13') ";
 $txtsearchEvent.= $searchFun."();";
 $txtsearchEvent.="});";
 $txtsearchEvent.= "</script> ";

  return $txtsearchEvent;
}

public function LoadFuncionFromJQ( $GridName ){

   $funcionJQ  = "<script type=".chr(34)."text/javascript".chr(34)." language=".chr(34)."JavaScript".chr(34)."> ";
   //$funcionJQ .= "$(document).ready(function() ";
   //$funcionJQ .= "{	";
//   $funcionJQ .= " $(function() {";
   $funcionJQ .= " ".$GridName." ";
//  $funcionJQ .=        " });";
  // $funcionJQ .= "});";
   $funcionJQ .= "</script> ";

   return $funcionJQ ;
}


/* Este deve estar en el view Generico*/
public function GeneraTextInputBostrapConIcono($idboton,$LavelText, $placeholder,$glyphicon, 
                                                $sType="text", $InputGrupSize = "input-group input-group-lg",$Disabled=false, $sClassAdd =""){
  
  $unBoton  = " <h5> ".utf8_decode($LavelText)." </h5>"; //Antes H3
  $unBoton .= "<div class=".chr(34)."input-group ".$InputGrupSize.chr(34).">";
  $unBoton .=  "<span class=".chr(34)."input-group-addon".chr(34)."><span class=".chr(34)."glyphicon ".$glyphicon.chr(34)."></span></span>";
  $unBoton .=  "<input id=".chr(34).$idboton.chr(34)." type=".chr(34).$sType.chr(34)." class=".chr(34)."form-control";
  if($sClassAdd !=="" ) 
   $unBoton .=" typeahead";
  $unBoton .=chr(34)."";
  
  $unBoton .=   " placeholder=".chr(34).$placeholder.chr(34)."";
  
  if ($Disabled)
  $unBoton .=" disabled ";
  $unBoton .=">";
  
  $unBoton .= "</div>";
  return $unBoton;
}

/* Este deve estar en el genrico del VIEW*/
public function GeneraModalErrorPrint( ) {

  $unModalErrorPrint = "";
  $unModalErrorPrint.= "<div class=" . chr(34) ."modal fade" . chr(34) ." id=" . chr(34) ."myModalError" . chr(34) ." tabindex=" . chr(34) ."-1" . chr(34) ."";
  $unModalErrorPrint.=      " role=" . chr(34) ."dialog" . chr(34) ." aria-labelledby=" . chr(34) ."exampleModalLabel" . chr(34) ." aria-hidden=" . chr(34) ."true" . chr(34) .">";
  $unModalErrorPrint.=  "<div class=" . chr(34) ."modal-dialog" . chr(34) ." role=" . chr(34) ."document" . chr(34) .">";
  $unModalErrorPrint.=      "<div class=" . chr(34) ."modal-content" . chr(34) .">";
  
  $unModalErrorPrint.= "<div class=" . chr(34) ."modal-header" . chr(34) .">";
  $unModalErrorPrint.=    "<h5 class=" . chr(34) ."modal-title" . chr(34) ." id=" . chr(34) ."exampleModalLabel" . chr(34) .">Modal title</h5>";
  $unModalErrorPrint.=    "<button type=" . chr(34) ."button" . chr(34) . " class=" . chr(34) ."close" . chr(34) ." data-dismiss=" . chr(34) ."modal" . chr(34) ." aria-label=" . chr(34) ."Close" . chr(34) ." >";
  $unModalErrorPrint.=         "<span aria-hidden=" . chr(34) ."true" . chr(34) .">&times;</span>";
  $unModalErrorPrint.=     "</button>";
  $unModalErrorPrint.= "</div>";

  $unModalErrorPrint.= "      <div class=" . chr(34) ."modal-body" . chr(34) .">";
 
  //$unModal.=        "..."; 
  $unModalErrorPrint.=      "</div>";
 
  $unModalErrorPrint.= "<div class=" . chr(34) ."modal-footer" . chr(34) .">";
  $unModalErrorPrint.=    "<button id=" .chr(34)."idConfirmoBorrar".chr(34) . " type=" . chr(34) ."button" . chr(34) ."";
  $unModalErrorPrint.=         "class=". chr(34) ."btn btn-primary"   . chr(34) ."  data-dismiss=" . chr(34) ."modal" . chr(34) .">Aceptar</button>";
  
  $unModalErrorPrint.=    "<button id=".chr(34)."idCancel" . chr(34) .           "type=" . chr(34) ."button" . chr(34) ."";
  $unModalErrorPrint.=         "class=".chr(34)."btn btn-secondary" . chr(34) ." data-dismiss=" . chr(34) ."modal" . chr(34) .">Cancelar</button>";
  
  $unModalErrorPrint.= "</div>";
 
  $unModalErrorPrint.=    "</div>";
  $unModalErrorPrint.= "</div>";
  $unModalErrorPrint.= "</div>";

return  $unModalErrorPrint;
}



/* Este deve estar en el genrico del VIEW*/
public function GeneraModalFormPrintHeader( $NombreForm) {

  $unModalHeader = "";
  $unModalHeader.= "<div class=" . chr(34) ."modal fade" . chr(34) ." id=" . chr(34) .$NombreForm . chr(34) ." tabindex=" . chr(34) ."-1" . chr(34) ."";
  $unModalHeader.=      " role=" . chr(34) ."dialog" . chr(34) ." aria-labelledby=" . chr(34) ."exampleModalLabel" . chr(34) ." aria-hidden=" . chr(34) ."true" . chr(34) .">";
  $unModalHeader.=  "<div class=" . chr(34) ."modal-dialog" . chr(34) ." role=" . chr(34) ."document" . chr(34) .">";
  $unModalHeader.=    "<div class=" . chr(34) ."modal-content" . chr(34) .">";
  
  $unModalHeader.= "<div class=" . chr(34) ."modal-header" . chr(34) .">";
  $unModalHeader.=   "<h5 class=" . chr(34) ."modal-title" . chr(34) ." id=" . chr(34) ."exampleModalLabel" . chr(34) .">Modal title</h5>";
  $unModalHeader.=   " <button type=" . chr(34) ."button" . chr(34) ." data-dismiss=" . chr(34) ."modal" . chr(34) ." aria-label=" . chr(34) ."Close" . chr(34) ."";
  $unModalHeader.=   " id=" . chr(34) ."idCancelCerrarModal" . chr(34) . " class=" . chr(34) ."close" . chr(34) ." >";
  
  $unModalHeader.=      "<span aria-hidden=" . chr(34) ."true" . chr(34) .">&times;</span>";
  
  $unModalHeader.=    "</button>";
  $unModalHeader.= "</div>";
  
  $unModalHeader.=  "<div class=" . chr(34) ."modal-body" . chr(34) .">";


return  $unModalHeader;
}


/* Este deve estar en el genrico del VIEW*/
public function GeneraModalFormPrintFootherHeader( $sBotonsCancel="" ) {

  $unModalFootherHeader = "";

  $unModalFootherHeader.=  "</div>";
  
  $unModalFootherHeader.= " <div class=" . chr(34) ."modal-footer" . chr(34) .">";
  $unModalFootherHeader.=    "<button id=".chr(34)."idCancelModal".$sBotonsCancel . chr(34) .           "type=" . chr(34) ."button" . chr(34) ."";
  $unModalFootherHeader.=         "class=".chr(34)."btn btn-secondary" . chr(34) ." data-dismiss=" . chr(34) ."modal" . chr(34) .">Cancelar</button>";
  
return  $unModalFootherHeader;
}


/* Este deve estar en el genrico del VIEW*/
public function GeneraModalFormPrintFootherInicio( ) {

  $unModalFootherInicio = "";
  $unModalFootherInicio.=      "</div>";
  
  $unModalFootherInicio.=    "</div>";  
  $unModalFootherInicio.=  "</div>";
  $unModalFootherInicio.= "</div>";

return  $unModalFootherInicio;
}

}

?>