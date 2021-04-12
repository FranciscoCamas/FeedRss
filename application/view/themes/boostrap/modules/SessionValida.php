<?php  session_start();?>
<?php
if (PHP_SAPI == 'cli') die('Este archivo solo se puede ver desde un navegador web');

$redirect ="../../../../../index.php?load=login";
switch($_SERVER["REQUEST_METHOD"]) {

    case "GET":
           Redirecciona($redirect);
          break;

    case "POST":
          Redirecciona($redirect);
          break;

    case "PUT":
          Redirecciona($redirect);
          break;

    case "_":
         $esValido = "0";
         //$sCampFiltro = 'Matricula';
         $sCampFiltro = 'username';
         if ( isset($_SESSION [$sCampFiltro]) )
           if ( $_SESSION [$sCampFiltro] != ""  )
              $esValido = "1";

           echo "{"."isvalid".":".$esValido."}";
     break;

}
?>