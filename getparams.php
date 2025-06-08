<?php


header("Content-type: application/json");
/*
if(isset($_GET['x']) AND isset($_GET['y']) AND isset($_GET['r']) AND
 isset($_GET['g']) AND isset($_GET['b']))
 {
	echo json_encode($_GET);
	 
	$x=intval($_GET["x"]);
	$y=intval($_GET["y"]);
	$r=intval($_GET["r"]);
	$g=intval($_GET["g"]);
	$b=intval($_GET["b"]);

	$leds=json_decode(file_get_contents("leds.json"), true);

	$index = $x + 8*$y;

	$leds[$index][0]=$r;
	$leds[$index][1]=$g;
	$leds[$index][2]=$b;

	file_put_contents("leds.json",json_encode($leds));


 } 
 else
 {
	 echo '{"ERROR" : "Not all parameters are set"}';
 }
 */
 
 




$data['humidity']=rand(0,100);
$data['pressure']=rand(0,1000);
$data['temperature']=rand(-20,50);
$data['accelerometer']=[rand(-10,10),rand(-10,10),rand(-10,10)];
$data['gyroscope']=[rand(-10,10),rand(-10,10),rand(-10,10)];



if(isset($_GET['sensor']))
{
	$out[$_GET['sensor']]=$data[$_GET['sensor']];
	
	switch($_GET['sensor'])
	{
		case 'temperature':$unit=' Celsius';break;
		case 'humidity':$unit=' %';break;

		case 'pressure':$unit=' milibar';break;

		case 'accelerometer':$unit=' Gs';break;
		case 'gyroscope':$unit=' rads/s';break;

	}
	
	
	
	$out['unit']=$unit;
	echo json_encode($out);
}
else
{
	echo json_encode($data);

}




?>