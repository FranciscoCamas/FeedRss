<?phpinclude "Noticia.php";class NoticiasRepository {protected $db;public function __construct(PDO $db) {    $this->db = $db;}private function read($row) {  $result     = new Noticia(); $result->id = $row["id"]; $result->Titulo = $row[ "Titulo"]; $result->Fecha = $row[ "Fecha"]; $result->Categoria = $row[ "Categoria"]; $result->Url = $row[ "Url"]; $result->Descripcion = $row[ "Descripcion"]; $result->Noticia = $row[ "Noticia"];  return $result; }private function getById($id)  {  $sql = "SELECT "; $sql.= "IdNoticia    as id, "; $sql.= "Titulo, ";  $sql.= "Fecha, ";  $sql.= "Categoria, ";  $sql.= "Url, ";  $sql.= "Descripcion, ";  $sql.= "Noticia ";  $sql.= "FROM Noticias       "; $sql.= " WHERE IdNoticia = :id ";   $q = $this->db->prepare($sql);   $q->bindParam(":id", $id, PDO::PARAM_INT);   $q->execute();   $rows = $q->fetchAll(); $JSON=false; $q->closeCursor(); $q = null; if ( !$JSON )   return $rows[0]; else   return $this->read($rows[0]);}public function getAll($filter) { $sBuscame = ""; if (isset( $filter["sBuscame"] ) )  if ( $filter[ "sBuscame"] != "" )   $sBuscame = "%".$filter["sBuscame"]."%"; $pageIndex = 1; if (isset( $filter["pageIndex"] ) )  if ( $filter[ "pageIndex"] != "" )   $pageIndex = $filter["pageIndex"]; $pageSize = 10; if (isset( $filter["pageSize"] ) )  if ( $filter[ "pageSize"] != "" )   $pageSize = $filter["pageSize"]; $Inicio =0;      $sql  = "";       $sql .= "SELECT ";       $sql.= "IdNoticia    as id, ";      $sql.= "Titulo, ";       $sql.= "Fecha, ";       $sql.= "Categoria, ";       $sql.= "Url, ";       $sql.= "Descripcion, ";       $sql.= "Noticia ";       $sql .= "FROM Noticias  ";      if ( $sBuscame != "" )      {      $sql.= " WHERE ";      $sql .= "(";      $sql .= " Titulo LIKE :sBuscame OR  " ;       $sql .= " Fecha LIKE :sBuscame OR  " ;       $sql .= " Categoria LIKE :sBuscame OR  " ;       $sql .= " Url LIKE :sBuscame OR  " ;       $sql .= " Descripcion LIKE :sBuscame OR  " ;       $sql .= " Noticia  LIKE :sBuscame  " ;       $sql .= ")";      }      if( $pageIndex!= 0 && $pageSize !=0 )        $sql.= " LIMIT :TamPag OFFSET :Inicio ";      $q = $this->db->prepare($sql);     if( $sBuscame !="" )      $q->bindParam(":sBuscame",  $sBuscame    );     if( $pageIndex!= 0 && $pageSize !=0 ){       $pageIndex = ($pageIndex-1>0 ? $pageIndex-1 : 0 );       $Inicio    = (1*$pageSize) *  ($pageIndex);      $q->bindValue(":TamPag", (int) $pageSize, PDO::PARAM_INT );      $q->bindValue(":Inicio", (int) $Inicio  , PDO::PARAM_INT );     }     $q->execute();     $rows = $q->fetchAll();     $JSON=false;     $q->closeCursor();     $q = null;     if ( !$JSON )      return $rows;     else     {       $result = array();       foreach($rows as $row) {         array_push($result, $this->read($row));};        return $result;     } }public function getCountAll($filter) { $sBuscame = ""; if (isset( $filter["sBuscame"] ) )  if ( $filter[ "sBuscame"] != "" )   $sBuscame = "%".$filter["sBuscame"]."%";      $sql  = "";       $sql .= "SELECT COUNT( IdNoticia ) as unTotal FROM Noticias  ";  if ( $sBuscame != "" ) {      $sql.= " WHERE ";      $sql .= "(";      $sql .= " Titulo LIKE :sBuscame OR  " ;       $sql .= " Fecha LIKE :sBuscame OR  " ;       $sql .= " Categoria LIKE :sBuscame OR  " ;       $sql .= " Url LIKE :sBuscame OR  " ;       $sql .= " Descripcion LIKE :sBuscame OR  " ;       $sql .= " Noticia  LIKE :sBuscame  " ;       $sql .= ")"; }      $q = $this->db->prepare($sql);     if( $sBuscame !="" )      $q->bindParam(":sBuscame",  $sBuscame    );     $q->execute();     $rows = $q->fetchAll();     $q->closeCursor();     $q = null;     return $rows[0][ "unTotal" ]; }public function insert($data) {      $sql  = "";       $sql .= "INSERT INTO  Noticias  ";       $sql .= "(";      $sql .= " Titulo, " ;       $sql .= " Fecha, " ;       $sql .= " Categoria, " ;       $sql .= " Url, " ;       $sql .= " Descripcion, " ;       $sql .= " Noticia  " ;       $sql .= ")";      $sql  .= " VALUES ";       $sql .= "(";      $sql .= " :Titulo, " ;       $sql .= " :Fecha, " ;       $sql .= " :Categoria, " ;       $sql .= " :Url, " ;       $sql .= " :Descripcion, " ;       $sql .= " :Noticia " ;       $sql .= ")";      $q = $this->db->prepare($sql);      $q->bindParam(":Titulo", $data["Titulo"]  );       $q->bindParam(":Fecha", $data["Fecha"]  );       $q->bindParam(":Categoria", $data["Categoria"]  );       $q->bindParam(":Url", $data["Url"]  );       $q->bindParam(":Descripcion", $data["Descripcion"]  );       $q->bindParam(":Noticia", $data["Noticia"]  );      $q->execute();     $UnId =$this->db->lastInsertId();     $q->closeCursor();     $q = null;     return $this->getById( $UnId ); }public function update($data) {      $sql  = "";       $sql .= "UPDATE Noticias SET ";       $sql .= " Titulo = :Titulo, " ;       $sql .= " Fecha = :Fecha, " ;       $sql .= " Categoria = :Categoria, " ;       $sql .= " Url = :Url, " ;       $sql .= " Descripcion = :Descripcion, " ;       $sql .= " Noticia = :Noticia " ;       $sql  .= " WHERE IdNoticia = :id ";       $q = $this->db->prepare($sql);      $q->bindParam(":Titulo", $data["Titulo"]  );       $q->bindParam(":Fecha", $data["Fecha"]  );       $q->bindParam(":Categoria", $data["Categoria"]  );       $q->bindParam(":Url", $data["Url"]  );       $q->bindParam(":Descripcion", $data["Descripcion"]  );       $q->bindParam(":Noticia", $data["Noticia"]  );      $q->bindParam(":id",  $data["id"],   PDO::PARAM_INT );     $q->execute();     $q->closeCursor();     $q = null;     return $this->getById( $data["id"]); }public function remove($id) { $sql    =  "DELETE FROM Noticias WHERE IdNoticia = :id "; $q      = $this->db->prepare($sql); $q->bindParam(":id", $id, PDO::PARAM_INT); $q->execute(); $q->closeCursor(); $q = null;}}?>
