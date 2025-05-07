<?php

header("Content-type: application/json");

/**
 * Communicate via I2C with the sensors of the SenseHat using known register addresses
 */


switch($_GET["ver"])
{
	case '1':
	
	$keys=['P','hPa','mmHg','%','0-1','H','T','C','F','r','p','y','rad','deg'];

	$str="python sensors.py ";
	foreach($keys as $key){
		$str.=(isset($_GET[$key]))?	
		(strlen($key)==1 && $key!='C'&& $key!='F'&& $key!='%')? "-$key ": "$key " : "";
	}

	$out=shell_exec($str);
	echo $out;
	
	
	break;
	
	case '2':
	$raw1=shell_exec("i2cget -y 1 0x5c 0x2a");
	$raw2=shell_exec("i2cget -y 1 0x5c 0x29");
	$raw3=shell_exec("i2cget -y 1 0x5c 0x28");

	//get all register values of pressure measurement
	$out["sensor"]="pressure";
	$out["value"]=(hexdec($raw1)*256*256+hexdec($raw2)*256+hexdec($raw3))/4096;
	$out["unit"]="hPa";
	
	echo json_encode($out);
	
	break;
	
}



?>