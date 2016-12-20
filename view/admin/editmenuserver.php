[<?php
	$list=json_decode($_REQUEST["list"]);
	foreach ($list as $key => $item) {
		if($item=='item'.$key){
			if ($key!=0) {
				echo ",";
			}
			echo '"'.$item.'"';
		}
	}
?>
]
