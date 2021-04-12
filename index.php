<?php  session_start();?>
<?php
if (PHP_SAPI == 'cli')
    die('Este archivo solo se puede ver desde un navegador web');

require_once "constantes.php";

if( !is_dir( __THEME_DIR__ ) ){
    echo "[".__THEME_DIR__ ."]";
    die('Error Fatal: Theme no existe!!!');
}

$DefaultHeader = "home/s.headerLogin.php";
$porOmcion     = true;
$rutaModel     = "Modelo";
$rutaCtrl      = "Control";
$rutaView      = "Vista";
$NomControl    = "controller";
$NomAccion     = "action";
$mapArchivos   = include("mapArchivos.php");
$mapPaginas    = include("mapPaginas.php");

$mapMensages = array(
             $mapPaginas['login'] => "Por Favor Identifiquese.",
             'in'                 => "Bienvenido.",
			       'checkIn'            => "Comprobando identidad.",  //'in'             => __MODULES__.'m.WCircleMenu.php', /*pendite */
						 'exit'               => ' Se ha cerrardo Session de manera correcta.'
              );

include_once( $mapPaginas["ControladorPag"] );

$pageCtrl = new pageCtrl();

  /* Por omicion Se trae el historial de los Feeds, por ahora no hay más modulos disponibles*/
  $porOmcion= false;
  $ForLoad="load";    
  $pagina = "Feed";
  $NomAccion =  "Inicia" ;
  $pageCtrl->IniciaContestoYMetodo( $mapArchivos[$pagina], $mapArchivos[$pagina][$NomControl],$NomAccion );

/* Se conserva la estructura por si es necesario agregar mas modulos*/  
if ( isset ($_SESSION["username"] ) )
if ( isset ($_SESSION["username"] ) !="" ){
 
 if( $_POST )
   if( isset( $_POST['ajax'] ) and isset( $_POST['ctrl'] )  )
     if( $_POST['ajax'] != ''  and  $_POST['ctrl'] != '' ) {            
         $pageCtrl->IniciaContestoYMetodo($mapArchivos[ $_POST['ctrl'] ],$mapArchivos[ $_POST['ctrl'] ][$NomControl ],$_POST['ajax'] );                
         $porOmcion= false;
     }

 $ForLoad =( $_GET ) ?  array_keys ($_GET)  [0]:"" ;
  
  $ForLoad="ninguno"; 
  switch($ForLoad ) {

           case "load":
                 $pagina = $mapPaginas[$_GET['load']];
                 
                 if ( isset($mapArchivos[$pagina] )) {                                       
                      $NomAccion =  "Inicia" ;                    
                      $pageCtrl->IniciaContestoYMetodo( $mapArchivos[$pagina], $mapArchivos[$pagina][$NomControl],$NomAccion );
                   } else
                     if ( isset($mapMensages[$pagina] ))
                        $pageCtrl->load( $pagina, $mapMensages[$pagina] , $DefaultHeader  );     // si no lo hat caragmos la pagina
                      else
                        $pageCtrl->load( $pagina );     // si no lo hat caragmos la pagina
                 $porOmcion= false;
                 break;
   
           case "ctrl":
                 $NomAccion="IniciaYVe";      
                 $pageCtrl->IniciaContestoYMetodo($mapArchivos[ $_GET['ctrl'] ],$mapArchivos[ $_GET['ctrl'] ][$NomControl ],$NomAccion );               
                 $porOmcion= false;
                 break;
       
           case "action":
                 $pagina = $mapPaginas[ $_GET['action'] ];            
                 $_SESSION["MsgPaginaAnterior"] = " A Finalizado la session de forma correcta !!!";
                 $pageCtrl->load( $pagina, "Comprobando identidad" , $DefaultHeader  );     // si no lo hat caragmos la pagina
                 $porOmcion= false;
                 break;    
   }
}     

if ($porOmcion)
     $pageCtrl->load( $mapPaginas['login'] , "Bienvenido",$DefaultHeader);
    
$porOmcion= true;

unset( $pageCtrl );
?>