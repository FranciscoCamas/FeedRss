<?php
/**
 * Controlador para la pagina de busqueda por AJAX
 */
 require_once 'mvc.controller.php';
class ctrlPostEntidad extends mvc_controller
{


  var $CampoID   ="id";
  var $NomCampos = "";


 /** Constructor de clase */
 public function __construct() { }


 public  function GetBaseObjeto(  ){
		//var $sTiposDeDatos = $this->listaDeTiposCampos( $table );

	$sListaVariables = $this->NomCampos;

	$sListaVariables = str_replace(" ", "",$sListaVariables );

  return $this->GetArrayFromNames($sListaVariables );

 }

public  function GetBaseObjetoByPOTS(  ){
		//var $sTiposDeDatos = $this->listaDeTiposCampos( $table );

	$sListaVariables = $this->NomCampos;

	$sListaVariables = str_replace(" ", "",$sListaVariables );

  return $this->GetArrayFromPOST($sListaVariables,"|");

}


public  function GetIDByPost( $nomCampID ="" ){
		//var $sTiposDeDatos = $this->listaDeTiposCampos( $table );
		$UnId = 0;

	 $nomCampID = str_replace(" ", "",$nomCampID );

	 if($nomCampID == "" ) $nomCampID = $this->CampoID;

   $nomCampID = str_replace(" ", "",$nomCampID );

   if($nomCampID == "" )   $nomCampID = "id";

	  if ($_SERVER['REQUEST_METHOD'] == 'POST')
       $UnId= ( isset($_POST[$nomCampID]) ) ? htmlspecialchars($_POST[$nomCampID]) :0;

   return $UnId;

}

public function GetPassByPost( $nomVar ="" ){
 //var $sTiposDeDatos = $this->listaDeTiposCampos( $table );
 $UnId = 0;
	
 $nomVar = str_replace(" ", "",$nomVar );
	
 if ( $nomVar != "" )
	 if ( $_SERVER['REQUEST_METHOD'] == 'POST') 
       $UnId= ( isset($_POST[$nomVar]) ) ? $_POST[$nomVar] :0;  
    
    $UnId=utf8_decode($UnId);
    
   return $UnId; 
   
}

public function GetVarByPost( $nomVar ="" ){
 //var $sTiposDeDatos = $this->listaDeTiposCampos( $table );
 $UnId = 0;

 $nomVar = str_replace(" ", "",$nomVar );

 if ( $nomVar != "" )
	 if ( $_SERVER['REQUEST_METHOD'] == 'POST')
       $UnId= ( isset($_POST[$nomVar]) ) ? htmlspecialchars($_POST[$nomVar]) :0;
    // En server
   $UnId=utf8_decode($UnId);

   return $UnId;

}
 /* ============================================================================= *\
  GetArrayFromSession
                      Recupera las variables de session de un  y las pasa a un arreglo

  $sListaVariables cadena que contiene los nombres de las variables a rescatar de
                  del arreglo $_SESSION (Nombre de las variables de session )
  $sSeparador      Separador del arreglo anterior
  $ImpValores      Si se imprimen o no los valores, mientras son  rescatados
\* ============================================================================= */
function GetArrayFromSession($sListaVariables="", $sSeparador = "|" ) {

  $sDatosARegresar=array();

  $sListaVariables = str_replace(" ", "",$sListaVariables );

 if( $sListaVariables == "" )
		  $sListaVariables = $this->NomCampos;

   $sDatos = explode($sSeparador,$sListaVariables);

   foreach( $sDatos as $key => $value)
		$sDatosARegresar[$value] = ( isset($_SESSION[$value])  ) ? htmlspecialchars($_SESSION[$value ]):"";
			     //$sDatosARegresar[$sDatos[$key]] = $_SESSION [$value];

	return $sDatosARegresar;

}

/* ============================================================================= *\
  GetArrayFromSession
                      Recupera las variables de session de un  y las pasa a un arreglo

  $sListaVariables cadena que contiene los nombres de las variables a rescatar de
                  del arreglo $_SESSION (Nombre de las variables de session )
  $sSeparador      Separador del arreglo anterior
  $ImpValores      Si se imprimen o no los valores, mientras son  rescatados
\* ============================================================================= */
function GetArrayFromPOST($sListaVariables="", $sSeparador = "|") {

  $sDatosARegresar=array();

  $sListaVariables = str_replace(" ", "",$sListaVariables );

  /*
 if( $sListaVariables == "" )
		  $sListaVariables = $this->NomCampos;
		*/
  $sDatos = explode($sSeparador,$sListaVariables);
   $ImpValores =true;
  // if( $ImpValores ) {echo " Indice=".$sDatos [$key]." Valor=".$value."<br>";}
   // {echo " Indice=".$sDatos [$key]." Valor=".$value."<br>";}
   //{echo " Indice=".$sDatos [$key]." Valor=".$value."<br>";}

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
    foreach( $sDatos as $key => $value)
    $sDatosARegresar[$value] =  ( isset($_POST[$value])  ) ? utf8_decode( htmlspecialchars($_POST[$value ])):"";

	return $sDatosARegresar;

}

function GetArrayFromNames($sListaVariables, $sSeparador = "|") {

 $sDatosARegresar=array();

 $sListaVariables = str_replace(" ", "",$sListaVariables );


 $sDatos = explode($sSeparador,$sListaVariables);

  //if( $ImpValores ) {echo " Indice=".$sDatos [$key]." Valor=".$value."<br>";}
  foreach( $sDatos as $key => $value)
			     $sDatosARegresar[$value] = "";

	return $sDatosARegresar;

}

/*Funcion para agregar Clase Hija*/


}//--> fin clase

?>