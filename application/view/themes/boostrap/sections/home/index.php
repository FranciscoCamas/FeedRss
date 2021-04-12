<?php
if (PHP_SAPI == 'cli') die('Este archivo solo se puede ver desde un navegador web');

include "../../../../../controller/validaSesionUsuario.php";
ValidaYRedirecciona("../../index.php?load=login");

$redirect ="../../../../../../index.php?load=login";
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

}
?>