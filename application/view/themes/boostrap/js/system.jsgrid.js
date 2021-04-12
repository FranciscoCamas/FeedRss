(function(jsGrid, $, undefined) {

  var NumberField = jsGrid.NumberField;

  function Select2Field(config) {
    this.items         = [];
    this.selectedIndex = -1;
    this.valueField    = "";
    this.textField     = "";
    this.imgField      = "";
    this.readOnly      = false;

    if (config.valueField && config.items.length)
      this.valueType = typeof config.items[0][config.valueField];
    this.sorter = this.valueType;
    NumberField.call(this, config);
  }

  Select2Field.prototype = new NumberField({
        align: "left",
    valueType: "number",

/*
      itemTemplate: function(value){
      //itemTemplate: function(_, item){

      var items         = this.items,
          valueField    = this.valueField,
          textField     = this.textField,
          imgField      = this.imgField,
          selectedIndex = this.selectedIndex;

      var resultItem = (selectedIndex ? items[selectedIndex]  : items[0]   );
      var result     = (textField     ? resultItem[textField] : resultItem );

      return (result === undefined || result === null) ? "" : result;
*/
     /*
     var resultSel2 = this._createSelect();

 resultSel2.on("change", function (e) {
        // resultSel2.on("select2:select", function (e) {
    // resultSel2.on("select", function (e) {
                        var select_val = $(e.currentTarget).val();
                        //console.log(select_val);
                        alert("["+select_val+"]");
                    });
                      alert("["+"hola"+"]");

      return  resultSel2;
*/
//itemTemplate: function(value){
itemTemplate: function(_, item){

 //alert( "obj ant de crear sle[" + objToString(_) + "]");

  //   IndiceOtrasAsig = IndiceOtrasAsig+1;
   var $result = this._createSelect();
   this._applySelect($result, this);
   $result.attr("id", item.ClaveAsignatura  );
   return   $result;
    },


    filterTemplate: function() {

      if(!this.filtering)   return "";

      var grid    = this._grid,
          $result = this.filterControl = this._createSelect();
      this._applySelect($result, this);

      if(this.autosearch) {
        $result.on("change", function(e) {
          grid.search();
        });
      }

      return $result;
    },

    insertTemplate: function() {

      if(!this.inserting)  return "";

      var $result = this.insertControl = this._createSelect();
      this._applySelect($result, this);
      return $result;
    },

    editTemplate: function(value) {

      if(!this.editing)  return this.itemTemplate(value);

      var $result = this.editControl = this._createSelect();
      (value !== undefined) && $result.val(value);
      this._applySelect($result, this);
      return $result;
    },

    filterValue: function() {
      var val = this.filterControl.val();
      return this.valueType === "number" ? parseInt(val || 0, 10) : val;
    },

    insertValue: function() {
      var val = this.insertControl.val();
      return this.valueType === "number" ? parseInt(val || 0, 10) : val;
    },

    editValue: function() {
      var val = this.editControl.val();
      return this.valueType === "number" ? parseInt(val || 0, 10) : val;
    },

    _applySelect: function(item, self)
    {
      setTimeout(function() {
        var selectSiteIcon = function(opt)
        {
          var img = '';
          try {
            img = opt.element.attributes.img.value;
          } catch(e) {}
          if (!opt.id || !img)
            return opt.text;
          var res = $('<span><img src="' + img + '" class="img-flag"/> ' + opt.text + '</span>');
          return res;
        }
        item.select2({
          placeholder: '---placeholder---',
          width: self.width,
          templateResult: selectSiteIcon,
          templateSelection: selectSiteIcon
        });
      });
    },

    _createSelect: function() {
      var $result       = $('<select id="' +  'Horario' + ""+ '" >'),
          valueField    = this.valueField,
          textField     = this.textField,
          imgField      = this.imgField,
          selectedIndex = this.selectedIndex;

           //alert('Horario' + LimInfMisOtrasAsig);
      $.each(this.items, function(_, item) {
        //var value = valueField ? item[valueField] : index,
        var value =  item[valueField],
            text  = textField  ? item[textField]  : item,
            img   = imgField   ? item[imgField]   : '';

       //alert("["+ value +"]");

        var $option = $("<option>")
            .attr("value", value)
            .attr("img", img)
            .text(text);
            //.appendTo($result);

    // $option.text(value);
          //  if($.inArray(value, selected) > -1) {
      //  $option.prop("selected", (selectedIndex === index));
    //  $option.prop("selected", (selectedIndex == index ? "selected":""));
      //  $option.prop("selected", "selected");
      $result.append($option);
      });



      return $result;
    }
  });

  jsGrid.fields.select2 = jsGrid.Select2Field = Select2Field;

}(jsGrid, jQuery));

function GeneraBotonParaGrid( NombreBoton, claseBoton, sTextoBoton,Funcion,Argumentos,sToolTipBoton) {
 //var untexto  = "<span class="+ String.fromCharCode(34)+"glyphicon glyphicon-arrow-up"+ String.fromCharCode(34)+">Cargar</span>";
 var untexto  = sTextoBoton;
 var unbutton = $("<button>").attr("type", "button").text(untexto);
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
                  var s = eval(   Funcion ( Argumentos ) );
                //   $(this).prop('disabled', false);
                  //$( this ).on( event );
             });
  }
 return unbutton;
}


function GeneraBotonParaGridIndex( sname, swidth, unIndice) {
 //var untexto  = "<span class="+ String.fromCharCode(34)+"glyphicon glyphicon-arrow-up"+ String.fromCharCode(34)+">Cargar</span>";
var fieldsIndice = [
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
                  var objRespond = StringToObj(objResponde);

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
                                 
                                 var d = $.Deferred();

                                 $.ajax({
                                    type: sType,
                                     url: URLToSend,
                                   async: false,
                                    data: unPostConDatos,
                                 success: function (datas) {
                                            //var objResponcei = StringToObj(datas);     
                                            var objResponcei   = StringToObjHTML(datas);                                     
                                           // var objResponcei =$.parseJSON(datas);
                                           //var objResponcei =JSON.parse(datas);
                                            var da = {
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

                                var d = $.Deferred();

                                $.ajax({
                                    type: sType,
                                     url: URLToSend,
                                   async: false,
                                    data: filter,
                                 success: function (datas) {
                                         
                                           var objResponcei=StringToObj(datas);
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

 var resultado = confirm("Realmente desea borrar?");

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

 var unBoton = [{
            name: sNombre, align: alienacion,  width: tam,
  headerTemplate: TextForHeaderFiel(CaptionHeader ),
    itemTemplate: function(_, item) {
   								 return GeneraBotonParaGrid(sNombre, sStiloBtn, sCaptionBoton,SFuncion,item,sToolTipBoton);
                  }
   }];
   
    
return unBoton;
}