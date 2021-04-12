<?php
if (PHP_SAPI == 'cli') die('Este archivo solo se puede ver desde un navegador web');

include "controller/validaSesionUsuario.php";
ValidaYRedirecciona("../index.php?load=login");


switch($_SERVER["REQUEST_METHOD"]) {

    case "GET":
           Redirecciona("../index.php?load=login");
          break;

    case "POST":
          Redirecciona("../index.php?load=login");
          break;

    case "PUT":
          Redirecciona("../index.php?load=login");
          break;

}
?>