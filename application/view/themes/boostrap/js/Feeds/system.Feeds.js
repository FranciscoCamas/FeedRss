var NombreControlador   = "Feed";var contenedorVista     = "#content";$(document).ready(function(){  CargaTodosFeed();   $('#editbox_searchFeed').keypress(function(event){  var keycode = (event.keyCode ? event.keyCode : event.which);   if(keycode == '13')    doSearchFeed();   });})