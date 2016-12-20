[
<?php 
	$tern=$_REQUEST['term'];
	$list=array("ActionScript",
	"AppleScript",
	"Asp",
	"BASIC",
	"C",
	"C++",
	"Clojure",
	"COBOL",
	"ColdFusion",
	"Erlang",
	"Fortran",
	"Groovy",
	"Haskell",
	"Java",
	"JavaScript",
	"Lisp",
	"Perl",
	"PHP",
	"Python",
	"Ruby",
	"Scala",
	"Scheme");
$f=FALSE;
	foreach ($list as $key => $item) {
		if(strpos(strtoupper($item), strtoupper($tern))!== FALSE){
			if($f){
				echo ",";
			}
			echo '"'.$item.'"';
			$f=TRUE;
		}
	}

?>
]
