<?php/*-------------------------------------------------------------------\|          Nombre: View.Feed                          || Responsabilidad: Desplegar la interfaz grafica que ve el usuario   ||          Hereda:                                                   ||        Interfaz:                                                   ||                                                                    |\-------------------------------------------------------------------*///require_once __MODEL__."SelectFromDB.php";require_once "viewEntidad.php";class viewFeed extends viewEntidad{   public function __construct() {/*    $this->mapMensages  = array(          'NUEVO'      => array( $this->IndCLasMSG => "alert-info",                                 $this->IndMSG     => "Agrege los Datos para Registrar a una nueva Persona"),          'EDITANDO'   => array( $this->IndCLasMSG => "alert-info",                                 $this->IndMSG     => "Editando los datos de la Persona ..."),          'EDITADO'    => array( $this->IndCLasMSG => "alert-info",                                 $this->IndMSG     => "Se actualizo Correctamente la informacion de la persona ..."),          'ELIMINADO'  => array( $this->IndCLasMSG => "alert-warning",                                 $this->IndMSG     => "Se Elimino de forma correcta los datos de la persona"),          'AGREGADO'   => array( $this->IndCLasMSG => "alert-success",                                 $this->IndMSG     => "Se Agregaron correctamente los datos de la persona"),          'LISTADO'    => array( $this->IndCLasMSG => "alert-success",                                 $this->IndMSG     => "Desplegando la lista de las personas"),          'ERROR'      => array( $this->IndCLasMSG => "alert-danger",                                 $this->IndMSG     => "Algo fallo, consulte al soporte tecnico" ) ,          'SINMENSAGE' => array( $this->IndCLasMSG => "",                                 $this->IndMSG     => "" )                                 );*/}public function ListadoConbuscador( $txtsearch = ""){ $tablaBuscadorCampo = "";$unEncabezado  = "";$unEncabezado .= " <H3 ALIGN=center>";$unEncabezado .= "<FONT COLOR=" . chr(34) . "navy" . chr(34) . "> ";$unEncabezado .= "Lector de Noticias RSS <br>";$unEncabezado .= "</FONT>";$unEncabezado .= "</H3>";$NotaNoCam2  ="";//$NotaNoCam2  =$this->getTextRedBlue(" Bienvenido al lector de noticias RSS, escriba una direcci�n incluyendo la directiva Feed o RSS, o descarge las noticias del Diario de Yucat�n."); $NotaNoCam2  =$this->getTextRedBlue(" Bienvenido al lector de noticias RSS"); $unEncabezado=$unEncabezado.$NotaNoCam2 ;   $tablaBuscadorCampo =$unEncabezado; //$tab1  ="<div id='home' class='tab-pane fade in active'>"; //$tab1 .="<h4> 1.DOCENCIA</h4>";  $tab1 =" <div class='input-group'>"; $tab1 .="<input id='editbox_searchFeed' type='text' class='form-control' placeholder='Busque una noticia'>"; $tab1 .="<div class='input-group-btn'>"; $tab1 .= $this->GeneraBotom("doSea", "doSearchFeed()","BUSCAR","btn btn-primary","glyphicon glyphicon-search" ,"Busque una noticia"); $tab1 .=" </div>";  $tab1 .="<div class='input-group-btn'>"; $tab1 .=" </div>";  $tab1 .="<div class='input-group-btn'>"; $tab1 .= $this->GeneraAnclaEstiloBotom("VerFeed","VerTodoFeed()","VER TODO","btn btn-success","glyphicon glyphicon-refresh","","Despliege todas las noticias en su historial"); $tab1 .=" </div>"; $tab1 .="<div class='input-group-btn'>"; $tab1 .=" </div>";  $tab1 .= "<div class=".chr(34)."input-group".chr(34).">"; $tab1 .= "<span class=".chr(34)."input-group-addon".chr(34)."> <span class=".chr(34)."glyphicon glyphicon-sort-by-order".chr(34)."> </span> Ordenar por</span>"; $tab1 .= "<select id=".chr(34)."Ordenar".chr(34)." class=".chr(34)."form-control".chr(34)."  onchange=".chr(34)."OrdenaNoticias()".chr(34).">"; $tab1 .= "<option value='Date'>"."Fecha"."</option>";  $tab1 .= "<option value='Title'>"."Titulo"."</option>";    $tab1 .= "<option value='Categories'>"."Categoria"."</option>";  $tab1 .= "<option value='Description'>"."Descripcion"."</option>";  $tab1 .= "</select>"; $tab1 .= "</div> ";    $tab1 .=" </div><br>"; //$tab1 .="  <div class='carousel-inner-data'>";// $tab1 .=" <ul>";// $tab1 .=" <li>"; $tab1 .="<div id='jsGridFeed'></div>";  // $tab1 .=" </ul></li></div>";  $tab1 .= "<div id='externalPagerFeed' class='external-pager'>  </div>";   $tab1 .=" </div>";   $tablaBuscadorCampo .=$tab1; //$tablaBuscadorCampo .="<div class='input-group'>";//https://news.google.com/rss?topic=h&hl=en-US&gl=US&ceid=US:en/*$tablaBuscadorCampo .="<input id='editboxBuscaFeed' type='text' class='form-control' value='https://news.google.com/rss?topic=h&hl=en-US&gl=US&ceid=US:en' placeholder='Busque una noticia'>"; $tablaBuscadorCampo .="<div class='input-group-btn'>"; $tablaBuscadorCampo .= $this->GeneraBotom("BuscaFeed", "UpdateAllFeed('')","Descargar Feeds","btn btn-info ","glyphicon glyphicon-cloud-download" ,"Descarge los Feeds RSS de la pagina de su eleccion"); $tablaBuscadorCampo .=" </div>"; */ $tablaBuscadorCampo .="<div class='input-group-btn'>"; $tablaBuscadorCampo .=" </div>"; /* $tablaBuscadorCampo .="<div class='input-group-btn'>"; $tablaBuscadorCampo .= $this->GeneraAnclaEstiloBotom("ReiniciarFeeds","UpdateAllFeed('https://www.yucatan.com.mx/feed')",utf8_encode("Descargar del Diario de Yucat�n"),"btn btn-warning","glyphicon glyphicon-download-alt","",utf8_encode("Descarga los Fedd RSS del Diario de Yucat�n")); $tablaBuscadorCampo .=" </div>";  $tablaBuscadorCampo .="<div class='input-group-btn'>"; $tablaBuscadorCampo .= $this->GeneraAnclaEstiloBotom("ReiniciarFeeds","UpdateAllFeed('https://www.poresto.net/rss/feed.html?r=1')","Refrescar Por Esto","btn btn-warning","glyphicon glyphicon-download-alt","",utf8_encode("Descarga los Fedd RSS de PorEsto")); $tablaBuscadorCampo .=" </div>"; */ /* $tablaBuscadorCampo .="<div class='input-group-btn'>"; $tablaBuscadorCampo .= $this->GeneraAnclaEstiloBotom("LimpiarFeed",   "DelAllFeed()","Limpiar historial", "btn btn-danger","glyphicon glyphicon-floppy-remove","","Borre el historial de noticias"); $tablaBuscadorCampo .=" </div>"; */$tablaBuscadorCampo .=" </div> <br>";//$tablaBuscadorCampo .= $this->GeneraAnclaEstiloBotom("ExportarExcelFeed","ExportarExcelFeed()","Exportar Excel","btn btn-success","glyphicon glyphicon-floppy-save","","Exporte a Excel la lista de Folios");//$tablaBuscadorCampo .= "<div id='ExpExcelFeed' class='ExpExcelFeed'> </div>";//$tablaBuscadorCampo .= $this->GeneraModalFormPrintFeed( ) ;$tablaBuscadorCampo .= $this->GeneraModalErrorPrint( ) ;$tablaBuscadorCampo .= $this->GeneraDiv('oneSpin','',''); $tab2  ="<div id='menu1' class='tab-pane fade'>"; $tab2 .="<h4> Noticias de los ultimos 7 dias</h4>";  $tab2 .="hola"; $tab2 .=" </div>";   $tab3  ="<div id='menu2' class='tab-pane fade'>"; $tab3 .="<h4> Noticias del mes actual</h4>";  $tab3 .="Hola 2"; $tab3 .=" </div>";  $tab4  ="<div id='menu3' class='tab-pane fade'>"; $tab4 .="<h4> Noticias de este a�o</h4>";  $tab4 .="Hola 2"; $tab4 .=" </div>";   //$unModal =$unEncabezado."</br>";  //$lstHeader = array("Hoy", "Ultimos 7 d�as", "Este mes","Abril");  //$lstaHref  = array("home","menu1",          "menu2",   "menu3"); //$unModal .= $this->GeneraTap ( $lstHeader ,  $lstaHref    ); //$unModal.= $this->GeneraTapPanel(); //$unModal.= $sBotones; //$unModal.= $tab1; //$unModal.= $tab2; //$unModal.= $tab3; //$unModal.= $tab4; //$unModal.= $this->GeneraTapPanelEnd(); //$unModal.= "</br>"; return $tablaBuscadorCampo;  // return $tablaBuscadorCampo;}public function GeneraModalFormPrintFeed(){ $unModal = ""; $unModal.= $this->GeneraModalFormPrintHeader("myModalForm"); $unModal.= $this->GeneraAgregarFeed(); $unModal.= $this->GeneraModalFormPrintFootherHeader( ) ; $unModal.= $this->GeneraBotom("AgregaFeed",    "AgregaFeed()","Agregar",   "btn btn-warning","glyphicon glyphicon-copy","Agrega un Feed" ); $unModal.= $this->GeneraBotom("ActualizaFeed", "updateFeed()","Actualizar","btn btn-primary","glyphicon glyphicon-copy","Actualiza los datos del Feed" ); $unModal.=$this->GeneraModalFormPrintFootherInicio( ) ; return $unModal;}public function ImprimeListaEnEXcelFeed( $listaC ){header('Content-Type: text/html; charset=iso-8859-1');require_once "/../reportes/CreaExcelFeed.php"; $unExcel = new ExcelFeed(); /* Encabezados del reporte */ $listaHeader = array( " Image_link "," Image_title "," Image_url "," Image_width "," Image_height "," Imagelink "," Permalink "," Title "," Description "," Sourcepermalink "," Sourcetitle "," Date "," Categories " ); /* Campos de la base de datos para el reporte */ $listaCampos = array( "Image_link","Image_title","Image_url","Image_width","Image_height","Imagelink","Permalink","Title","Description","Sourcepermalink","Sourcetitle","Date","Categories" ); return $unExcel->CreaExcelFeed( $listaC, $listaHeader, $listaCampos);}public function GeneraAgregarFeed(  ){ $AgregarAsig     = ""; $unInputGrupSize = "input-group input-group-lg"; $unInputGrupSize = ""; $sType           = "text"; // text email number $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Image_link","Encabezado Image_link" ,"Ayuda Image_link","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Image_title","Encabezado Image_title" ,"Ayuda Image_title","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Image_url","Encabezado Image_url" ,"Ayuda Image_url","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Image_width","Encabezado Image_width" ,"Ayuda Image_width","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Image_height","Encabezado Image_height" ,"Ayuda Image_height","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Imagelink","Encabezado Imagelink" ,"Ayuda Imagelink","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Permalink","Encabezado Permalink" ,"Ayuda Permalink","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Title","Encabezado Title" ,"Ayuda Title","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Description","Encabezado Description" ,"Ayuda Description","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Sourcepermalink","Encabezado Sourcepermalink" ,"Ayuda Sourcepermalink","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Sourcetitle","Encabezado Sourcetitle" ,"Ayuda Sourcetitle","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Date","Encabezado Date" ,"Ayuda Date","glyphicon-user",$sType,$unInputGrupSize); $AgregarAsig.= $this->GeneraTextInputBostrapConIcono("Categories","Encabezado Categories" ,"Ayuda Categories","glyphicon-user",$sType,$unInputGrupSize);/* $AgregarAsig .= "<h5>".utf8_decode( "Genero")." </h3> ";   $AgregarAsig .= "<div class='input-group'>";   $AgregarAsig .= " <span class='input-group-addon'> <span class='glyphicon glyphicon-book'> </span> </span>";   $AgregarAsig .= " <select class='form-control' id='Genero'>";   $AgregarAsig .= "   <option>"."Femenino"." </option>";   $AgregarAsig .= "   <option>"."Masculino"." </option>";   $AgregarAsig .= " </select>";   $AgregarAsig .= "</div> ";*/ $AgregarAsig .= " <input type='hidden' id='id' value=0 />"; return $AgregarAsig;}public function ImprimeFeed($sDatosFeed = null ,  $sMsg = "Editando"){ if ( !isset($sDatosFeed  ) )      $sDatoFeed = null; if ( !is_array($sDatosFeed ) )  $sDatoFeed = null;  else {   /* Se valida si solo se paso algun arreglo parcial*/  //if ( isset( $sDatosFeed['referencia']  ) )  //     $sDatosFeed= $sDatosFeed['referencia'] ;  /* Bandera para unificar el arreglo*/  if ( !isset( $sDatosFeed['idFeed']  ) )       $sDatosFeed = null; } /* */ if ( $sDatosFeed== null) {   /*   `IDViewFeed`, `idFeed`, `idResive`, `idEntrega`,   `Importe`, `Aplicado`, `Cambio`, `Descripcion`, `idConcepto`, `idRegistro`,   `Fecha`, `EnAcientos`, `Concepto`,   `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `referencia`, `DesRegistro`, `NombreEntrega`  */   $sNombresBase  =  "";   $sNombresBase .="IDViewFeed|idFeed|idResive|idEntrega|NombreResive|";    $sNombresBase .="Image_link|Image_title|Image_url|Image_width|Image_height|Imagelink|Permalink|Title|Description|Sourcepermalink|Sourcetitle|Date|Categories|";   $sNombresBase .="DespliegaMSG|";    // IDemitida|Emitida;   $sDatosFeed = $this->GetArrayFromNombres($sNombresBase );    // Valores por omicion para que sean numeros;   $sDatoFeed["Importe"]   = 0; };  if ( $sDatosFeed["DespliegaMSG"] == "");        $sDatosFeed["DespliegaMSG"] = $sMsg; //$sDatosFeed["IDentrada"] =$DatosRegistro["IDentrada"];;/*\__________PASAMOS EL ARREGLO A MAYUSCULAS________\*/;// $sDatosFeed = array_map('strtoupper', $sDatoAsiento); /*\_________________________________________________\*/;  $NombresValiables = "Importe|Aplicado|Cambio";  Formato_PesosFromArray($sDatosFeed, $NombresValiables  ); if ( $sDatosFeed['idEntrega'] == "" ) {  $ejecutivo =""; } $sDatosFeed['idEntrega'] = $_SESSION["UserId"]; //$SelTipoCaja    = TextoABool ( $sDatosFeed['EnAcientos'] ); //$SelNoTipoCaja  = NiegaUnBool( $SelTipoCaja ) ; //$NomTipoCaja    = "TipoCaja";   /* Esta funcion le dice a PHP que lo que sige sera interpetado y guardado en un vector */ ?> <?php ob_start(); ?><ul class="nav nav-tabs">  <li class="active"><a data-toggle= "tab" href= "#home">Datos del Alumno(a)</a></li>  <!--  <li><a data-toggle="tab" href="#menu1">Feed</a></li> --></ul> <fieldset> <?php //echo $this->ImprimeMensage(  $sDatosFeed["DespliegaMSG"]  ) ; ?> </fieldset><div class="panel-body"><div id="myForm" name="myForm" > <div class="tab-content">  <div id="home" class="tab-pane fade in active">      <h3>Datos del Feed</h3>  <fieldset>    <!-- Se pueden generar los controles y asignales el valor de array(creador de formularios: http://getbootstrap.com/css/#forms-control-sizes) --> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Image_link</label>   <div class='col-sm-10'>  <input class='form-control' name='Image_link' id='Image_link' placeholder='Image_link' required='' type='text'  value="<?php echo $sDatoFeed['Image_link']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Image_title</label>   <div class='col-sm-10'>  <input class='form-control' name='Image_title' id='Image_title' placeholder='Image_title' required='' type='text'  value="<?php echo $sDatoFeed['Image_title']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Image_url</label>   <div class='col-sm-10'>  <input class='form-control' name='Image_url' id='Image_url' placeholder='Image_url' required='' type='text'  value="<?php echo $sDatoFeed['Image_url']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Image_width</label>   <div class='col-sm-10'>  <input class='form-control' name='Image_width' id='Image_width' placeholder='Image_width' required='' type='text'  value="<?php echo $sDatoFeed['Image_width']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Image_height</label>   <div class='col-sm-10'>  <input class='form-control' name='Image_height' id='Image_height' placeholder='Image_height' required='' type='text'  value="<?php echo $sDatoFeed['Image_height']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Imagelink</label>   <div class='col-sm-10'>  <input class='form-control' name='Imagelink' id='Imagelink' placeholder='Imagelink' required='' type='text'  value="<?php echo $sDatoFeed['Imagelink']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Permalink</label>   <div class='col-sm-10'>  <input class='form-control' name='Permalink' id='Permalink' placeholder='Permalink' required='' type='text'  value="<?php echo $sDatoFeed['Permalink']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Title</label>   <div class='col-sm-10'>  <input class='form-control' name='Title' id='Title' placeholder='Title' required='' type='text'  value="<?php echo $sDatoFeed['Title']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Description</label>   <div class='col-sm-10'>  <input class='form-control' name='Description' id='Description' placeholder='Description' required='' type='text'  value="<?php echo $sDatoFeed['Description']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Sourcepermalink</label>   <div class='col-sm-10'>  <input class='form-control' name='Sourcepermalink' id='Sourcepermalink' placeholder='Sourcepermalink' required='' type='text'  value="<?php echo $sDatoFeed['Sourcepermalink']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Sourcetitle</label>   <div class='col-sm-10'>  <input class='form-control' name='Sourcetitle' id='Sourcetitle' placeholder='Sourcetitle' required='' type='text'  value="<?php echo $sDatoFeed['Sourcetitle']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Date</label>   <div class='col-sm-10'>  <input class='form-control' name='Date' id='Date' placeholder='Date' required='' type='text'  value="<?php echo $sDatoFeed['Date']; ?>" >   </div> </div> <div class='form-group'>  <label for='ClaveProfesor' class='control-label col-sm-2'>Categories</label>   <div class='col-sm-10'>  <input class='form-control' name='Categories' id='Categories' placeholder='Categories' required='' type='text'  value="<?php echo $sDatoFeed['Categories']; ?>" >   </div> </div>  </fieldset> </div>   <div id='menu1' class='tab-pane fade'>     <h3>Lista de  Feed</h3> <?php /*  Posible Listado */       /*        $sDatosyDetalle  =$this->GeneraAnclaEstiloBotom(....);        $sDatosyDetalle.= $this->ListadoConbuscadorAlumnos();        $sDatosyDetalle.= $this->LoadFuncionFromJQ("CargaTodosAlumnos()");        $sDatosyDetalle.= $this->GeneratxtSearchEnter("editbox_searchAlumno","doSearchAlumno");         echo $sDatosyDetalle;        */         ?>   </div> </div></div></div> <?php $contenido = ob_get_clean() ?> <?php /* Fin de  ejecucion de codigo PHP*/ unset( $sDatosFeed ); return $contenido;}}?>