<?php
/*
 CLASE PARA LA GESTION DE OMR
*/
require_once "databaseMysql_c.php";

class objPersistente extends MiSQL {

  var $table           = "";
  var $tablaCompleta   = "";
  
  var $CampoID         = "id";
  var $IDtablaCompleta = "";
  var $CampoPadre      = ""; //"IdPadre"
	/* REALIZA UNA CONSULTA A LA BASE DE DATOS EN BUSCA DE  REGISTROS UNIVERSITARIOS DADOS COMO
	     PARAMETROS LA "CARRERA" Y LA "CANTIDAD" DE REGISTROS A MOSTRAR
		 INPUT:
		 $carrera | nombre de la carrera a buscar
		 $limit | cantidad de registros a mostrar
		 OUTPUT:
		 $data | Array con los registros obtenidos, si no existen datos, su valor es una cadena vacia
	 */
	 
	  public function ValidaUsuario () {
	  
	  if ( $_SESSION["username"]  == "" ){
    
        $_SESSION["mienlace"] = basename($_SERVER['PHP_SELF']);
        $paginaAutentificar=__CONTROLLER__."validaSesionUsuario.php";  
        //echo  "redirigiendo  despues de salir[".$pagina."]";
        //die();
        header('Location:'.$paginaAutentificar); 
    }
			 
	 }
	 
	 
	function BuscarEstricto($DataArray, $what =" * ",  $limit=10, $orderby = "")
	{
		
		
		//$table=" universitario ";
		$groupby  = "";
		$ln = "";
		
		//conexion a la base de datos
		$this->cnxOn();		
		 
		$TiposTabla = $this->listaDeTiposCampos($this->table);
	  
	  //	$where = " carrera='.%".$carrera."%' ";	
		$where  = $this->RegresaCadeaUpdate($DataArray,$this->table,$TiposTabla );
		
		$query = $this->consulta( $what, $this->table, $where , $groupby , $orderby , $limit, $ln );
 	   
 	  $this->cnxOff();	
 	  
 	  if( $this->numrows > 0) // existe -> datos correctos
		{		
				return $query;
		}else
		{	
			return '';
		}			
	}
	
		function BusquedaUniversal(&$listaCamposBusqueda, &$ResultadoBusqueda, $txtsearch="", $limitesPagina=10 ,  $tabla="", $sFiltroEspecifico="")
	{
		
   if ($tabla == "")   $tabla=$this->table;
   
   $listaCamposBusqueda = $this->getListaCampos($tabla);
   
   $ResultadoBusqueda = $this->getlistaRegistros( $limitesPagina, $txtsearch, $listaCamposBusqueda, $tabla, $sFiltroEspecifico);
		
	  // Obtenemos el total de los registros buscados, si no hay busqueda regresa el totald e lso registros
   $totalpag=$this->getTotalRegistros($txtsearch , $listaCamposBusqueda,$tabla );
   
   return $totalpag;
   	
	}
	
function Listar($what =" * ",$where = "", $limit=10, $orderby = "")
	{
		$groupby ="";
		$ln ="";
		//conexion a la base de datos
		$this->cnxOn();		
		 
		 
		$query = $this->consulta( $what, $this->table, $where , $groupby , $orderby , $limit, $ln );
 	   
 	   //echo "consulta [".$where."]" ;
 	   
 	  $this->cnxOff();	
 	  
 	  if( $this->numrows > 0) // existe -> datos correctos
		{		
				return $query;
		}else
		{	
			return '';
		}			
	}	

public function getEmpyBase($sTabla) {
 
 $base = array();
 
 $sCampos = $this->getListaCampos( $sTabla );
 
 for($i=0; $i<count($sCampos ); $i++) 
	  $base[$sCampos[$i]]="";  
 
 return $base ;
}

public function GetBaseById($id)
{
  if ($id != '')
     return $this->GetByID($this->table,$this->CampoID,$id);
   else
    return  $this->getEmpyBase($this->table);
}

 public function GetBaseCompletaById($id = '')
 {
 
   
   if ($id != '' or $id < 0)
   { 
      // echo "Por buscar [".$this->IDtablaCompleta."]=[".$id."] en [".$this->tablaCompleta."] "; 
      $sData = $this->GetbaseCompByID( $this->tablaCompleta,$this->IDtablaCompleta,$id);
      //echo " datos completos[".print_r($sData)."] ".chr(13);
      return $sData; 
  
  } else
     return $this->getEmpyBase($this->tablaCompleta);
   
  }
  
  
 public function GetIDCompletaByFiltro($filtro)
 {
   if ($filtro != '')
   { 
      $tableAux=" ( select * from ".$this->tablaCompleta." ) as TablaAuxiliar ";
      // echo "Por buscar [".$this->IDtablaCompleta."]=[".$id."] en [".$this->tablaCompleta."] "; 
      $sData = $this->GetIDByFiltro( $tableAux,$this->IDtablaCompleta,$filtro);
      //echo " datos completos[".print_r($sData)."] ".chr(13);
      return $sData; 
  
  } else
     return -1;//
   
  } 
  
   public function GetBaseByFiltro($filtro)
 {
   if ($filtro != '')
   { 
       $id=$this->GetIDByFiltro( $this->table,$this->CampoID,$filtro);
      $sData = $this ->GetBaseById($id);
      
      return $sData; 
  
  } else
     return -1;//
   
  }
  
  public function GetBaseCompletaByFiltro($filtro)
 {
   if ($filtro != '')
   { 
       $idComp = $this->GetIDCompletaByFiltro($filtro);
       $sData  = $this->GetBaseCompletaById($idComp);
      return $sData; 
  
  } else
     return -1;//
   
  }
  
  
public function BorrarMe($id)
{
  if ($id != "")
	 return $this->DeleteByID($this->table,$this->CampoID,$id);
	 else
  return null;
}
  
public function ActualizaMe($id,$DataArray)
{
	 if ($id!="")
	 {
	 unset ($DataArray[$this->CampoID]);
	 
	 $this->UpdateByID($this->table,$this->CampoID, $id,$DataArray);
	 
	 $DataArray[$this->CampoID]=$id;
	 
	  return $DataArray;
	  
	 }
	 else
  return null;
}

/* Puede ser que no se tenga el arreblo base que poblara el objeto*/
public function AgregaNuevo($DataArray = null)
{
 
 if ($DataArray != null)
  return $this->InsertByID($this->table,$this->CampoID,$DataArray);
  else
  return null;
}


/* =============================================================================  */
/* funcion que Genera un input tipo Texto con el valor del campo buscado
/* =============================================================================  */
function ArmafiltroCadenaDesdeArray( $NombresCampos,$unvalorBuscado,$unNexo= " OR ",$NombreTabla ="") {
 
 $unfiltro="";
  
 if ($NombreTabla !="")
     $NombreTabla .= "." ;   
    
   
 if ($unvalorBuscado != "")
    if ( count($NombresCampos) > 0 )
	   for($i=0; $i<count($NombresCampos); $i++) 
	      {
	         $NombreCampo = $NombresCampos[$i];
	         if(strpos( $NombresCampos[$i], ".") === False )
	          $NombreCampo=$NombreTabla.$NombresCampos[$i];
	         
	         $unfiltro =	$this->ArmafiltroCadena( $NombreCampo,$unvalorBuscado,$unNexo,$unfiltro);
	      }
	      
 return $unfiltro;

}

/* =============================================================================  */
/* funcion que Genera un input tipo Texto con el valor del campo buscado          *
/* =============================================================================  */
function ArmafiltroCadena( $unCampo,$unvalor,$unNexo,&$unfiltro) {
    
    // nombre like '%algo% OR Apaterno Like '%Alguien%' OR tercm Like '%K%'
    
    if ( $unvalor !="" ) 
    {
        // Eliminamos los espacios en blanco del inicio y del final
	      $unvalor=trim($unvalor);   
        
  		   $unvalor =" like '%".$unvalor."%' "; 		 
  		   $unacondicion = " ".$unCampo.$unvalor." "; 
		 
     }
    if ($unNexo=="")
         $unNexo= " OR " ;

    if( $unacondicion !="")
       if( $unfiltro == "")
          $unfiltro = " ".$unCampo.$unvalor; 
         else
           if( stristr($unfiltro, '='    ) == TRUE ||
               stristr($unfiltro, 'LIKE' ) == TRUE ||
               stristr($unfiltro, '<'    ) == TRUE ||
               stristr($unfiltro, '>'    ) == TRUE     ) 
                $unfiltro.=" ".$unNexo." ".$unacondicion; 
      
       
 return $unfiltro;

}

/* ============================================================================= */
/*   funcion que obtiene el total de registros mediante una consulta a la BD     */
/* ============================================================================= */
function getTotalRegistros( $ValorCampos="", $listaCamposBusqueda, $tabla ="" ){

	$numReg = 0;
	
	if( $tabla == "" )
	 $tabla = $this->table;
	
	$unfiltro=$this->ArmafiltroCadenaDesdeArray($listaCamposBusqueda,$ValorCampos," OR ");  
  	
	$this->cnxOn();
	
		$numReg = $this->CuentaTotTabla(  $tabla ,$unfiltro);	
		
	$this->cnxOff();
	
	return $numReg;
}	
/* ============================================================================= */
/*   funcion que almacena en un arreglo los registros que contiene la tabla      */
/*   previa consulta a la base de datos                                          */
/* ============================================================================= */
function getlistaRegistros($limit, $ValorCampos ="", $listaCamposBusqueda, $tabla ="", $sFiltroEspecipico =""){	
	
	$unfiltro=$this->ArmafiltroCadenaDesdeArray($listaCamposBusqueda,$ValorCampos," OR ");  
	
	
	if( $tabla == "" )
	 $tabla = $this->table;
	
	  $Que       = " * ";                  // Todo se buscara
		//$tabla     = "tbclientes_borrar"; // Tabla actual
		
		
		$Filtro    = $unfiltro.$sFiltroEspecipico ;                //Filtro de los clientes
		
		$AgrupaPor = "";              //agrupa resultados
		$OrdenaPor = "";
		//$limit     = "";                    //  1,10 ,  la ventana de resulados
		$in        = "";   
		
	
	$registros = array();
	
	$this->cnxOn();		
	
	$registros = $this->consulta( $Que, $tabla ,$Filtro,$AgrupaPor,$OrdenaPor,$limit,$in);	
	
	$this->cnxOff();
	
	return $registros;
}

/* ============================================================================= */
/*   funcion que almacena en un arreglo los nombres de campos que contiene       */
/*   una tabla previa consulta a la base de datos                                */
/* ============================================================================= */
function getListaCampos($tabla =""){	

	$campos=array();
	
	$this->cnxOn();		
	
	if( $tabla == "" )
	 $tabla = $this->table;
	 
	$campos = $this->listaCampos( $tabla );
	
	$this->cnxOff();
	
	return $campos;
}


/* ============================================================================= */
/*   
/*   
/* ============================================================================= */
function ActualizaClaseHija($ClaseHijaPorActualizar,$idPadre , $IDClaseHija,$sDataClaseHija){	

	/* Clase Hija Direccion */  
  
  /* Se agrega la clase hija, si no se se tiene */
  if($IDClaseHija == null || $IDClaseHija == 0 || $IDClaseHija == '0' )
  {
    $NuevabaseHija = $ClaseHijaPorActualizar->getEmpyBase($ClaseHijaPorActualizar->table);
  
    $NuevabaseHija[$this->CampoID ]= $idPadre;
  
    $IDClaseHija = $ClaseHijaPorActualizar->AgregaNuevo($NuevabaseHija );
  }
         
  //las clases hijas, no pueden actualizar el id de la clase hija
  unset($sDataClaseHija[$this->CampoID ]);
         
  $sDataClaseHija[$ClaseHijaPorActualizar->CampoID]=$IDClaseHija;
  //$baseDireccion[$this->CampoID ]= "";
          
  $sDaTA = $ClaseHijaPorActualizar->ActualizaMe($IDClaseHija, $sDataClaseHija);
  ///echo "BAse Clase hija Agregada".print_r($sDaTA)."";
  return $sDaTA ;

}



/* Agregado para obtener los datos enviados por otra clase */
public function GetVarByPost( $nomVar ="" ){
 //var $sTiposDeDatos = $this->listaDeTiposCampos( $table );
 $UnId = 0;

 $nomVar = str_replace(" ", "",$nomVar );

 if ( $nomVar != "" )
	 if ( $_SERVER['REQUEST_METHOD'] == 'POST')
       $UnId= ( isset($_POST[$nomVar]) ) ? htmlspecialchars($_POST[$nomVar]) :0;
    // En server
   $UnId=utf8_decode($UnId);

   return $UnId;

}

/* ============================================================================= *\
  GetArrayFromSession
                      Recupera las variables de session de un  y las pasa a un arreglo

  $sListaVariables cadena que contiene los nombres de las variables a rescatar de
                  del arreglo $_SESSION (Nombre de las variables de session )
  $sSeparador      Separador del arreglo anterior
  $ImpValores      Si se imprimen o no los valores, mientras son  rescatados
\* ============================================================================= */
function GetArrayFromPOST($sListaVariables="", $sSeparador = "|") {

  $sDatosARegresar=array();

  $sListaVariables = str_replace(" ", "",$sListaVariables );

  /*
 if( $sListaVariables == "" )
		  $sListaVariables = $this->NomCampos;
		*/
  $sDatos = explode($sSeparador,$sListaVariables);
   $ImpValores =true;
  // if( $ImpValores ) {echo " Indice=".$sDatos [$key]." Valor=".$value."<br>";}
   // {echo " Indice=".$sDatos [$key]." Valor=".$value."<br>";}
   //{echo " Indice=".$sDatos [$key]." Valor=".$value."<br>";}

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
    foreach( $sDatos as $key => $value)
    $sDatosARegresar[$value] =  ( isset($_POST[$value])  ) ? utf8_decode( htmlspecialchars($_POST[$value ])):"";

	return $sDatosARegresar;

}

function GetArrayFromSession($sListaVariables="", $sSeparador = "|" ) {

  $sDatosARegresar=array();

  $sListaVariables = str_replace(" ", "",$sListaVariables );

   $sDatos = explode($sSeparador,$sListaVariables);

   foreach( $sDatos as $key => $value)
		$sDatosARegresar[$value] = ( isset($_SESSION[$value])  ) ? htmlspecialchars($_SESSION[$value ]):"";
			     //$sDatosARegresar[$sDatos[$key]] = $_SESSION [$value];

	return $sDatosARegresar;

}

function GetVarFromSession($sCampFiltro  ) {
 
 $PorRegresar = "";

 if ( isset($_SESSION [$sCampFiltro]) )
 if ( $_SESSION [$sCampFiltro]  != "" )
      $PorRegresar = $_SESSION [$sCampFiltro];

 return $PorRegresar;

}

}
?>