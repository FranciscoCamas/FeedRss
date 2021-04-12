<?php  //session_start();?>
<?php
if (PHP_SAPI == 'cli') die('Este archivo solo se puede ver desde un navegador web');

function EsUsuarioValido()
{

 $redirecionar = false;

 if ( isset($_SESSION["username"] )  )
   if ( $_SESSION["username"]  != "" )
       $redirecionar = true;

   $_SESSION["redirecionar"] = $redirecionar;

  return $redirecionar;
}

function EsUsuarioConPrivilegios()
{

 $redirecionar = false;

 if ( isset($_SESSION["Matricula"] )  )
   if ( $_SESSION["Matricula"]  === "" )
          $redirecionar = true;

   $_SESSION["redirecionar"] = $redirecionar;

  return $redirecionar;
}


//Valiadacion : si el usuario se a registrado
function Redirecciona($PaginaAutentificar = "../../index.php?load=login")
{
  $sNomPag = "";
  if ( isset($_SESSION["mienlace"] )  )
  $sNomPag = str_replace( $_SESSION["mienlace"],".php","" );

  if ( $sNomPag != "") $sNomPag.= "a: '".$sNomPag."' ";

  if ( ! isset ($_SESSION["MsgPaginaAnterior"] ) )
   $_SESSION["MsgPaginaAnterior"]  = "Para Ingresar ".$sNomPag." necesita idenfiticarse.";

  $_SESSION["username"]           = "Re" ;
  header('Location:'.$PaginaAutentificar);

  //require_once 'CerrarSession.php';
}

//Valiadacion : si el usuario se a registrado
function ValidaYRedirecciona($PaginaAutentificar = "../../index.php?load=login")
{

 if ( ! EsUsuarioValido() )
  Redirecciona($PaginaAutentificar);

}

//Valiadacion : si el usuario se a registrado
function ValidaYRedireccionaUsuarioAdm($PaginaAutentificar = "../../index.php?load=login")
{

 if ( ! EsUsuarioValido() )
  Redirecciona($PaginaAutentificar);

if (! EsUsuarioConPrivilegios() )
  Redirecciona($PaginaAutentificar);

}


    
function is_cli()
{
	if( defined('STDIN') )
	{
		return true;
	}
	
	if( empty($_SERVER['REMOTE_ADDR']) and !isset($_SERVER['HTTP_USER_AGENT']) and count($_SERVER['argv']) > 0) 
	{
		return true;
	} 
	
	return false;
}

?>