<?php
if (PHP_SAPI == 'cli')
    die('Este archivo solo se puede ver desde un navegador web');
    
define( '__KEY__',         'P3rz0n41'   );
define( '__THEME__',       'boostrap');
define( '__THEMEFOLDER__', 'themes/' );

define( '__MODEL__',      'application/model/'     );
define( '__CONTROLLER__', 'application/controller/');
define( '__VIEW__',       'application/view/'      );

//$EnServerDB =  !is_file( __MODEL__."Mahshoki.php" ) ;
$EnServerDB =  include(__MODEL__."Mahshoki.php");
$unURL = ( $EnServerDB  ) ?   'http://localhost/FeedRss/':'https://www.algunserver.com.mx/FeedRss/' ;

define( '__URL__',         $unURL    );
define( '__FULL_URL__', __URL__.__VIEW__.__THEMEFOLDER__. __THEME__ .'/' );
define( '__AJAX_MODULES__',getcwd()."/application/view/themes/boostrap"    );
/* cARPETAS NECESARIAS PARA LA VISTA*/
define( '__THEME_DIR__', __VIEW__.__THEMEFOLDER__.__THEME__ .'/'         );
define( '__MODULES__',   __VIEW__.__THEMEFOLDER__.__THEME__ .'/modules/' );
define( '__JS_DIR__',    __VIEW__.__THEMEFOLDER__.__THEME__ .'/js/'      );
define( '__SECTIONS__',  __VIEW__.__THEMEFOLDER__.__THEME__ .'/sections/');
define( '__IMAGENES__',  __VIEW__.__THEMEFOLDER__.__THEME__ .'/images/'  );
define( '__DIST__',      __VIEW__.__THEMEFOLDER__.__THEME__ .'/dist/'    );
define( '__CSS__',       __VIEW__.__THEMEFOLDER__.__THEME__ .'/css/'     );
define( '__CLASES__',    __VIEW__.__THEMEFOLDER__.__THEME__ .'/Classes/' );
?>