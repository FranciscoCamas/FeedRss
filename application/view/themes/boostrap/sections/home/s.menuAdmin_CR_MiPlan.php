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
  $UnMenuArm.=$sMenuInicio;
  $UnMenuArm.=$sMenu;
  //$UnMenuArm.=$sSubMenu;
  $UnMenuArm.=GeneraLink("#","fa fa-question-circle fa-fw"," Preguntas frecuentes");
  $UnMenuArm.=$sMenuFin;


  echo $UnMenuArm;
?>

        
        
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-folder-close">
                            </span>Content</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a>Articles</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-flash text-success"></span><a>News</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file text-info"></span><a>Newsletters</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-comment text-success"></span><a>Comments</a>
                                        <span class="badge">42</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                            </span>Modules</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        Orders <span class="label label-success">$ 320</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Invoices
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Shipments
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       Tex
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-user">
                            </span>Account</a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        Change Password
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Notifications <span class="label label-info">5</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Import/Export
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-trash text-danger"></span><p class="text-danger">
                                            Delete Account</p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
              
                <div class="panel panel-default">
                     <div class="panel-heading">
                         <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-file">
                            </span>Reports</a>
                         </h4>
                     </div>
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-usd"></span>Sales
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-user"></span>Customers
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-tasks"></span>Products
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-shopping-cart"></span>Shopping Cart
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
               
                
            </div>
      