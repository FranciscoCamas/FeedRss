var contentTypeTxt='text/html; charset=UTF-8';
var contentTypeFrm='application/x-www-form-urlencoded; charset=UTF-8';

function setValueFromArray( scriptArray ){
var arv = scriptArray.toString();
return arv;
}

function ExisteElementoHTML (sNameHTML) {
var SiExisteHTML  = false;
var stxtsNameHTML = $( "." + sNameHTML ).html ();

 if (stxtsNameHTML   != "" )
  if (stxtsNameHTML + "" != "undefined" )
     SiExisteHTML = true;

return SiExisteHTML;
}

function getRadioButton(elementname) {

 var valor = $("[type=radio][name=" + elementname + "]:checked").attr("value");
 
 if (valor + ""  == "undefined")  valor ="";
 return valor;
}

function AramaPostFromPage( sListaVarialesForm ) {
var unPost = sListaVarialesForm;
var splitPost = unPost.split("|");

 unPost = "";
 for(var i=0;i < splitPost.length; i++)
  if (splitPost[i]!="")
    if ($("#"+splitPost[i] ).val() != null )
      unPost+= ""+splitPost[i]+"="+ $("#"+splitPost[i] ).val()+"&";
  
return unPost ;
}

function getEnterSearch(sNameBotom, sFuncion,sArgumentos ){
  $('#'+sNameBotom).keypress(function(event){
      var keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13')
         var s = eval( sFuncion ( sArgumentos ) ); 
    });
}

function goDownwindow( ){
   window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
}

function goUpwindow( ){
  var offsetLeft = parseInt(document.body.leftMargin);
  var offsetTop = parseInt(document.body.topMargin);
     window.scrollTo(offsetLeft,offsetTop)
}

function returnExt (){

var  sExtSer  =  "" + String.fromCharCode(46);
      sExtSer +=  "" + String.fromCharCode(112);
      sExtSer +=  "" + String.fromCharCode(104);
      sExtSer +=  "" + String.fromCharCode(112);
 
return sExtSer;
}

function PostToArray (sAlgunPost){

 var params  = {};

 if (sAlgunPost.length  > 0 )
    var datos   = sAlgunPost.split('&');
    for (var i = 0; i < datos.length ; i++ ){
     undato = datos[i].split('=');
     params[ undato[0] ] =undato[1] ;
 }
 
return params;
}

function ReDirige(unUrl){
if (unUrl!=="")
 $(location).attr("href",unUrl);
}

function openWindowWithPostRequest( params,sPagina ) {
var winURL= sPagina;
var winName='MyWindow';        
var form = document.createElement("form");
var windowoption = "resizable=yes,height=580,width=1050,scrollbars=0,location=no,menubar=no,resizable=1,status=no,toolbar=no";
           
  form.setAttribute("method", "post");
  form.setAttribute("action", winURL);
  form.setAttribute("target", winName);

  for (var i in params) 
    if (params.hasOwnProperty(i)) {
        var input   = document.createElement('input');
        input.type  = 'hidden';
        input.name  = i;
        input.value = params[i];
        form.appendChild(input);
    }
         
   document.body.appendChild(form);
   window.open( "",winName,windowoption);

   form.target = winName;
   form.submit();
   document.body.removeChild(form);
}

function FindMyModal( ModalName,sMsgs ){

  var mymodal = $('#'+ModalName);
      mymodal.find('.modal-title').text(" Avizo");
      mymodal.find('.modal-body').text(sMsgs);
 
  return mymodal;
}

function DespliegaMSG( ModalName, sMsgs ){

  var mymodalMSG = FindMyModal(ModalName,sMsgs);
  
      mymodalMSG.find('.btn-secondary').hide();
      mymodalMSG.modal('show');
      mymodalMSG.on('hide.bs.modal', function (e) {

    });
}

function DespliegaMSGConfirmar(ModalName, sMsgs, sFuncion,sArgumentos ){
 
 var mymodalConfirmar = FindMyModal(ModalName,sMsgs);
 
     mymodalConfirmar.modal('show');
     mymodalConfirmar.on('hide.bs.modal', function (e) {
               var tmpid = $(document.activeElement).attr('id');
                if ( tmpid == "idConfirmoImprmir")
                    var s = eval( sFuncion ( sArgumentos ) );                           
   });
}

function mandaPostApagina(sPot,urlDestino , DivContenido) {

$.ajax({
       type: 'POST',
        url: urlDestino,
contentType: contentTypeFrm,
       data:  sPot,
    success: function( data ) {
               $('#' + DivContenido).html( data );
             },
      error:  function(  ) {
               $('#' + DivContenido).html( "No se pueden acceder a los datos [" +urlDestino + "]");
             }
      });
}

function mandaPostAIndex(sPot ) {

$.ajax({ 
       type: 'POST',
        url:  'index.php',
contentType: contentTypeFrm ,
       data: sPot,
    success: function( data ) {
             $('#content').html( data );
            }
       });
}

function AramaPostControlyComando(NombreControl,Comando ) {

var sPotCtrl  = "";
      sPotCtrl += 'ctrl=' + NombreControl + '&';
      sPotCtrl += 'ajax=' + Comando + '&';

return sPotCtrl ;

}

function VinculaContenido( Contenedor,Boton,Controlador,Comando ) {

 $(Contenedor).on({
    click: function() {

     var sPot = "";

     sPot += AramaPostControlyComando (Controlador,Comando);

     if ( $(this).attr('tag')  !=0  &&
          $(this).attr('tag')  !="" &&
          $(this).attr("name") !=""    )
     sPot+=  $(this).attr("name") + "=" + $(this).attr('tag') +"&";

    //request.setCharacterEncoding("UTF-8");

     var datos = $("#myForm  :input" ).serialize();
      sPot+= datos;

     $(Contenedor).html( '<img src="'+ global_data.theme +'images/load16.gif" alt="procesando" title="procesando" />' );

     mandaPostAIndex ( sPot );

    } 
 }, Boton);

}

function Load_JS_DesdeBotton(contenedorVista,IdBotton,File ) {

 $("#"+   contenedorVista ).on({
    click: function() {       
           $.getScript(_Dir_JS_+"/"+File);
          // Lo ideal seria hasta que sistem se cargara de forma dinamica.
          } 
 }, "#"+  IdBotton );
}

function LlamaDesdeBotton(contenedorVista,IdBotton,Funcion,Argumentos ) {

   $( ""+  contenedorVista ).on({
    click: function() { 
             var s = eval(   Funcion ( Argumentos ) );
           } 
    }, "#"+  IdBotton );
}

function LlamaDesdeBottonCancela(contenedorVista,IdBotton,Funcion,Argumentos ) {
  
 $( ""+  contenedorVista ).on({
    click: function(event) { 

	        event.preventDefault();

          var s = eval(   Funcion ( Argumentos ) );
	        url = $(IdBotton).attr("href");
	        function redir(){
		           $(location).attr("href",url);
	            }
	        setTimeout(redir,2000);
         } 
  }, ""+  IdBotton );
}

function objToString (obj) {
var tabjson=[];
    for (var p in obj) 
      if (obj.hasOwnProperty(p)) 
          tabjson.push('"'+p +'"'+ ':' + obj[p]);        
    tabjson.push();
return '{'+tabjson.join(',')+'}';
}

function objToPost (obj) {
var tabjson=[];
    for (var p in obj) 
        if (obj.hasOwnProperty(p)) 
            tabjson.push(p + '=' + obj[p] ); //+"'"              
    tabjson.push();
return ''+tabjson.join('&')+'';
}

function jsonEscape(str)  {
    return str.replace(/\n/g, "\\\\n").replace(/\r/g, "\\\\r").replace(/\t/g, "\\\\t");
}

function StringToObj (Unstr) {

//var new_words = Unstr.replace(/[\r\n\x0B\x0C\u0085\u2028\u2029]+/g, String.fromCharCode(13));
//var new_words = Unstr.replace(/[\r\n]+/g, " ");
//new_words = jsonEscape(Unstr);
//var new_words =JSON.stringify(Unstr);
 new_words = Unstr.replace(/[\r\n]+/g, "  ");
 //new_words = Unstr.replace(/[\\]+/g, "\\\\");
 //https://community.snowflake.com/s/article/Escaping-new-line-character-in-JSON-to-avoid-data-loading-errors
 //https://stackoverflow.com/questions/42068/how-do-i-handle-newlines-in-json
 if (Unstr != "")
  eval('var obj=' +  new_words );
 else
   var obj="";

   return obj;
}

function StringToObjHTML (Unstr) {

//var new_words = Unstr.replace(/[\r\n\x0B\x0C\u0085\u2028\u2029]+/g, String.fromCharCode(13));
//var new_words = Unstr.replace(/[\r\n]+/g, " ");
//new_words = jsonEscape(Unstr);
//var new_words =JSON.stringify(Unstr);
 //new_words = Unstr.replace(/[\r\n]+/g, "  ");
 //new_words = Unstr.replace(/[\\]+/g, "\\\\");
 //https://community.snowflake.com/s/article/Escaping-new-line-character-in-JSON-to-avoid-data-loading-errors
 //https://stackoverflow.com/questions/42068/how-do-i-handle-newlines-in-json
 // encodeURIComponent/decodeURIComponent()
 var new_words=decodeURIComponent(Unstr);
 if (Unstr != "")
  eval('var obj=' +  new_words );
 else
   var obj="";

   return obj;
}


function ValidaSession (){
var esvalido = false;

 $.ajax({
     type: "_",
    async: false,
      url: ValidaddoSession
        }).done(function( Validando) {

               var objRespond = StringToObj(Validando);

                   esvalido   = objRespond.isvalid;

               if ( esvalido + "" == "1" ||
                    esvalido + "" ==  1 ) esvalido = true;

              return esvalido;
          });

return esvalido;
}

function ValidaSessionYRedirecciona( sLinkNoValid ){

  if ( ValidaSession () != true ) {
   alert("Su session a expirado, por favor ingrese de nuevo");
   window.location = sLinkNoValid;
   return false;
  }
return true;
}

function GetDataFrom(sType,sUrl,sData){

return $.ajax({
           type: sType,
            url: sUrl,
          async: false,
           data: sData
               }).done(function( sItem) {               
                   return sItem;
                  });

}

function GetFormFromBy(sType,sUrl,sData ) {

$.ajax({ 
        type: sType,
         url:  sUrl,
 contentType: contentTypeFrm  ,
        data: sData,
     success: function( data ) {
               return data;
              }
             });
}

function GetFormFrom(sUrl,sData ) {

$.ajax({ 
        type: 'POSTT',
         url:  sUrl,
 contentType: contentTypeFrm,
        data: sData,
     success: function( data ) {
               $('#content').html( data );
              }
      });
}

var _DirMod_         = "application/view/themes/boostrap/modules/";
var _DirRepCtrl_     = "application/controller/";
var ValidaddoSession = _DirMod_ + "SessionValida.php";