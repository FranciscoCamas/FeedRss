<?php
function getArrayMeses(){
  return array("Mes","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
}
function getArrayDias(){
 return  array("","lunes","Martes","Miercoles","Jueves","viernes","Sabado","Domingo");
}
function GeneraLink($unLing, $UnIncono,$sTitle){
	  $sLink ="<li>";
    $sLink.="<a href=".chr(34).$unLing.chr(34)."><i class=".chr(34).$UnIncono.chr(34)."></i> ".$sTitle."</a>";
		$sLink.="</li>";
	  return $sLink;
}

function GeneraLinkFecha($unaFuncion, $UnIncono,$sTitle){
    //<li><a  onclick="doSearchFeedFecha('')" > Hoy</a></li>
	  $sLink ="<li>";
    $sLink.="<a onclick=".chr(34).$unaFuncion.chr(34)."><i class=".chr(34).$UnIncono.chr(34)."></i> ".$sTitle."</a>";
		$sLink.="</li>";
	  return $sLink;
}

function GeneraFechasMes($unano="2021",$unmes="05",$inicio=17,$UnIncono="glyphicon glyphicon glyphicon-time"){
$sLinks="";
 for ($i=$inicio; $i>0; $i--)
   $sLinks .="".GeneraLinkFecha("doSearchFeedFecha('".$unano."-".$unmes."-".sprintf("%02d", $i)."')",$UnIncono,"".$i."");
return $sLinks;
}


function GeneraTreeMesActual($UnIncono="glyphicon glyphicon glyphicon-time"){

 $sLinks ="<li><a> Mes actual ".getArrayMeses()[date("n")] ."</a>";
 $sLinks.= "<ul>";
 $sLinks.=GeneraLinkFecha("doSearchFeedFecha('')","glyphicon glyphicon glyphicon-time","Hoy ".date("d"));
 $sLinks.=GeneraFechasMes( date("Y"),date("m"),date("d")-1,"glyphicon glyphicon glyphicon-time");
 $sLinks.= "</ul>";
 $sLinks.= "</li>";

return $sLinks;
}

function GeneraTreeMes($oneyear="2021",$unmes=4,$UnIncono="glyphicon glyphicon glyphicon-time"){
 $numdias= cal_days_in_month(CAL_GREGORIAN, 8, $oneyear);
 $sLinks ="<li><a >".getArrayMeses()[$unmes] ."</a>";
 $sLinks.= "<ul>";
 $sLinks.=GeneraFechasMes( date("Y"),date("m"),$numdias,"glyphicon glyphicon glyphicon-time");
 $sLinks.= "</ul>";
 $sLinks.= "</li>";

return $sLinks;
} 


function GeneraTreeYearActual($UnIncono="glyphicon glyphicon glyphicon-time"){

 $sLinks ="<li><a> ".date("Y") ."</a>";
 $sLinks.= "<ul>";
 $sLinks.=GeneraTreeMesActual();
 for ($i=date("n")-1; $i>0; $i--)
   $sLinks .="".GeneraTreeMes(date("Y"),$i);
 
 $sLinks.= "</ul>";
 $sLinks.= "</li>";

return $sLinks;
}

function GeneraTreeYear($oneyear="2020",$UnIncono="glyphicon glyphicon glyphicon-time"){

 $sLinks ="<li><a> ".$oneyear ."</a>";
 $sLinks.= "<ul>";
 
 for ($i=12; $i>0; $i--)
   $sLinks .="".GeneraTreeMes($oneyear,$i);
 
 $sLinks.= "</ul>";
 $sLinks.= "</li>";

return $sLinks;
}

function GeneraTreeNoticias($idTree="tree2"){

$sTree = "<ul id=".$idTree.">";
$sTree.= GeneraLinkFecha("doSearchFeedFecha('')","glyphicon glyphicon glyphicon-time","Hoy");
$sTree.= GeneraLinkFecha("doSearchFeedFecha('mesact')","glyphicon glyphicon glyphicon-time","Todo este Mes");
$sTree.= GeneraLinkFecha("doSearchFeedFecha('mesant')","glyphicon glyphicon glyphicon-time","Todo Abril");   
$sTree.= GeneraTreeMesActual();
$sTree.= GeneraTreeMes();
$sTree.= GeneraTreeYearActual();
//$sTree.= GeneraTreeYear("2020");
//$sTree.= GeneraTreeYear("2019");
$sTree.= "</ul>";

return $sTree;
}

function GeneraPanelHeading($idColapse="collapseOne",$sNombre="Historial",$UnIncono="glyphicon glyphicon glyphicon-time"){

$sPh = "<div class='panel-heading'>";
$sPh .= "<h4 class='panel-title'>";
$sPh .= "<a data-toggle='collapse' data-parent='#accordion' href='#".$idColapse."'>";
$sPh .= "<span class='".$UnIncono."'> </span> ".$sNombre."</a>";
$sPh .= "</h4>";
$sPh .= "</div>";
                    
return $sPh ;
}
function GeneraPanelBody($idColapse="collapseOne",$in="",$idaccordion="accordion"){
 //$sPb = "<div class='panel-group' id='".$idaccordion."'>";
 $sPb = "<div class='panel panel-default'>";
 $sPb .= "<div id='".$idColapse."' class='panel-collapse collapse ".$in."'>";
 $sPb .= "<div class='panel-body'>";
 return $sPb;
}
function GeneraPanelBodyEnd(){
 $sPb = "</div>";
 //$sPb .= "</div";
 $sPb .= "</div>";
 $sPb .= "</div>";
 return $sPb;
}

function GeneraTableTree(){
$sPdt= "<table class='table'>";
$sPdt.= "<tr>";
$sPdt.= "<td>";
$sPdt.= GeneraTreeNoticias(); 
$sPdt.= "</td>";
$sPdt.= "</tr>";
$sPdt.= "</table>";
return $sPdt;
}
function GeneraTableLocal(){
$sPdt= "<table class='table'>";

$sPdt.= "<tr>";
$sPdt.= "<td>";
$sPdt.= "<span class=".chr(34)."glyphicon glyphicon-file text-primary".chr(34)."></span><a  onclick=".chr(34)."doSearchFeedEsp('El Diario de Yucatan')".chr(34)."> Diario de Yucat&aacute;n</a>";
$sPdt.= "</td>";
$sPdt.= "</tr>";
$sPdt.= "<tr>";
$sPdt.= "<td>";
$sPdt.= "<span class=".chr(34)."glyphicon glyphicon-file text-success".chr(34)."></span><a onclick=".chr(34)."doSearchFeedEsp('Yucatan - PorEsto')".chr(34)."> Por Esto</a>";
$sPdt.= "</td>";
$sPdt.= "</tr>";
                     
$sPdt.= "</table>";                            
return $sPdt;
}

function GeneraTableInternacional(){
$sPdI= "<table class='table'>";
$sPdI.= "<tr>";
$sPdI.= "<td>";
$sPdI.= "<span class=".chr(34)."glyphicon glyphicon-file text-primary".chr(34)."></span><a onclick=".chr(34)."doSearchFeedEsp('Top stories - Google News')".chr(34)."> Google News</a>";
$sPdI.= "</td>";
$sPdI.= "</tr>";
$sPdI.= "<tr>";
$sPdI.= "<td>";
$sPdI.= "<span class=".chr(34)."glyphicon glyphicon-file text-success".chr(34)."></span><a onclick=".chr(34)."doSearchFeedEsp('The New York Times en Espa')".chr(34)."> New York Times</a>";
$sPdI.= "</td>";
$sPdI.= "</tr>";
$sPdI.= "</table>"; 
return $sPdI;
}

function GeneraTableActualizar(){
$sPdI= "<table class='table'>";

$sPdI.= "<tr>";
$sPdI.= "<td>";
$sPdI.=  "<span class=".chr(34)."glyphicon glyphicon-download-alt text-primary".chr(34)."></span><a onclick=".chr(34)."UpdateAllFeed('https://www.yucatan.com.mx/feed')".chr(34)."> Diario de Yucat&aacute;n</a>";                              
$sPdI.= "</td>";
$sPdI.= "</tr>";
 
$sPdI.= "<tr>";
$sPdI.= "<td>";
$sPdI.= " <span class=".chr(34)."glyphicon glyphicon-download-alt text-primary".chr(34)."></span><a onclick=".chr(34)."UpdateAllFeed('https://www.poresto.net/rss/feed.html?r=1')".chr(34)."> Por Esto</a>";                          
$sPdI.= "</td>";
$sPdI.= "</tr>";

$sPdI.= "<tr>";
$sPdI.= "<td>";
 $sPdI.= "<span class=".chr(34)."glyphicon glyphicon-download-alt text-primary".chr(34)."></span><a onclick=".chr(34)."UpdateAllFeed('https://news.google.com/rss?topic=h&hl=en-US&gl=US&ceid=US:en')".chr(34)."> Google News</a>";                              
$sPdI.= "</td>";
$sPdI.= "</tr>";

$sPdI.= "<tr>";
$sPdI.= "<td>";
 $sPdI.= "<span class=".chr(34)."glyphicon glyphicon-download-alt text-primary".chr(34)."></span><a onclick=".chr(34)."UpdateAllFeed('https://rss.nytimes.com/services/xml/rss/nyt/es.xml')".chr(34)."> New York Times</a>";                                 
$sPdI.= "</td>";
$sPdI.= "</tr>";


$sPdI.= "</table>"; 
return $sPdI;
}
 
function GeneraTableConfiguracion(){
$sPdI= "<table class='table'>";

$sPdI.= "<tr>";
$sPdI.= "<td>";
$sPdI.= "<div class=".chr(34)."form-group".chr(34).">";
$sPdI.= "<label for=".chr(34)."exampleFormControlTextarea1".chr(34).">Escriba una direccion y descarge</label>";
  $sPdI.= "<textarea class=".chr(34)."form-control".chr(34)." id=".chr(34)."editboxBuscaFeed".chr(34)." rows=".chr(34)."3".chr(34).">https://news.google.com/rss?topic=h&hl=en-US&gl=US&ceid=US:en</textarea>";
  
 $sPdI.= "<button type=".chr(34)."button".chr(34)." class=".chr(34)."btn btn-info ".chr(34)." name=".chr(34)."BuscaFeed".chr(34)."   id=".chr(34)."BuscaFeed".chr(34).""; 
 $sPdI.= "data-toggle=".chr(34)."tooltip".chr(34)." title=".chr(34)."Descarge los Feeds RSS de la pagina de su eleccion".chr(34).""; 
 $sPdI.= "onclick=".chr(34)."UpdateAllFeed('')".chr(34)." > <span class=".chr(34)."glyphicon glyphicon-cloud-download".chr(34)."></span> ";
 $sPdI.= "Descargar Feeds </button></div>";
 
$sPdI.= "</td>";
$sPdI.= "</tr>";

$sPdI.= "<tr>";
$sPdI.= "<td>";
   $sPdI.= "<div class='input-group-btn'>"; 
 $sPdI.= "<a class=".chr(34)."btn btn-danger".chr(34)." name=".chr(34)."LimpiarFeed".chr(34)." id=".chr(34)."LimpiarFeed".chr(34)."";
 $sPdI.= "data-toggle=".chr(34)."tooltip".chr(34)." title=".chr(34)."Borre el historial de noticias".chr(34)." onclick=".chr(34)."DelAllFeed()".chr(34)." > ";    
  $sPdI.= "<span class=".chr(34)."glyphicon glyphicon-floppy-remove".chr(34)."></span> Borrar historial  </a> ";
  $sPdI.= "</div>"; 
$sPdI.= "</td>";
$sPdI.= "</tr>";

$sPdI.= "</table>"; 
return $sPdI;
}
                                
function GeneraunPanel($idColapse="collapseOne",$sNombre="Historial",$in="", $table="",$UnIncono=""){

$sPd = GeneraPanelHeading($idColapse,$sNombre,$UnIncono);
$sPd.= GeneraPanelBody($idColapse,$in);
$sPd.= $table;
$sPd.= GeneraPanelBodyEnd();  

 return $sPd;
}

function GeneraPaneles(){

$sPns= "<div class='panel-group' id='accordion'>";
$sPns.=GeneraunPanel("collapseOne","Historial","in",GeneraTableTree(),"glyphicon glyphicon glyphicon-time");
$sPns.=GeneraunPanel("collapseOne2","Local","",GeneraTableLocal(),"glyphicon glyphicon-home"); 
$sPns.=GeneraunPanel("collapseOne3","Internacional","",GeneraTableInternacional(),"glyphicon glyphicon-globe");
$sPns.=GeneraunPanel("collapseOne4","Actualizar Feeds","",GeneraTableActualizar(),"glyphicon glyphicon-refresh");
$sPns.=GeneraunPanel("collapseOne5","Configuraci&oacute;n","",GeneraTableConfiguracion(),"glyphicon glyphicon glyphicon-cog");
 $sPns.="</div>";
 return $sPns;
}

echo GeneraPaneles();
?>