<?php

header("Content-type: application/json");


switch($_GET["do"])
{
	case 'get':
	
		$adds=$_GET["adds"];
		$reg=$_GET["reg"];
		$out=shell_exec("i2cget -y 1 0x$adds 0x$reg");
		
		
		echo $out;
	break;
	
	case 'set':
		$adds=$_GET["adds"];
		$reg=$_GET["reg"];
		$value=$_GET["val"];
		
		$out=shell_exec("i2cset -y 1 $adds $reg $value");
		echo $out;
	break;

	case 'press':
	$raw=shell_exec("i2cget -y 1 0x5c 0x2a;i2cget -y 1 0x5c 0x29;i2cget -y 1 0x5c 0x28");
	echo $raw;
	
	break;
	
	default: echo "Misspelled something\n"; break;
	
}
















?>