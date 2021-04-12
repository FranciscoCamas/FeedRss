<?php
class mvc_controller {

 var $etiqINIWRAPPER    ='/\<!--\#INIWRAPPER\#--\>/';
 var $etiqENDWRAPPER    ='/\<!--\#ENDWRAPPER\#--\>/';

 var $etiqHEADER        ='/\<!--\#HEADER\#--\>/';
 var $etiqFOOTER        ='/\<!--\#FOOTER\#--\>/';

 var $etiqTITLE         ='/\<!--\#TITLE\#--\>/';
 var $etiqMENULEFT      ='/\<!--\#MENULEFT\#--\>/';

 var $etiqCSS           ='/\<!--\#CSS\#--\>/';
 var $etiqSCRIPT        ='/\<!--\#SCRIPT\#--\>/';
 var $etiqSCRIPTAdd     ='/\<!--\#SCRIPTADICIONALES\#--\>/';
 var $etiqCSSAdd        ='/\<!--\#CSSADICIONALES\#--\>/';
 
 var $etiqContenido     ='/\<!--\#CONTENIDO\#--\>/';
 
 /* Estas son las Secciones que reemplazaran las etiquetas de arriba */
 var $LayOutPagina      ='principal.php';            //ok
 var $sectionsHEADER    ='home/s.header.php';        //
 var $sectionFOOTER     ='home/s.footer.php';

 var $sectionsMENULEFT  ='home/s.menuAdmin.php';

 var $sectionsINICIO    ='m.principal.php';
 var $sectionCCS        ='home/s.ccs.php';
 var $sectionSCRIPT     ='home/s.script.php';

 var $sectionINIWRAPPER ='home/s.headWrap.php';
 var $sectionENDWRAPPER ='home/s.pieWrap.php';

 var $SCRIPTADICIONALES ="";
 var $CSSADICIONALES    ="";

 public function __construct() { }
  
 function IniciaContexto($title="Pagina Principal",$htmlContenido =""){
		 if ( $_SESSION["username"]  == "" ){
         $_SESSION["mienlace"] = basename($_SERVER['PHP_SELF']);
         require __CONTROLLER__."validaSesionUsuario.php";
         ValidaYRedirecciona(__URL__);
     }

		if ($htmlContenido == "")
		$htmlContenido = $this->load_pagePHP(__MODULES__.$this->sectionsINICIO );

     if ( $this->sectionsMENULEFT != "" ){
       $WraperHeader  = $this->load_pagePHP(__SECTIONS__.$this->sectionINIWRAPPER );
   		 $WraperFoother = $this->load_pagePHP(__SECTIONS__.$this->sectionENDWRAPPER );
     }else {
       $WraperHeader  ="<div class=".chr(34)."container".chr(34)." >";
       $WraperHeader .=   "<div class=".chr(34)."row".chr(34).">";
       $WraperFoother =   "</div>";
       $WraperFoother.="</div> ";
     }

    $pagina = $this->load_template($title);
    $pagina = $this->replace_content($this->etiqINIWRAPPER, $WraperHeader , $pagina);
    $pagina = $this->replace_content($this->etiqContenido , $htmlContenido, $pagina);
    $pagina = $this->replace_content($this->etiqENDWRAPPER, $WraperFoother, $pagina);

    $this->view_page($pagina);
 }
	
 function load_template($title='Sin Titulo',  $header=''  ){

		$pagina = $this->load_pagePHP(__THEME_DIR__.$this->LayOutPagina);
    $pagina = str_replace("\\n","<br />",$pagina );
		
		if ( $header =="" ) $header =$this->sectionsHEADER;

    $pagina = $this->replace_content($this->etiqTITLE , $title , $pagina);
    $pagina = $this->replace_content($this->etiqHEADER, $this->load_pagePHP(__SECTIONS__.$header)              , $pagina);
    $pagina = $this->replace_content($this->etiqFOOTER, $this->load_pagePHP(__SECTIONS__.$this->sectionFOOTER ), $pagina);
		$pagina = $this->replace_content($this->etiqCSS   , $this->load_pagePHP(__SECTIONS__.$this->sectionCCS    ), $pagina);
    $pagina = $this->replace_content($this->etiqSCRIPT, $this->load_pagePHP(__SECTIONS__.$this->sectionSCRIPT ), $pagina);

    $pagina = $this->replace_content($this->etiqCSSAdd ,  ($this->CSSADICIONALES    !="" ? $this->GeneraInludeCSS()    : "" ), $pagina);
    $pagina = $this->replace_content($this->etiqSCRIPTAdd,($this->SCRIPTADICIONALES !="" ? $this->GeneraInludeScript() : "" ), $pagina);

    $mLeft  = ( $this->sectionsMENULEFT !="" ? $this->load_pagePHP( __SECTIONS__.$this->sectionsMENULEFT ) : "" );
    $pagina = $this->replace_content($this->etiqMENULEFT, $mLeft , $pagina);

		return $pagina;
 }

 function view_template($title='Sin Titulo', $content='Sin contenido'  ){

   $pagina = $this->load_pagePHP (__THEME_DIR__.$this->LayOutPagina);
   $pagina = $this->replace_content($this->etiqContenido,$content , $pagina);
   $this->view_page($pagina);
 }

 function GeneraInludeScript(){

   $Scrip           = "";
	 $sListaVariables = str_replace(" ", "", $this->SCRIPTADICIONALES );
   $ListaScrips     = explode("|",$sListaVariables);

   foreach( $ListaScrips as $key => $value)
    if ($value != "") {
      $jsPage = __JS_DIR__."".$value;
      if( is_file( $jsPage ) )
         $Scrip .= "<script  charset='utf-8' src=".chr(34).$jsPage.""."".chr(34)."></script>";
	  }

	 return $Scrip ;
 }

 function GeneraInludeCSS(){

    $sSCC            = "";
    $sListaVariables = str_replace(" ", "",$this->CSSADICIONALES );
    $ListaScrips     = explode("|",$sListaVariables);

      foreach( $ListaScrips as $key => $value)
       if ($value != ""){ 
         $cssPage =__CSS__."".$value;
         if( is_file( $cssPage ) )
           $sSCC .= "<link rel=".chr(34)."stylesheet".chr(34)." type=".chr(34)."text/css".chr(34)." href=".chr(34).$cssPage.chr(34)."/>"."";
  	    }

  	  return $sSCC ;
 }
	
 public function load_pageHTML($HTMLpage){
	 
	  if( is_file( $HTMLpage ) )
		  return file_get_contents($HTMLpage);
		 else
	    return $this->ImprimeMensageDeErrorHeader ('Archivo ['.$HTMLpage.'] no existe');
 }

 public function load_pagePHP($PhpPage){
	 if( !is_file( $PhpPage ) )
	   return $this->ImprimeMensageDeErrorHeader ('Archivo ['.$PhpPage.'] no existe');
	 else
	  if(! is_readable( $PhpPage ))
	    return $this->ImprimeMensageDeErrorHeader ('Archivo ['.$PhpPage.'] no es leible');
	  else{
	      ob_start();
	      include $PhpPage;$paginaConCOdigoPhp = ob_get_clean();
		    return $paginaConCOdigoPhp;
		 }
 }

 public function view_page($html){
		echo $html;
 }

 public function replace_content($in='/\<!--\#CONTENIDO\#--\>/ms', $out,$pagina){
	   return preg_replace($in, $out, $pagina);
 }

 public function ImprimeMensageDeErrorHeader( $sMsg =""){
   header('Status: 404 Not Found');
   echo '<html><body><h1>Error 404: '.'<i>' .$sMsg . '</i>'.' </h1></body></html>';
 }

}
?>