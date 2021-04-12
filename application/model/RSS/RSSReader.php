<?php
$starttime = explode(' ', microtime());
$starttime = $starttime[1] + $starttime[0];

include_once('inc/simplepie-1.5/autoloader.php');

class RSSLector{

var $feed  = null;
var $error = "";
var $RSS   = array();

public function __construct() {

//grab the feed
$this->feed = new SimplePie();
    
//enable caching
$this->feed->enable_cache(true);
    
//provide the caching folder
$this->feed->set_cache_location('../../../cache');
    
//set the amount of seconds you want to cache the feed
$this->feed->set_cache_duration(1800);
    
}
  
 public function getRSSPublicado($sURL_RSS){
 /*
$this->feed->set_feed_url(array(
    	'https://www.yucatan.com.mx/feed',
    	'https://www.poresto.net/rss/feed.html?r=1',
    	'http://news.google.com/news?ned=us&topic=h&output=rss'
    ));
*/
$this->feed->set_feed_url($sURL_RSS);
 //init the process
$this->feed->init();
    
//let simplepie handle the content type (atom, RSS...)
$this->feed->handle_content_type();

$tmp=array();


$serror = "";
if ($this->feed->error){
		$this->error  = $this->feed->error;
    return -1;
}
		 
 foreach($this->feed->get_items() as $item){

 $feed = $item->get_feed();
 $cat=array();

 if ($feed){

  $tmp['Sourcepermalink']  = $feed->get_permalink();
  $tmp['Sourcetitle']      = $feed->get_title();
 
  $tmp['Image_link']       = $feed->get_image_link(); 
  $tmp['Image_title']      = $feed->get_image_title();
  $tmp['Image_url']        = $feed->get_image_url() ;
  $tmp['Image_width']      = $feed->get_image_width() ;
  $tmp['Image_height']     = $feed->get_image_height();
  
  if ($enclosure = $item->get_enclosure()){
  $tmp['Title']           = $enclosure->get_title(); 
  $tmp['Permalink']       = $item->get_permalink();
  $tmp['Thumbnail']       = $enclosure->get_thumbnail();
  $tmp['Description']     = $enclosure->get_description();
  $tmp['Imagelink']       = $enclosure->get_link();
  }
        
  $tmp['Permalink']       = $item->get_permalink();
  $tmp['Link']            = $item->get_link();
  //$tmp['Date']            = $item->get_date("j M Y | g:i a T ");//'j M Y | g:i a T' //F j, Y, g:i a P
  
  $tmp['Date']            = $item->get_date("Y-m-d H:i:s");
  $tmp['Link']            = $item->get_link();
  
  $tmp['Content']         = $item->get_content();
  $tmp['Title']           = $item->get_title();
    
  $tmp['Description']     = $item->get_description();
  $tmp['source']          = $item->get_item_tags('','source')[0]["data"];
   
   $tmp['Categories']="";
   if ($item->get_categories())
     foreach ($item->get_categories() as $category){
      array_push($cat, $category->get_label()); 
      $tmp['Categories'].=$category->get_label().",";
     }   
    else
     if ($category = $item->get_category()){
       array_push($cat, $category->get_category());
       $tmp['Categories'].=$category->get_category()."";
     }
     
   $tmp['categories']=$cat;
   
    array_push($this->RSS, $tmp);
  }
 }
 return 1;
} 

public function PrintRSS($unRSS){

  $sRss= '<div class="chunk">';
  $sRss.=  '<a href="' .$unRSS['Image_link'] . '" title="' . $unRSS['Image_title'] . '">';
  $sRss.=  '<img src="' .  $unRSS['Image_url']. '" width="' . $unRSS['Image_width']. '" height="' . $unRSS['Image_height'] . '" />';
 $sRss.="</a>";
  $sRss.= '<h4 style="background:url("';
    $sRss.=$unRSS['Imagelink']; 
   $sRss.= '") no-repeat; text-indent: 25px; margin: 0 0 10px;">';
   
   $sRss.= '<a href="'.$unRSS['Permalink'].'">'.$unRSS['Title']."</a>";
   $sRss.= '</h4>';
      
   $sRss.= '<small>'. $unRSS['Description'].'</small><br>';
   $sRss.= '<small>'. $unRSS['Imagelink'].'</small><br>'; 
  
    
   $sRss.='<p class="footnote">Fuente:';
   $sRss.=' 	<a href="'.$unRSS['Sourcepermalink'].'">'.$unRSS['Sourcetitle'].'</a> | '.$unRSS['Date'].''.'<br>';;
  
   
   $listaCat="";
   foreach ($unRSS['categories'] as $unaCat)
     $listaCat.=$unaCat.", ";
   
   if ($listaCat =="" ) 
     $listaCat="Ninguna";
   else
     $listaCat= substr($listaCat, 0, -2); 
    
   if ( count($unRSS['categories'] ) >1 ) 
    $sRss.= 'Categorias: ';
    else 
     $sRss.= 'Categoria: ';
     
    $sRss.=$listaCat;
   $sRss.=  '<br>';
   $sRss.=' </p>';
    			     
   $sRss.='</div>';
 
  return $sRss;
}

public function DisplayAllRSSFrom($unLink){
   if ( !$this->getRSSPublicado($unLink) ) 
      echo "<p>".$this->error."</p>";
    else
      foreach ($this->RSS as $unRSS)
     echo $this->PrintRSS($unRSS);
}

}

/*  Ejemplo de uso
    $RssLector = new RSSLector();  
    $RssLector->DisplayAllRSSFrom("https://www.yucatan.com.mx/feed");  
    $RssLector->DisplayAllRSSFrom("https://www.poresto.net/rss/feed.html?r=1");
    $RssLector->DisplayAllRSSFrom("http://news.google.com/news?ned=us&topic=h&output=rss");
 */ 
?>