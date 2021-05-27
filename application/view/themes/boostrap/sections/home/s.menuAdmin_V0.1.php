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
                            </span> Local</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-pencil text-primary"></span><a> Diario de Yucatan</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-flash text-success"></span><a> Por Esto</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file text-info"></span><a> De Peso</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-comment text-success"></span><a data-toggle="collapse" data-target="#demo"> Comments</a>
                                        <span class="badge">42</span>
                                        <div id="demo" class="collapse">
    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
  </div>
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
                            </span> Internacional</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        Google News <span class="label label-success">$ 320</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        New York Times
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
                            </span> 
                            
                             Actualizar Feeds
                             
                             
                             </a>
                        </h4>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon  glyphicon-cloud-download text-info"></span><a class="text-info"> Descargar y Actualizar Feeds</a>
                                        
                                         
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="button" class="btn btn-info " name="BuscaFeed"   id="BuscaFeed" data-toggle="tooltip" title="Descarge los Feeds RSS de la pagina de su eleccion" onclick="UpdateAllFeed('')" >
 <span class="glyphicon glyphicon-cloud-download"></span> Descargar Feeds </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                         <div class='input-group-btn'> 
 <a class="btn btn-warning" name="ReiniciarFeeds" id="ReiniciarFeeds"data-toggle="tooltip" 
 title="Descarga los Fedd RSS del Diario de Yucat&aacute;n" 
 onclick="UpdateAllFeed('https://www.yucatan.com.mx/feed')" > 
 <span class="glyphicon glyphicon-download-alt"></span>Diario de Yucat&aacute;n  </a> <
 /div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                     <div class='input-group-btn'> 
 <a class="btn btn-warning" name="ReiniciarFeeds" id="ReiniciarFeeds"data-toggle="tooltip" 
 title="Descarga los Fedd RSS de PorEsto" onclick="UpdateAllFeed('https://www.poresto.net/rss/feed.html?r=1')" >     
 <span class="glyphicon glyphicon-download-alt"></span> Refrescar Por Esto  </a> 
 </div>
 
                                        <span class="glyphicon glyphicon-trash text-danger"></span><a class="text-danger"> Limpiar historial</a>
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
                            </span>configuracion</a>
                         </h4>
                     </div>
                     
                    <div id="collapseFour" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                               
                                
                                <tr>
                                    <td>
                                         
 
 <div class="form-group">
    <label for="exampleFormControlTextarea1">Escriba una direccion y descarge</label>
  <textarea class="form-control" id="editboxBuscaFeed" rows="3">https://news.google.com/rss?topic=h&hl=en-US&gl=US&ceid=US:en</textarea>
  
 <button type="button" class="btn btn-info " name="BuscaFeed"   id="BuscaFeed" 
 data-toggle="tooltip" title="Descarge los Feeds RSS de la pagina de su eleccion" 
 onclick="UpdateAllFeed('')" > <span class="glyphicon glyphicon-cloud-download"></span> 
 Descargar Feeds </button>  </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       <div class='input-group-btn'> 
 <a class="btn btn-danger" name="LimpiarFeed" id="LimpiarFeed"data-toggle="tooltip" title="Borre el historial de noticias" onclick="DelAllFeed()" >     
  <span class="glyphicon glyphicon-floppy-remove"></span> Borrar historial  </a> 
  </div> 
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
               
                
            </div>
      