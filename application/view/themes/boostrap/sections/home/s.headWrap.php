<?php
$sIniWraper="<div id=".chr(34)."page-wrapper".chr(34).">";

function GeneraDivClass($sClass){	   
	   
    $sDiv="<div Class=".chr(34).$sClass.chr(34).">";	   
	  return $sDiv; 
}
/*
<div id="page-wrapper">
 <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">                  
                <div class="panel-body">
                    <div class="row">
*/
echo $sIniWraper;
echo GeneraDivClass("container-fluid");
//echo GeneraDivClass("row");
//echo GeneraDivClass("col-lg-8");
echo GeneraDivClass("panel-body");
echo GeneraDivClass("row");
?>