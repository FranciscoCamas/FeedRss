function GeneraBotonParaGrid( NombreBoton, claseBoton, sTextoBoton,Funcion,Argumentos,sToolTipBoton) {
 //let untexto  = "<span class="+ String.fromCharCode(34)+"glyphicon glyphicon-arrow-up"+ String.fromCharCode(34)+">Cargar</span>";
 let untexto  = sTextoBoton;
 let unbutton = $("<button>").attr("type", "button").text(untexto);
 unbutton.attr("id",    NombreBoton );
 unbutton.attr("name",  NombreBoton );
 unbutton.attr("class", claseBoton  );
  if (sToolTipBoton != "")
  {
    unbutton.attr("data-toggle",   "tooltip" );
    unbutton.attr("title",         sToolTipBoton   );

  }

 if (Funcion != "")
  {
  unbutton.on("click",
                  function (e) {
                  //  $( this ).off( event );
                  e.preventDefault();
                  e.stopPropagation();
                   //$(this).prop('disabled', true);
                  let s = eval(   Funcion ( Argumentos ) );
                //   $(this).prop('disabled', false);
                  //$( this ).on( event );
             });
  }
 return unbutton;
}


function GeneraBotonParaGridIndex( sname, swidth, unIndice) {
 //let untexto  = "<span class="+ String.fromCharCode(34)+"glyphicon glyphicon-arrow-up"+ String.fromCharCode(34)+">Cargar</span>";
let fieldsIndice = [
  { name: sname,   title: sname, align: "center",  width:swidth,
    itemTemplate:  function(_, item){ 
                             eval(  unIndice.value++); return unIndice.value;}
                             }
];
  
 return fieldsIndice;
}

 

function configuraGrid( sNombreGrid,bInserting,bEditing,bSorting,bAutoload,bPaging,nPageSize,nPageButtonCount) {

  $("#" + sNombreGrid).jsGrid({
      //height:    "100%",
      width:     "100%",
      //filtering: true,
      filtering:       false,
      inserting:       bInserting,
      editing:         bEditing,
      sorting:         bSorting,

      autoload:        bAutoload,

      paging:          bPaging,
      pageLoading:     true,
      
      pageSize:        nPageSize,
      pageButtonCount: nPageButtonCount,
      loadIndication: true,
      /*hardocding*/  
      pageLoading:     true,
    
      pagerFormat: "Pagina Actual: {pageIndex} &nbsp;&nbsp; {first} {prev} {pages} {next} {last} &nbsp;&nbsp; de un total de : {pageCount} Paginas",
      pagePrevText: "<",
      pageNextText: ">",
      pageFirstText: "<<",
      pageLastText: ">>",
      pageNavigatorNextText: "&#8230;",
      pageNavigatorPrevText: "&#8230;",
         //locale: "es", X
      })
}

function configuraGridTextPage( sNombreGrid, Containerpager ="") {

 if(Containerpager!="")
  $("#" + sNombreGrid).jsGrid({
 
      pagerContainer: "#"+Containerpager,
      pagerFormat: "Pagina Actual: {pageIndex} &nbsp;&nbsp; {first} {prev} {pages} {next} {last} &nbsp;&nbsp; de un total de : {pageCount} Paginas",
      pagePrevText: "<",
      pageNextText: ">",
      pageFirstText: "<<",
      pageLastText: ">>",
      pageNavigatorNextText: "&#8230;",
      pageNavigatorPrevText: "&#8230;",

  })

}

function CargaGridWith(GridName,URLToSend,unPostConDatos,sType){

  $.ajax({              
            type: sType, 
             url: URLToSend,
          basync: false,
            data: unPostConDatos
         }).done( function( objResponde) {
                  let objRespond = StringToObj(objResponde);

                $("#" + GridName ).jsGrid({
                
                 itemsCount: objRespond.itemsCount,
                       data: objRespond.data  /* CARGA POR OMICION*/
          
                   

                         });
               });
 }
 
 
function CargaGrid(GridName,URLToSend,unPostConDatos){

  CargaGridWith(GridName,URLToSend,unPostConDatos,"_")
 
 }

function CargaGridWithPaginacion(GridName,URLToSend,unPostConDatos,sType){
                     
 $("#" +GridName ).jsGrid({

          controller:{
                   
                   loadData:function(filter) {
                                                                              
                                   unPostConDatos.pageIndex = filter.pageIndex;
                                   unPostConDatos.pageSize  = filter.pageSize;
                                 
                                 let d = $.Deferred();

                                 $.ajax({
                                    type: sType,
                                     url: URLToSend,
                                   async: false,
                                    data: unPostConDatos,
                                 success: function (datas) {
                                            //let objResponcei = StringToObj(datas);     
                                            let objResponcei   = StringToObjHTML(datas);                                     
                                           // let objResponcei =$.parseJSON(datas);
                                           //let objResponcei =JSON.parse(datas);
                                            let da = {
			        		                                     data       : objResponcei.data, 		        		      
			        		                                     itemsCount : objResponcei.itemsCount,
			        	                                     };   	                                                 
                                            d.resolve(da);
                                          },
                                  error:  function(e) {
                                          console.log("error: " + e.responseText);
                                          }
                                });

                                return d.promise();
                             },
               // pageIndex:       1,
                insertItem: function(item) { return GetDataFrom("+",   URLToSend, item); },
                updateItem: function(item) { return GetDataFrom("PUT", URLToSend, item); },
                deleteItem: function(item) { return GetDataFrom("-",   URLToSend, item); },   
                
                 }                                                
         });
}

function SetFielsAndIndexGridWithPaginacion(GridName,Arrayfields,algunIndice,nPageSize){
  
  $("#" + GridName).jsGrid({ 
                             fields: Arrayfields,
                      onPageChanged: function(args) { algunIndice.value = ( args.pageIndex-1) * 10; },
                        onRefreshed: function(args) { algunIndice.value = 0;}
  });
  
}

function doSearchInGridWith(GridName,filter,URLToSend,sType){

 $("#" +GridName ).jsGrid({

          controller:{
                      loadData:function() {

                                let d = $.Deferred();

                                $.ajax({
                                    type: sType,
                                     url: URLToSend,
                                   async: false,
                                    data: filter,
                                 success: function (datas) {
                                         
                                           let objResponcei=StringToObj(datas);
                                           d.resolve(objResponcei.data);
                                           d.resolve(objResponcei.itemsCount);
                                           
                                          },
                                  error:  function(e) {
                                          alert("error: " + e.responseText);
                                          }
                                });

                                return d.promise();
                             }
                        },
                        pageSize:        10,
                        pageButtonCount: 5,
                        pageIndex:       1,
                        loadIndication: true,
                        loadMessage:		"Por favor, espere...",
                        loadShading:    true
         });

}

function doSearchInGrid(GridName,filter,URLToSend){

doSearchInGridWith(GridName,filter,URLToSend,'_');

}


function InsertFromControlGrid(sGrid,item)
{
 $("#" + sGrid).jsGrid("insertItem", item);
}

function DeleteFromControlGrid(sGrid,item)
{

 let resultado = confirm("Realmente desea borrar?");

 if (resultado == true)
  {
   $("#" + sGrid).jsGrid( { confirmDeleting: false } );
   $("#" + sGrid).jsGrid( "deleteItem",      item    );
   $("#" + sGrid).jsGrid( { confirmDeleting: true  } );
 }

}


function UpdateFromControlGrid(sGrid,item)
{
 $("#" + sGrid).jsGrid("updateItem", item);
}

function SetControlGrid(sGrid,sUrl)
{

 $("#" + sGrid).jsGrid({

            controller: {             
                   insertItem: function(item) { return GetDataFrom("+",   sUrl, item); },
                   updateItem: function(item) { return GetDataFrom("PUT", sUrl, item); },
                   deleteItem: function(item) { return GetDataFrom("-",   sUrl, item); }                                             
                   }
               });
}

function TextForHeaderFiel( sHEaderText ) {
  return  $("<text>").attr("type", "text").text(sHEaderText + "");
 }

function GeneraBotonConFuncion( alienacion, tam,CaptionHeader, sNombre,sStiloBtn,sCaptionBoton,SFuncion ,sToolTipBoton ){

 let unBoton = [{
            name: sNombre, align: alienacion,  width: tam,
  headerTemplate: TextForHeaderFiel(CaptionHeader ),
    itemTemplate: function(_, item) {
   								 return GeneraBotonParaGrid(sNombre, sStiloBtn, sCaptionBoton,SFuncion,item,sToolTipBoton);
                  }
   }];
   
    
return unBoton;
}