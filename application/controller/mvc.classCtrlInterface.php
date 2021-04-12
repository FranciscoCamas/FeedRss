<?php
 interface CtrlClassInterface {     
   /* Este metodo debe configurar y lueog mostrar
   la vista por omicion*/
   function Inicia();  
 
   function Listar();  
 
   function ver();  
 
   function eliminar ();  
 
   function guardar ();  
 
   function nuevo ();
   
   function BusquedaConPaginacion ( $txtsearch="", $pagina=0, $tamano=10 );
    
 } 
 ?>