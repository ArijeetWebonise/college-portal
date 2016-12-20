<?php $search=array(array('link'=>'http://localhost','result'=>'Home','desp'=>'These is a Home Page')); 
 foreach ($search as $item) {
 	if(isset($_REQUEST['q'])){
 		var_dump(strpos($_REQUEST['q'],$item['result']));
 		if(strpos($_REQUEST['q'],$item['result'])!=FALSE){
 	?>
	<li><a href="<?php echo $item['link']; ?>"><?php echo $item['result']; ?><br /><span><?php echo $item['desp']; ?></span></a></li>
 	<?php
 		}	
 	}
 }
 ?>
