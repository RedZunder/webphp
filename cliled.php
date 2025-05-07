<?php

header("Content-type: application/json");

switch($_SERVER["REQUEST_METHOD"])
{
	case 'GET':
	
		$outp=shell_exec("python cliled.py -s");
		echo $outp;
	break;
	
	case 'POST':
	
	$x=intval($_POST["x"]);
		$y=intval($_POST["y"]);
		$r=intval($_POST["r"]);
		$g=intval($_POST["g"]);
		$b=intval($_POST["b"]);

		$leds=json_decode(file_get_contents("leds.json"), true);

		shell_exec("python cliled.py -x $x -y $y -r $r -g $g -b $b");
		
	
	break;
	
	default: echo "Misspelled\n\n";	break;
}






?>