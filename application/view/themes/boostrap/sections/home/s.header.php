<?php
  $bienvenido = "Bienvenido: Usuario Desconocido, se te recuerda que tus actividades estan siendo monitoeradas <(0)>";
  if ( isset( $_SESSION["username"]) )  $bienvenido = "Bienvenid@ : ".$_SESSION['username'];
      //$bienvenido .=  ($_SESSION['Genero'] == "Femenino") ? "a":"o";
?>
<nav class="navbar navbar-static-top navbar-custom" role="navigation" style="margin-bottom: 0"><div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="#">
<img alt="" src="<?php echo __IMAGENES__."feed-rss-1-1.png";?>"  width="50" height="50"></a><p class="navbar-text">  <?php  echo  "Noticias RSS"; ?> </p></div>
<div class="collapse navbar-collapse navbar-ex1-collapse navbar-right"><ul class="nav navbar-nav "><li> <a > <i class="fa fa-user fa-fw"> </i> 
 <?php echo "Bienvenid@"//$bienvenido;?> </a>
</li><li>

</li><li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li></ul></div><div><div class="navbar-default sidebar " role="navigation">
<div class="sidebar-nav navbar-collapse"> <!--#MENULEFT#--></div></div></div></nav>