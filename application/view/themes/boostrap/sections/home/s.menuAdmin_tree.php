<?php
function GeneraLink($unLing, $UnIncono,$sTitle){
	  $sLink ="<li>";
    $sLink.="<a href=".chr(34).$unLing.chr(34)."><i class=".chr(34).$UnIncono.chr(34)."></i> ".$sTitle."</a>";
		$sLink.="</li>";
	  return $sLink;
}

 $sMenuInicio="<ul class=".chr(34)."nav ".chr(34)." id=".chr(34)."menu".chr(34).">";
    $sMenuFin="</ul>";
    $sSubMenu="";
      $sMenu="";

 if ( isset ($_SESSION["Role"] ) )
  if ( $_SESSION ['Role'] == "Adm" ){
      
      $MyLink = "index.php?load=";
      
      $sMenu.=GeneraLink($MyLink ."Noticia",          "fa fa-newspaper-o fa-fw"," Noticias");
      $sMenu.=GeneraLink($MyLink ."Feed",          "fa fa-newspaper-o fa-fw"," Feeds RSS");    
       
      $sSubMenu="";      $sSubMenuInicio ="<li>";
      $sSubMenuInicio.= "<a href=".chr(34)."#".chr(34).">";
      $sSubMenuInicio.=   "<i class=".chr(34)."fa fa-users fa-fw".chr(34)."></i>";
      $sSubMenuInicio.= "</a>";
      $sSubMenuInicio.= "<ul class=".chr(34)."nav nav-second-level".chr(34).">";

      $sSubMenuFin  ="</ul>";
      $sSubMenuFin.="</li>";

      $sSubMenu =$sSubMenuInicio.$sSubMenu.$sSubMenuFin;
   }

  $UnMenuArm ="";
  //$UnMenuArm.=$sMenuInicio;
  //$UnMenuArm.=$sMenu;
  //$UnMenuArm.=$sSubMenu;
  //$UnMenuArm.=GeneraLink("#","fa fa-question-circle fa-fw"," Preguntas frecuentes");
  

 $MyLink = "index.php?load=";
 $unArbol= "<ul id='tree1'>";

 $unArbol.=  "<li  ><a >Local</a>";
 $unArbol.=  "<ul>";
 $unArbol.=    "<li><a>Diario de Yucatan</a></li>";
 $unArbol.=    "<li><a>Por Esto</a></li>";
 $unArbol.=GeneraLink($MyLink ."Noticia",          "fa fa-newspaper-o fa-fw"," Noticias");
 $unArbol.= "</ul>"; 
 $unArbol.= "</li>";

 $unArbol.= "</ul>";   

$UnMenuArm.=$unArbol;

//$UnMenuArm.=$sMenuFin;

  echo $UnMenuArm;
?>

        
        
          <ul id="tree2">
                <li  ><a >Local</a>

                    <ul>
                        <li><a>Diario de Yucatan</a></li>
                        <li><a>Por Esto</a></li>
                         
                        <li>Employees
                            <ul>
                                <li>Reports
                                    <ul>
                                        <li>Report1</li>
                                        <li>Report2</li>
                                        <li>Report3</li>
                                    </ul>
                                </li>
                                <li>Employee Maint.</li>
                            </ul>
                        </li>
                        <li>Human Resources</li>
                    </ul>
                </li>
                <li><a>Internacional</a>
                    <ul>
                        <li>Company Maintenance</li>
                        <li>Employees
                            <ul>
                                <li>Reports
                                    <ul>
                                        <li>Report1</li>
                                        <li>Report2</li>
                                        <li>Report3</li>
                                    </ul>
                                </li>
                                <li>Employee Maint.</li>
                            </ul>
                        </li>
                        <li>Human Resources</li>
                    </ul>
                </li>
            </ul>
       