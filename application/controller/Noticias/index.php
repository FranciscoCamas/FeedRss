<?phpinclude "../DummyPath.php";include "../JsGrdfunciones.php";include $PathModel."NoticiasRepository.php";$db= new PDO($config["db"], $config["username"], $config["password"]);$NoticiasRepository   = new NoticiasRepository($db);$JSON      = true;$ReImprime = true;$slista ="id,";$slista.="Titulo,Fecha,Categoria,Url,Descripcion,";$slista.="Noticia";switch($_SERVER["REQUEST_METHOD"]) {     Case "GET":        Redirecciona($PathReingresar);        break;    Case "--": /* TypeAHead*/          $Shearching  = getBufferData();      //$NombreAsignatura =utf8_decode( htmlspecialchars( $_Shearch ['NombreAsignatura'])); // solo funciona en server local      //$NombreAsignatura = $_Shearch ['NombreAsignatura']; // en server solo no hace falta decoficar        $pageIndex = "1"; $pageSize = "10";        $DatosBuscar = array(                      "Titulo" =>  "",                        "Fecha" =>  "",                        "Categoria" =>  "",                        "Url" =>  "",                        "Descripcion" =>  "",                        "Noticia" => "" ,                       "sBuscame"  => $Shearching,                      "pageIndex" => $pageIndex,                      "pageSize"  => $pageSize        );        $TotalReg  = $NoticiasRepository->getCountAll($DatosBuscar);        $result    = $NoticiasRepository->getAll($DatosBuscar);         //echo json_encode($result);        header("Content-Type: application/json");        echo ImprimeRegistros ( $result, $slista,false  );        break;    Case "_":        getBuffer($_Shearch);        $sCampFiltro = 'Matricula';        $sMatricula  =  "";        if ( isset($_SESSION [$sCampFiltro]) )            $sMatricula = $_SESSION [$sCampFiltro];      //$NombreAsignatura =utf8_decode( htmlspecialchars( $_Shearch ['NombreAsignatura'])); // solo funciona en server local      //$NombreAsignatura = $_Shearch ['NombreAsignatura']; // en server solo no hace falta decoficar        $sCampFiltro = 'sBuscame';        $sBuscame  =  "";        if ( isset($_Shearch [$sCampFiltro]) )            $sBuscame = $_Shearch [$sCampFiltro];        $pageIndex = "1";        if ( isset($_Shearch ['pageIndex']) )           $pageIndex = $_Shearch ['pageIndex'];        $pageSize = "10";        if ( isset($_Shearch ['pageSize']) )            $pageSize = $_Shearch ['pageSize'];        $DatosBuscar = array(                      "Titulo" =>  $_Shearch["Titulo"],                        "Fecha" =>  $_Shearch["Fecha"],                        "Categoria" =>  $_Shearch["Categoria"],                        "Url" =>  $_Shearch["Url"],                        "Descripcion" =>  $_Shearch["Descripcion"],                        "Noticia" => $_Shearch["Noticia" ],                       "sBuscame"  => $sBuscame,                      "pageIndex" => $pageIndex,                      "pageSize"  => $pageSize        );         //header("Content-Type: application/json");         //echo json_encode($result);        $TotalReg  = $NoticiasRepository->getCountAll($DatosBuscar);        $result    = $NoticiasRepository->getAll($DatosBuscar);        echo ImprimeRegistros ( $result, $slista,true,$TotalReg  );        break;    Case "+":        getBuffer($_ADD);        $sCampFiltro = 'Matricula';        $sMatricula  =  "";        if ( isset($_SESSION [$sCampFiltro]) )            $sMatricula = $_SESSION [$sCampFiltro];        $sCampFiltro = 'Matricula';        $sMatricula  =  "0";        if ( isset($_ADD [$sCampFiltro]) )            $sMatricula = $_ADD [$sCampFiltro];        $result = $NoticiasRepository->insert(array(                      "Titulo" =>  $_ADD["Titulo"],                        "Fecha" =>  $_ADD["Fecha"],                        "Categoria" =>  $_ADD["Categoria"],                        "Url" =>  $_ADD["Url"],                        "Descripcion" =>  $_ADD["Descripcion"],                        "Noticia" => $_ADD["Noticia" ]         ));         header("Content-Type: application/json");         //echo json_encode($result);        echo ImprimeObjeto ( $result, $slista );        break;    Case "PUT":        getBuffer($_PUT);        $result = $NoticiasRepository->update(array(                      "id"                   => intval($_PUT[ "id"]),                      "Titulo" =>  $_PUT["Titulo"],                        "Fecha" =>  $_PUT["Fecha"],                        "Categoria" =>  $_PUT["Categoria"],                        "Url" =>  $_PUT["Url"],                        "Descripcion" =>  $_PUT["Descripcion"],                        "Noticia" => $_PUT["Noticia" ]         ));         header("Content-Type: application/json");         //echo json_encode($result);        echo ImprimeObjeto ( $result, $slista );        break;    Case "POST":        include $PathModule."viewNoticia.php";        $result             = $NoticiasRepository->getById(intval($_POST["id"]));        $formNoticia  = new viewNoticia();        echo $formNoticia->ImprimeNoticia( $result );        break;    Case "-":        getBuffer($_DEL);        $result = $NoticiasRepository->remove(intval($_DEL["id"]));        header("Content-Type: application/json");        echo json_encode($result);        //echo ImprimeObjeto ( $result, $slista );        break;    Case "LECEX":        getBuffer($_ShearchLECEX);        $sCampFiltro = 'Matricula';        $sMatricula  =  "";        if ( isset($_SESSION [$sCampFiltro]) )            $sMatricula = $_SESSION [$sCampFiltro];        $sCampFiltro = 'sBuscame';        $sBuscame  =  "";        if ( isset($_ShearchLECEX [$sCampFiltro]) )            $sBuscame = $_ShearchLECEX [$sCampFiltro];        $pageIndex = "1";        if ( isset($_ShearchLECEX ['pageIndex']) )           $pageIndex = $_ShearchLECEX ['pageIndex'];        $pageSize = "10";        if ( isset($_ShearchLECEX ['pageSize']) )            $pageSize = $_ShearchLECEX ['pageSize'];        $DatosBuscar = array(                      "Titulo" =>  $_ShearchLECEX["Titulo"],                        "Fecha" =>  $_ShearchLECEX["Fecha"],                        "Categoria" =>  $_ShearchLECEX["Categoria"],                        "Url" =>  $_ShearchLECEX["Url"],                        "Descripcion" =>  $_ShearchLECEX["Descripcion"],                        "Noticia" => $_ShearchLECEX["Noticia" ],                       "sBuscame" => $sBuscame,                      "pageIndex" => $pageIndex,                      "pageSize" => $pageSize        );         //header("Content-Type: application/json");         //echo json_encode($result);        $TotalReg  = $NoticiasRepository->getCountAll($DatosBuscar);        $DatosBuscar ['pageSize'] = $TotalReg ;        $result    = $NoticiasRepository->getAll($DatosBuscar);        $JSON = false;        include $PathModule."viewNoticia.php";        $formNoticia = new viewNoticia();        $html= $formNoticia->ImprimeListaEnEXcelNoticia( $result);        $ReImprime    = false;        break;}$db = null;$NoticiasRepository = null; ?>