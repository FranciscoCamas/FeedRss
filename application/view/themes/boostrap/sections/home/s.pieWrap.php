<?php
/*

                            </div><!-- /.row -->                            
                      </div><!-- /.panel-body -->  
                </div><!-- /.col-lg-8 (nested) -->      <!-- /.panel -->                                                  
           </div><!-- /.row -->
      </div>
</div>   
*/
function GeneraFinDiv(){	   
	   
    $sDiv="</div>";	   
	  return $sDiv; 
}
$divs="";//6
for ($i=0;$i<4;$divs.=GeneraFinDiv(),$i++);
echo $divs;
?>