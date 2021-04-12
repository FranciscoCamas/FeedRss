<?php
/* ===[ Archivos para acceder al controlador y a la vista  ]=== */
if (PHP_SAPI == 'cli')
    die('Este archivo solo se puede ver desde un navegador web');
return array(
             'ControladorPag'       => __CONTROLLER__.'pageCtrl.php',             
             'Noticia'              => 'Noticia',
             'Feed'                 => 'Feed',
             'in'                   => __MODULES__.'m.mainRingMenu.php',
             'login'                => __MODULES__.'m.login.php',
						 'exit'                 => __CONTROLLER__.'CerrarSession.php'
              );
?>