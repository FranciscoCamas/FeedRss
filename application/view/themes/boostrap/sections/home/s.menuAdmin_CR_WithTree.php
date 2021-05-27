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


  //echo $UnMenuArm;
?>

         <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-time">
                            </span> Historial</a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td> 
                                        <span class="glyphicon glyphicon glyphicon-time"></span><a  onclick="doSearchFeedFecha('')" > Hoy</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon glyphicon-time"></span><a> &Uacute;ltimos 7 d&iacute;as</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon glyphicon-time"></span><a onclick="doSearchFeedFecha('mesact')"> Este Mes</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon glyphicon-time"></span><a onclick="doSearchFeedFecha('mesant')"> Abril</a>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>
                                                  
                            <ul id="tree2">
                            <li><a > <span class="glyphicon glyphicon glyphicon-time"></span><a  onclick="doSearchFeedFecha('')" > Hoy</a></a></li>
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
                                    </td>
                                </tr>
                                
                            </table>
                 
                        </div>
                    </div>
                </div>
                
        
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne2"><span class="glyphicon glyphicon-home">
                            </span> Local</a>
                        </h4>
                    </div>
                    <div id="collapseOne2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file text-primary"></span><a  onclick="doSearchFeedEsp('El Diario de Yucatan')"> Diario de Yucat&aacute;n</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td> 
                                        <span class="glyphicon glyphicon-file text-success"></span><a onclick="doSearchFeedEsp('Yucatan - PorEsto')"> Por Esto</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                
                
                
                
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-globe">
                            </span> Internacional</a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse">
                        <div class="panel-body">
                           <table class="table">
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file text-primary"></span><a onclick="doSearchFeedEsp('Top stories - Google News')"> Google News</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="glyphicon glyphicon-file text-success"></span><a onclick="doSearchFeedEsp('The New York Times en Espa')"> New York Times</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-refresh">
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
                                    <span class="glyphicon glyphicon-download-alt text-primary"></span><a onclick="UpdateAllFeed('https://www.yucatan.com.mx/feed')"> Diario de Yucat&aacute;n</a>
                                    

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <span class="glyphicon glyphicon-download-alt text-primary"></span><a onclick="UpdateAllFeed('https://www.poresto.net/rss/feed.html?r=1')"> Por Esto</a>
                                    </td>
                                </tr> 
                                
                               </tr>
                                <tr>
                                    <td>
                                    <span class="glyphicon glyphicon-download-alt text-primary"></span><a onclick="UpdateAllFeed('https://news.google.com/rss?topic=h&hl=en-US&gl=US&ceid=US:en')"> Google News</a>
                                    </td>
                                </tr>
                               <tr>
                                    <td>
                                    <span class="glyphicon glyphicon-download-alt text-primary"></span><a onclick="UpdateAllFeed('https://rss.nytimes.com/services/xml/rss/nyt/es.xml')"> New York Times</a>
                                    </td>
                                </tr>
                                  
                            </table>
                        </div>
                    </div>
                </div>
              
                <div class="panel panel-default">
                     <div class="panel-heading">
                         <h4 class="panel-title">
                         
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon glyphicon-cog">
                            </span> Configuraci&oacute;n</a>
                       
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
      