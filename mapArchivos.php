<?php
/* ===[ Archivos para acceder al controlador y a la vista  ]=== */
if (PHP_SAPI == 'cli')
    die('Este archivo solo se puede ver desde un navegador web');
return array(                                                        

  'Noticia' => array( $NomControl =>'ctrlNoticia',
                            $rutaModel  =>__MODEL__."cdt.Noticia.php",
                            $rutaCtrl   =>__CONTROLLER__."Noticias/ctrl.Noticias.php" ,
                            $rutaView   =>__MODULES__.'viewNoticia.php'),                                                 
   'Feed' => array( $NomControl =>'ctrlFeed',
                            $rutaModel  =>__MODEL__."cdt.Feed.php",
                            $rutaCtrl   =>__CONTROLLER__."Feeds/ctrl.Feeds.php" ,
                            $rutaView   =>__MODULES__.'viewFeed.php')
);
?>