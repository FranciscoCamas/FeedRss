<?php
/*
			#####################################################################################
			#		Nombre:	funcionesSql																																																					#

			#		Descripci�n:																																			#
			#			Archivo con rutinas de conexi�n a una base de datos																#
			#																																										#
			#		Funciones:																																				#
			#				MiSQL($s, $u, $p, $bdg) -> Constructor																						#
			#				cnxOn(  )	-> Se conecta a la BD																									#
			#				cnxOff(  ) -> Se desconecta de la BD																							#
			#				consulta ( $what, $table, $where, $orderby, $limit )  -> Consultas a la BD						#
			#				enlista	 ( $data )  -> Consultas a la BD																					#
			#				insertar ( $table, $values ) -> Inserta datos en la BD															#
			#				actualizar( $table, $setval, $where, $orderby, $limit ) -> Actualiza datos en la BD		#
			#				borrar( $table, $where) -> Borra datos y optimiza la BD														#
			#				optimizar( $table ) -> Optimiza la BD																						#
			#				listaCampos( $table ) -> Enlista los campos de una tabla de la BD									#
			#				checaAI($table) -> Checa si hay un campo AUTO_INCREMENT												#
			#																																																							#
			#																																										#
			#####################################################################################
*/

	//Declaraci�n de Variables
class  MiSQL{

//###################### INICIO CLASE ###################### //
   //var $config            = include("config.php");
	  var $EnServer    = false;

		var $mibd ;
    var $servidor    = "";
/*
		var $usuario     = "";
		var $contrasenia = "";
*/
/*		
		var $usuario     = "algunUsuarioServer";
		var $contrasenia = "AlgunaconstraseñaServer";
*/

		var $usuario     = "root";
		var $contrasenia = "";


		var $baseg       = "FeedRss";

		var $numrows = 0;
		var $faf = 0;

    var $rquery =0;


   var $mysql_data_type_hash = array(
    1=>'tinyint',
    2=>'smallint',
    3=>'int',
    4=>'float',
    5=>'double',
    7=>'timestamp',
    8=>'bigint',
    9=>'mediumint',
    10=>'date',
    11=>'time',
    12=>'datetime',
    13=>'year',

    14=>'NEWDATE',

    16=>'bit',
    //252 is currently mapped to all text and blob types (MySQL 5.0.51a)

    247=>'ENUM',
    248=>'SET',
    249=>'TINY_BLOB',
    250=>'MEDIUM_BLOB',
    251=>'LONG_BLOB',
    252=>'BLOB',


    253=>'varchar',
    254=>'char',

    255=>'GEOMETRY',

    246=>'decimal'


);



	function MiSQLSetData( $s, $u, $p, $bdg){
		$this->servidor    = $s;
		$this->usuario     = $u;
		$this->contrasenia = $p;
		$this->baseg       = $bdg;
	}

//###################### CONEXI�N A LA BD ###################### //

	function cnxOn(){
		$this->mibd = mysqli_connect( $this->servidor, $this->usuario, $this->contrasenia ) or die ( "Error al Conectarme con la Base de Datos\r\n".mysql_errno()." - ".mysql_error());
		mysqli_select_db( $this->mibd , $this->baseg ) or die ( "Error al seleccionar la Base de Datos".$this->baseg."1<br>\r\n".mysql_errno()." - ".mysql_error());

     $charSet ="utf8";
     $query ="";
     $query.="SET character_set_results = '".$charSet."',";
     $query.="character_set_client      = '".$charSet."',";
     $query.="character_set_connection  = '".$charSet."',";
     $query.="character_set_database    = '".$charSet."',";
     $query.="character_set_server      = '".$charSet."' ";

	  //$rquery = mysqli_query($this->mibd ,  $query ) or  die ( "Error al hacer consulta con la Base de Datos<br>\r\n".$query."<br>\r\n".mysql_errno()." - ".mysql_error()."Linea: ".$ln."<br>\r\n" );
	}

//###################### DESCONEXI�N A LA BD ###################### //

	function cnxOff(){
		mysqli_close( $this->mibd )  or die ( "Error al Desconectarme con la Base de Datos<br>\r\n".mysql_errno()." - ".mysql_error());
	}

//###################### CONSULTA A LA BD ###################### //

	function consulta ( $what, $table, $where = "", $groupby = "", $orderby = "", $limit = "", $ln = "" ){

	  $rdata = array ();

		$query = "SELECT " . $what. " FROM ". $table;


		$ln=1;
    
    //$where = mysqli_real_escape_string($this->mibd, $where ) ;
      
		if  ( $where   != "" ){ $query .= " WHERE     ". $where ;	 }
		if  ( $groupby != "" ){ $query .= " GROUP BY " . $groupby; }
		if  ( $orderby != "" ){ $query .= " ORDER BY " . $orderby; }
		if  ( $limit   != "" ){ $query .= " LIMIT    " . $limit;   }

		//echo "query [".$query."]";
		$this->rquery = mysqli_query($this->mibd ,  $query ) or  die ( "Error al hacer consulta con la Base de Datos<br>\r\n".$query."<br>\r\n".mysql_errno()." - ".mysql_error()."Linea: ".$ln."<br>\r\n" );

		$this->faf = mysqli_affected_rows( $this->mibd );
		$this->numrows = mysqli_num_rows( $this->rquery );

		for ($i = 0; $i < $this->numrows; $i++){
			$rdata[$i] = mysqli_fetch_array( $this->rquery, MYSQL_ASSOC);

		}

		mysqli_free_result($this->rquery);

		//echo $query;
		return $rdata;

	}

//###################### LISTADO DE CONSULTA A LA BD ###################### //

	function enlista($data){
		foreach ( $data[0] as $key => $value){
			echo  $key."&nbsp;&nbsp;&nbsp;";
		}
		echo "<br>\r\n";
		for ($i = 0; $i < count($data); $i++){
			foreach ( $data[$i] as $value){
				echo  $value."&nbsp;&nbsp;&nbsp;";
			}
			echo "<br>\r\n";
		}
	}

//######################  INSERCIONES A LA BD ###################### //

	function insertar ( $table, $values, $sListadeCampos="", $sSeparador = "|"){

		$camposLista = "";

		$campos=array();

		 //  Preguntamos si nos pasaron la lista de campos, de ser asi,
		 // la tomamos, de lo contrario, agarramos todos los campos de la
		 // tabla con la que estamos trabajando
		 if ($sListadeCampos != "")
		   $campos = explode($sSeparador,$sListadeCampos);
		 else
		   $campos = $this->listaCampos( $table );

		// Comportmiento por omicion
		if (count($campos) > 0)
		{
		 $camposLista .= $campos[0];

		 for ($i = 1; $i < count($campos); $i++)
			 if($campos[$i] != "")
			 $camposLista .= ", ".$campos[$i];

	 }

		$query  = "";
		$query .= "INSERT INTO ".$table;
		$query .= " ( ".$camposLista." ) ";
		$query .= " VALUES ";
		$query .= "( ".$values. ")";

		//echo $query;
		$ln=1;
		$rquery = mysqli_query($this->mibd , $query) or die ( "Error al insertar fila en la Base de Datos<br>\r\n".$query."<br>\r\n".mysql_errno()." - ".mysql_error()."Linea: ".$ln."<br>\r\n" );
		$this->faf = mysqli_affected_rows( $this->mibd );
	}

//###################### ACTUALIZACIONES A LA BD ###################### //

	function actualizar( $table, $setval, $where = "", $ln = "" ){
	  $ln=1;

		$query = "UPDATE  ".$table." SET ".$setval;
		if  ( $where != "" ){ $query .= "  WHERE " . $where;	}
		$rquery = mysqli_query($this->mibd , $query) or die ( "Error al actualizar la Base de Datos<br>\r\n".$query."<br>\r\n".mysql_errno()." - ".mysql_error()."Linea: ".$ln."<br>\r\n");
		//echo $query;
		$this->faf = mysqli_affected_rows( $this->mibd );
		//echo "funciones SQL - >actualizar : intentado ejecutar: [".$query."]<br>";
	}

//######################  BORRAR Y OPTIMIZAR LA BD ###################### //

	function borrar( $table, $where, $ln = ""){
	$ln=1;
		$query = "DELETE FROM ".$table." WHERE ".$where;
		//echo $query;
		$rquery = mysqli_query($this->mibd ,$query) or die ( "Error al borrar fila en la Base de Datos<br>\r\n".$query."<br>\r\n".mysql_errno()." - ".mysql_error()."Linea: ".$ln."<br>\r\n");
		$this->faf = mysqli_affected_rows( $this->mibd );
		$this->optimizar( $table );
	}

//###################### OPTIMIZAR LA BD ###################### //

	function optimizar( $table ){
	$ln=1;
		$query = "OPTIMIZE TABLE  ".$table;
		$rquery = mysqli_query($this->mibd , $query) or die ( "Error al  optimizar la Base de Datos<br>\r\n".mysql_errno()." - ".mysql_error());
	}

//###################### ULTIMO ID INSERTADO ###################### //

	/*function ultimoID( $table ){
		printf ("Nuevo registro con el id %d.\n", mysqli_insert_id($this->mibd));
		$ID=mysqli_insert_id($this->mibd);
		return  $ID;
	}*/

//###################### LISTADO DE CAMPOS DE LA BD ###################### //

	function listaCampos( $table,$where = "" ){

		$f = array ();

		$r = "SELECT * FROM ". $table. " "." LIMIT 1";
		$res = mysqli_query($this->mibd , $r);
		$c = mysqli_num_fields($res);
		for ($i = 0; $i < $c; $i++){
				$colObj = mysqli_fetch_field_direct($res,$i);
				$f[$i] = $colObj->name;
		}
		return $f;
	}




//###################### Cuantos REgistros  TENGO en mi tabla ###################### //

	function CuentaTotTabla( $table, $where = "" ){
		$r = "SELECT * FROM ". $table;

		if  ( $where != "" ){ $r.= "  WHERE " . $where;	}

		$restol = mysqli_query($this->mibd ,$r);
		$c = mysqli_num_rows($restol);
		return $c;
	}

//##### implemmenta fetch_assoc, para compatibilidad con mysqli_fetch_array ##### //
/* Francisco Camas*/
	function fetch_assoc(){
		if(!is_resource($this->rquery)) return false;
			 return mysqli_fetch_array( $this->rquery, MYSQL_ASSOC);
			//return mysql_fetch_assoc($result);
			// $rdata[$i] = mysqli_fetch_array( $this->$rquery, MYSQL_ASSOC);
	}

//###################### Obtiene el ultimo ID para usar  ###################### //
/* Francisco Camas*/
  function GetIdx( $table , $cualID = "id"){

		$max = " MAX(".$cualID .") AS 'MaxId' ";

		$ArratMax = $this->consulta($max,$table);

		$resMax=$ArratMax [0];

	  $nuevoID = $resMax['MaxId'] +1;

	  unset($ArratMax )	;

		return $nuevoID;


	}

//###################### los datos, de la entidad por el ID  ###################### //
/* Francisco Camas*/
public function GetByID($table, $CampoId ="" ,$id="",$what =" * ")
 {
   $id = htmlspecialchars($id);

		$groupby  = "";
		$where = " ".$CampoId."= ".$id." ";
		$orderby = "";
		$limit = "";
		$ln = "";

		//conexion a la base de datos
		$this->cnxOn();

		$query = $this->consulta( $what, $table, $where , $groupby , $orderby , $limit, $ln );

 	  $sData="";

 	  if( $this->numrows > 0) // existe -> datos correctos
				$sData = $query[0]; // ojo: solo regresamos el primer regisro

		$this->cnxOff();

		return $sData;

 }


public function GetbaseCompByID($table, $CampoId ="" ,$id="",$what =" * ")
 {
   $id = htmlspecialchars($id);

		$groupby  = "";
		$where = " ".$CampoId."= ".$id." ";
		$orderby = "";
		$limit = "";
		$ln = "";

		//SELECT * FROM ( select * from view_personas ) as p WHERE `IDViewpersona` = 2

		$tableAux=" ( select * from ".$table." ) as TablaAuxiliar ";

		//conexion a la base de datos
		$this->cnxOn();


		$query = $this->consulta( $what, $tableAux, $where , $groupby , $orderby , $limit, $ln );

 	  $sData="";

 	  if( $this->numrows > 0) // existe -> datos correctos
				$sData = $query[0]; // ojo: solo regresamos el primer regisro

		$this->cnxOff();

		return $sData;

 }

//###################### elmina la entidad por el ID  ###################### //
/* Francisco Camas*/
public function DeleteByID($table, $CampoId  , $id )
 {

		$groupby  = "";
		$where = " ".$CampoId."= ".$id." ";
		$orderby = "";
		$limit = "";
		$ln = "";

		//conexion a la base de datos
		$this->cnxOn();

		$query = $this->borrar( $table, $where ,$ln );

 	  $sData="";

 	  if( $this->numrows > 0) // existe -> datos correctos
				$sData = $query[0]; // ojo: solo regresamos el primer regisro

		$this->cnxOff();

		return $sData;
 }

//###################### Actualiza la entidad por el ID  ###################### //
/* Francisco Camas*/
public function UpdateByID($table, $CampoId  , $id,$DataArray )
 {                        //  borrar( $table, $where, $ln = ""

    // Pos si dejan algun espacio en balnco
    $CampoId = str_replace(" ", "",$CampoId );

    if ($CampoId =="")
      $CampoId ="id";

		$where = " ".$CampoId ."=".$id." ";


		//conexion a la base de datos
		$this->cnxOn();

		$TiposTabla = $this->listaDeTiposCampos($this->table);

		$setval = $this->RegresaCadeaUpdate($DataArray,$this->table,$TiposTabla );

		$query = $this->actualizar( $this->table,$setval  , $where  );

 	  $sData="";
 	  //echo "Datos de actualizacion Tabla[".$this->table."] Set (".$setval.") donde |".$where."|";

 	  if( $this->numrows > 0) // existe -> datos correctos
				$sData = $query[0]; // ojo: solo regresamos el primer regisro

		$this->cnxOff();

		return $sData;
 }

 //###################### Actualiza la entidad por el ID  ###################### //
/* Francisco Camas*/
public function InsertByID($table, $CampoId  , $DataArray = Null)
 {                        //  borrar( $table, $where, $ln = ""

    $CampoId = str_replace(" ", "",$CampoId );
    if ($CampoId =="")
      $CampoId ="id";

		$sListadeCampos = "";

		//conexion a la base de datos
		$this->cnxOn();

		$idNuevo =$this->GetIdx ( $this->table, $CampoId );

		if ($DataArray != Null)
		{
		$DataArray[$CampoId ]=$idNuevo;

		$TiposTabla = $this->listaDeTiposCampos($this->table);

		//echo "Values [".$this->RegresaCadeaUpdate($DataArray,$table,$TiposTabla,$sListadeCampos2 )."] ";
		$values=$this->RegresaCadeaInsert($DataArray,$this->table,$TiposTabla,$sListadeCampos );
		//echo "Values [".$values."] Campos por insertar[".$sListadeCampos."]";
		//$query = $this->insertar ( $table, $values, $sListadeCampos);
 	  }
 	  else
 	   {
 	    $values         = $idNuevo ;
 	    $sListadeCampos = $CampoId ."|";
 	   }
 	  $query = $this->insertar ( $this->table, $values, $sListadeCampos);


 	  $this->cnxOff();


		return $idNuevo ; // regresamos el nuevo id

 }

 //###################### los datos, de la entidad por el ID  ###################### //
/* Francisco Camas*/
public function GetIDByFiltro($table, $CampoId  , $filtro ="")
 {
    $CampoId = htmlspecialchars($CampoId);

		$groupby  = "";
		$where    = $filtro;
		$orderby  = "";
		$limit    = "";
		$ln       = "";

		$what = " ".$CampoId." ";

		$this->cnxOn();

		$query = $this->consulta( $what, $table, $where , $groupby , $orderby , $limit, $ln );

    $sData=-1;

 	  if( $this->numrows > 0 ) $sData = $query[0][$CampoId];  // ojo: solo regresamos el primer regisro

		$this->cnxOff();

		return $sData;

 }



//###################### LISTADO DE CAMPOS DE LA BD ###################### //
// Francisco Camas
	function listaDeTiposCampos( $table ){

		$f = array ();

		$r = "SELECT * FROM ". $table. " LIMIT 1";
		$res = mysqli_query($this->mibd , $r);
		$c = mysqli_num_fields($res);
		for ($i = 0; $i < $c; $i++){
				$colObj = mysqli_fetch_field_direct($res,$i);
				$f[$colObj->name] = $colObj->type;
				//$f[$colObj->name] = $this->mysql_data_type_hash [$colObj->type];
		}
		return $f;
	}


//###Regresa el sepadador de valores, ' para cadena o vacio para enteros ###################### //
// Francisco Camas
	function RegresaSeparadordeValor( $TipodeDato ){


    // por omicion pesnamos que todos son cadena
    $separador="'";

      switch ($TipodeDato)
      {
	         // Tipos Numericos
           case 1: case 2: case 3: case 4: case 5:
           case 6: case 8: case 9: case 246: case 247:

		             $separador="";
			     break;

			     // Tipos Fecha
			     case 7: case 10:case 11:
			     case 12:case 13:case 14:
		             $separador="'";
			     break;

		        // Tipos BLOB
			     case 249: case 250:
			     case 251: case 252:
		             $separador="'";
			     break;
		     }

	return $separador;
	}

//###################### Genera la parte de values del Quey Insert ###################### //
// Francisco Camas
	function RegresaCadeaUpdate( $sDatos,$table, $sTiposDeDatos ){

	 $sQlsUpdate="";

	//var $sTiposDeDatos = $this->listaDeTiposCampos( $table );

   foreach( $sDatos as $key => $value)
   IF ($key !="" )
   {

    // Buscamos el tipo de separador del dato
    $separador=$this->RegresaSeparadordeValor($sTiposDeDatos[$key]);

    $sQlsUpdate.= " ".$key ." = ".$separador."".$sDatos[$key]."".$separador."," ;

    }
	//$sQlsInsert=rtrim($sQlsInsert, ",");
	$sQlsUpdate = substr_replace($sQlsUpdate, "", -1);
	return $sQlsUpdate;
	}

//###################### Genera la parte de values del Quey Insert ###################### //
// Francisco Camas
	function RegresaCadeaInsert( $sDatos,$table, $sTiposDeDatos,&$ListaDeCamposEnorden ){

	 $sQlsInsert="";
	 $ListaDeCamposEnorden="";
	//var $sTiposDeDatos = $this->listaDeTiposCampos( $table );

   foreach( $sDatos as $key => $value)
   IF ($key !="" )
   {

    // Buscamos el tipo de separador del dato
    $separador=$this->RegresaSeparadordeValor($sTiposDeDatos[$key]);

     if ( $separador == "")
       if ( $sDatos[$key] == "")
            $sDatos[$key] =0;
     if ($separador != "") $sDatos[$key] = utf8_encode($sDatos[$key]);

     $sQlsInsert.= " ".$separador."".$sDatos[$key]."".$separador."," ;

     $ListaDeCamposEnorden .= "".$key.",";
    }
	//$sQlsInsert=rtrim($sQlsInsert, ",");
	$sQlsInsert = substr_replace($sQlsInsert, "", -1);
	$ListaDeCamposEnorden = substr_replace($ListaDeCamposEnorden, "", -1);
	return $sQlsInsert;
	}

//###################### FIN CLASE ###################### //
 /*
  1=>'tinyint',
    2=>'smallint',
    3=>'int',
    4=>'float',
    5=>'double',
    7=>'timestamp',
    8=>'bigint',
    9=>'mediumint',
    10=>'date',
    11=>'time',
    12=>'datetime',
    13=>'year',

    14=>'NEWDATE',

    16=>'bit',
    //252 is currently mapped to all text and blob types (MySQL 5.0.51a)

    247=>'ENUM',
    248=>'SET',
    249=>'TINY_BLOB',
    250=>'MEDIUM_BLOB',
    251=>'LONG_BLOB',
    252=>'BLOB',


    253=>'varchar',
    254=>'char',

    255=>'GEOMETRY',

    246=>'decimal'
	*/

	}
?>
