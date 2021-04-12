<?php
$HeadPage  ="<nav class=".chr(34)."navbar navbar-static-top navbar-custom".chr(34)." role=".chr(34)."navigation".chr(34)." style=".chr(34)."margin-bottom: 0".chr(34).">";
$HeadPage .=  "<div class=".chr(34)."navbar-header".chr(34).">";
$HeadPage .=       "<button type=".chr(34)."button".chr(34)." class=".chr(34)."navbar-toggle".chr(34)." data-toggle=".chr(34)."collapse".chr(34)." data-target=".chr(34).".navbar-collapse".chr(34).">";
$HeadPage .=               "<span class=".chr(34)."sr-only".chr(34).">Toggle navigation</span>";
$HeadPage .=               "<span class=".chr(34)."icon-bar".chr(34)."></span>";
$HeadPage .=               "<span class=".chr(34)."icon-bar".chr(34)."></span>";
$HeadPage .=               "<span class=".chr(34)."icon-bar".chr(34)."></span>";
$HeadPage .=       "</button>";
$HeadPage .=       "<a class=".chr(34)."navbar-brand".chr(34)." href=".chr(34)."#".chr(34)."><img alt=".chr(34)."".chr(34)." src=".chr(34).__IMAGENES__."".chr(34)."></a>";
$HeadPage .=       "<p class=".chr(34)."navbar-text".chr(34).">"." Noticias RSS "."</p>";
$HeadPage .= "</div>";                       
$HeadPage .="</nav>";
echo $HeadPage;
?>