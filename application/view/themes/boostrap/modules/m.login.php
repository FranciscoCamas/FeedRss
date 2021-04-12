<?php
$configFechas = include( "configFechasAcceso.php");

  $ErrorMessage="";
  if ( isset ($_SESSION["MsgPaginaAnterior"] ) )
       $ErrorMessage = $_SESSION["MsgPaginaAnterior"]."";

 $_SESSION["username"] = "Autentificando";

 $titulo          = "Lector de noticias RSS";

 $unaFechaFinal   ="";// $configFechas["FechaFin"];
 $unaFechaInicial ="";// $configFechas["FechaInicio"];
 $periodo         ="";// $configFechas["Periodo"];

 $Encabezado ="<p1 ALIGN=center>";
 $Encabezado.="<FONT COLOR=".chr(34)."navy".chr(34).">";
 $Encabezado.="</FONT>";
 $Encabezado.="</p1>";

 $Encabezado.="<H2 ALIGN=center>";
 $Encabezado.="<FONT COLOR=".chr(34)."navy".chr(34).">";
 $Encabezado.="<img src=".chr(34).__IMAGENES__."feed-rss-1-1.png".chr(34)." title='Logo' border='0' >";
 $Encabezado.= $titulo;
 $Encabezado.="<br>";
 $Encabezado.=$periodo;
 $Encabezado.="</FONT>";
 $Encabezado.="</H2>";

 $PiePAg="<p ALIGN=center>";
 $PiePAg.=" <FONT COLOR=".chr(34)."red".chr(34)."> <br></FONT>";
 $PiePAg.="</p>";
 $PiePAg.="<p ALIGN=center>";
 $PiePAg.="<FONT COLOR=".chr(34)."red".chr(34).">";
 $PiePAg.="";
 $PiePAg.="</FONT> </p>";
 $PiePAg.="<p ALIGN=center>";
 $PiePAg.="<FONT COLOR=".chr(34)."red".chr(34).">";
 $PiePAg.="";
 $PiePAg.="</FONT> </p>";

 $WraperIni ="<div class=".chr(34)."container".chr(34).">";
 $WraperIni.=  "<div class=".chr(34)."row".chr(34).">";
 $WraperIni.=     "<div class=".chr(34)."col-md-4 col-md-offset-4".chr(34).">";
 $WraperIni.=       "<div class=".chr(34)."login-panel panel panel-default".chr(34).">";

 $WraperFin =       "</div>";
 $WraperFin .=     "</div>";
 $WraperFin .=   "</div>";
 $WraperFin .="</div>";

 $FormHEader = "<div class=".chr(34)."panel-heading".chr(34).">";
 $FormHEader.=  "<h3 class=".chr(34)."panel-title".chr(34).">Iniciar sesi&oacute;n";
 $FormHEader.=   "</h3></div>";

 $FormFotter="<div class=".chr(34)."panel-heading".chr(34).">";
 $FormFotter.=  "<label>".$ErrorMessage.""."</label>" ;
 $FormFotter.=   "</div>";

 $FormINI  = "<div class=".chr(34)."panel-body".chr(34).">";
 $FormINI .=   "<div id=".chr(34)."myForm".chr(34)." >";//post check/
 $FormINI .=       "<form method=".chr(34)."POST".chr(34)." action=".chr(34).__CONTROLLER__."check/".chr(34)." role=".chr(34)."form".chr(34).">";
 $FormINI .=           "<fieldset>";

 $FormFIN  =            "</fieldset>";
 $FormFIN .=       "</form>";
 $FormFIN .=   "</div>";
 $FormFIN .="</div>";

 $TexInpMatricula  = "<div class=".chr(34)."form-group".chr(34).">";
 $TexInpMatricula .=   "<input id=".chr(34)."Matricula".chr(34)." name=".chr(34)."Matricula".chr(34)." ";
 $TexInpMatricula .=       "class=".chr(34)."form-control".chr(34)." placeholder=".chr(34)."Usuario INET".chr(34)." autofocus >";
 $TexInpMatricula .= "</div>";

 $TexInpPassw  = "<div class=".chr(34)."form-group".chr(34).">";
 $TexInpPassw .=  "<input id=".chr(34)."password".chr(34).          " name=".chr(34)."password".chr(34)." ";
 $TexInpPassw .=      "class=".chr(34)."form-control".chr(34)." placeholder=".chr(34)."Contrase&#241;a".chr(34)." ";
 $TexInpPassw .=       "type=".chr(34)."password".chr(34)." value=".chr(34)."".chr(34).">";
 $TexInpPassw .= "</div>";

 $ntnInpChekin = "<input type=".chr(34)."submit".chr(34)." id=".chr(34)."unClick".chr(34)." name=".chr(34)."unClick".chr(34)."";
 $ntnInpChekin.= " value=".chr(34)."Iniciar sesi&#243;n".chr(34)." class=".chr(34)."btn btn-lg btn-success btn-block".chr(34)." />";

 $PageLogIn = $Encabezado;
 $PageLogIn.= $WraperIni;
 $PageLogIn.= $FormHEader;
 $PageLogIn.= $FormINI;

 $PageLogIn.= $TexInpMatricula;
 $PageLogIn.= $TexInpPassw;
 $PageLogIn.= $ntnInpChekin;

 $PageLogIn.= $FormFIN;
 $PageLogIn.= $FormFotter;
 $PageLogIn.= $WraperFin;
 $PageLogIn.= $PiePAg;

if ( isset ($_SESSION["MsgPaginaAnterior"] ) )
 if( $_SESSION["MsgPaginaAnterior"] !== "")
    session_destroy();

 $Encabezado      ="";
 $WraperIni       ="";
 $FormHEader      ="";
 $FormINI         ="";
 $FormFIN         ="";
 $FormFotter      ="";
 $WraperFin       ="";
 $PiePAg          ="";
 $TexInpMatricula ="";
 $TexInpPassw     ="";
 $ntnInpChekin    ="";

 echo $PageLogIn;

 $PageLogIn="";
?>