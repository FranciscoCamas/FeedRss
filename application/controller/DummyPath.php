<?php  session_start();?>
<?php
if (PHP_SAPI == 'cli') die('Este archivo solo se puede ver desde un navegador web');

require_once "../validaSesionUsuario.php";
$PathReingresar = "../../../index.php?load=login";
$PathModel      = "../../model/";
$PathControl    = "../../controller/";
$PathModule     = "../../view/themes/boostrap/modules/";
$PathImages     = "../../view/themes/boostrap/imagenes/";

$PathMail       = "../../view/themes/boostrap/mail/";

$Buffer         = "php://input";
ValidaYRedirecciona($PathReingresar);
$config         = include( "../../model/config.php");

function getBuffer(&$_Shearching)
{
  $unBuffer         = "php://input";
  parse_str(file_get_contents($unBuffer), $_Shearching);
}


function getBufferData()
{
   $unBuffer    = "php://input";          
   return file_get_contents($unBuffer);
}

function ImprimeJSON($PorImprimir)
{
  header("Content-Type: application/json");
  echo json_encode($PorImprimir);
}


           
?>