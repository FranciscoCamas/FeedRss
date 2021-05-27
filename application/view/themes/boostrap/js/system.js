var contentTypeTxt='text/html; charset=UTF-8';
var contentTypeFrm='application/x-www-form-urlencoded; charset=UTF-8';
var _DirMod_         = "application/view/themes/boostrap/modules/";
var _DirRepCtrl_     = "application/controller/";
var ValidaddoSession = _DirMod_ + "SessionValida.php";
function getEnterSearch(sNameBotom, sFuncion,sArgumentos ){
  $('#'+sNameBotom).keypress(function(event){
      let keycode = (event.keyCode ? event.keyCode : event.which);
      if(keycode == '13')
          eval( sFuncion ( sArgumentos ) ); 
    });
}
function VinculaContenido( Contenedor,Boton,Controlador,Comando ) {

 $(Contenedor).on({
    click: function() {

     let sPot = "";

     sPot += AramaPostControlyComando (Controlador,Comando);

     if ( $(this).attr('tag')  !=0  &&
          $(this).attr('tag')  !="" &&
          $(this).attr("name") !=""    )
     sPot+=  $(this).attr("name") + "=" + $(this).attr('tag') +"&";


     let datos = $("#myForm  :input" ).serialize();
      sPot+= datos;

     $(Contenedor).html( '<img src="'+ global_data.theme +'images/load16.gif" alt="procesando" title="procesando" />' );

     mandaPostAIndex ( sPot );

    } 
 }, Boton);

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


function goDownwindow( ){
   window.scrollTo(0, document.body.scrollHeight || document.documentElement.scrollHeight);
}

function goUpwindow( ){
  let offsetLeft = parseInt(document.body.leftMargin);
  let offsetTop = parseInt(document.body.topMargin);
     window.scrollTo(offsetLeft,offsetTop)
}





function FindMyModal( ModalName,sMsgs ){

  let mymodal = $('#'+ModalName);
      mymodal.find('.modal-title').text(" Avizo");
      mymodal.find('.modal-body').text(sMsgs);
 
  return mymodal;
}

function DespliegaMSG( ModalName, sMsgs ){

  let mymodalMSG = FindMyModal(ModalName,sMsgs);
  
      mymodalMSG.find('.btn-secondary').hide();
      mymodalMSG.modal('show');
      mymodalMSG.on('hide.bs.modal', function (e) {

    });
}

function DespliegaMSGConfirmar(ModalName, sMsgs, sFuncion,sArgumentos ){
 
 let mymodalConfirmar = FindMyModal(ModalName,sMsgs);
 
     mymodalConfirmar.modal('show');
     mymodalConfirmar.on('hide.bs.modal', function (e) {
               var tmpid = $(document.activeElement).attr('id');
                if ( tmpid == "idConfirmoImprmir")
                    var s = eval( sFuncion ( sArgumentos ) );                           
   });
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

 let new_wordss = Unstr.replace(/[\r\n]+/g, "  ");

 if (Unstr != "")
  eval('var obj=' +  new_wordss );
 else
   var obj="";
delete new_wordss;
   return obj;
}

function StringToObjHTML (Unstr) {
 let new_words=decodeURIComponent(Unstr);
 if (Unstr != "")
  eval('var obj=' +  new_words );
 else
   var obj="";
 
 delete new_words;
  
  return obj;
}