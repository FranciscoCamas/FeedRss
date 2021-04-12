var opts = {
  lines: 13 // The number of lines to draw
, length: 29 // The length of each line
, width: 22 // The line thickness
, radius: 42 // The radius of the inner circle
, scale: 1.5 // Scales overall size of the spinner
, corners: 0.8 // Corner roundness (0..1)
, color: '#000' // #rgb or #rrggbb or array of colors
, opacity: 0.35 // Opacity of the lines
, rotate: 28 // The rotation offset
, direction: 1 // 1: clockwise, -1: counterclockwise
, speed: 1.3 // Rounds per second
, trail: 37 // Afterglow percentage
, fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
, zIndex: 2e9 // The z-index (defaults to 2000000000)
, className: 'spinner' // The CSS class to assign to the spinner
, top: '110%' // Top position relative to parent
, left: '50%' // Left position relative to parent
, shadow: false // Whether to render a shadow
, hwaccel: false // Whether to use hardware acceleration
, position: 'absolute' // Element positioning
};

function getSpinner(sSpin){

var target  = document.getElementById(sSpin)
var spinner = new Spinner(opts).spin();
    target.appendChild(spinner.el);

return spinner;

}

function stopSpinner(oneSpinner){
 //setTimeout(function(){ oneSpinner.stop(); }, 200);
 oneSpinner.stop();
}
