<?php

header("Content-type: application/json");


$keys=['P','hPa','mmHg','H','T','C','F','r','p','y',,'rad','deg','%','0-1'];

$str="python sensors.py ";
foreach($keys as $key){
	$str.=(isset($_GET[$key]))?	
	(strlen($key)==1 && $key!='C'&& $key!='F'&& $key!='%')? "-$key ": "$key " : "";
}
echo $str . "\n";

$out=shell_exec($str);
echo $out;





?>