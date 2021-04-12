<?php
/**
 * Controlador para las paginas estaticas
 */
 require 'mvc.controller.php';

class pageCtrl extends mvc_controller {
 
  var $finTipo    = ".php";
  var $HeaderHTML ="<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
  var $rutaModel  = "Modelo";
  var $rutaCtrl   = "Control";
  var $rutaView   = "Vista";
  
  public function __construct() { }

  public function load(  $paginaAcargar ="",$title='Pagina Principal', $header='' ){

   if( $paginaAcargar == "" )
        $this->ImprimeMensageDeErrorHeader ( "Nombre de la pagina en Blanco ");
   else
      if( !is_file( $paginaAcargar  ) )
          $this->ImprimeMensageDeErrorHeader ( " No existe el archivo [".$paginaAcargar ."]");
      else{                       
             $content = ( strpos($paginaAcargar, $this->finTipo) === false ) ?  $this->load_pageHTML($paginaAcargar) : $this->load_pagePHP ($paginaAcargar);
             $pagina  = $this->load_template($title,$header);           
             $pagina  = $this->replace_content($this->etiqContenido ,$content , $pagina);               
             $this->view_page($pagina);
      }             
  }

  function IncluyeContextoMVC( $nomModelo, $nomVista, $nomControlador ){
      
     if( $nomModelo !=="" )
     $this->IncluyeArchivo( $nomModelo       ); 
     
     if( $nomVista !=="" )
     $this->IncluyeArchivo( $nomVista        );
     
     if( $nomControlador !=="" )
     $this->IncluyeArchivo( $nomControlador  ); 
   }

  function IncluyeArchivo( $nomArchivo ="" ){

    if( $nomArchivo =="" )
     $this->ImprimeMensageDeErrorHeader ( "Nombre del archivo en Blanco ");
     else
       if( !is_file( $nomArchivo  ) )
         $this->ImprimeMensageDeErrorHeader ( " No existe el archivo [".$nomArchivo ."]");
       else
         require_once  $nomArchivo ;
  }

  function EjecutaMetodo( $nomcontrolador ="", $NomAccion ="" ){

    if ( $nomcontrolador =="" )
     $this->ImprimeMensageDeErrorHeader ("El controlador [".$nomcontrolador ."] no existe");

    if ( $NomAccion =="" )
     $this->ImprimeMensageDeErrorHeader ("La Accion [".$NomAccion ."] no existe");

    if (method_exists($nomcontrolador,$NomAccion)) 
       echo call_user_func(array(new $nomcontrolador, $NomAccion));
    else
       $this->ImprimeMensageDeErrorHeader ("El controlador [".$nomcontrolador . '->' . $NomAccion ."] no existe");

  }

  function IniciaContestoYMetodo( $ListaArchivos, $Uncontrolador, $UnNomAccion  ){
                
   $this->IncluyeContextoMVC($ListaArchivos[$this->rutaModel ],$ListaArchivos[$this->rutaView ],$ListaArchivos[$this->rutaCtrl]);
   $this->EjecutaMetodo( $Uncontrolador , $UnNomAccion  );

  }

 function ImprimeMensageDeErrorHeader( $sMsg =""){
   header('Status: 404 Not Found');
          echo '<html><body>'.
                '<h1>Error 404: '.'<i>' .$sMsg . '</i>'. '</h1>'.                               
                    '</body></html>';
 }

}
?>