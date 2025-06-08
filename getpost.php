<?php

header("Content-type: application/json");

$data['humidity']=rand(0,100);
$data['pressure']=rand(0,1000);
$data['temperature']=rand(-20,50);
$data['accelerometer']=[rand(-10,10),rand(-10,10),rand(-10,10)];
$data['gyroscope']=[rand(-10,10),rand(-10,10),rand(-10,10)];


switch($_SERVER["REQUEST_METHOD"])
{
	case 'GET': 
		echo "OK-GET\n";
		
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
			echo "\n\n";
		}
		else
		{
			echo json_encode($data);

		}
		/*if(isset(last_led))		//To get last modified LED
		{
			$leds=json_decode(file_get_contents("leds.json"), true);
			$index = $x + 8*$y;
			echo "Last LED saved $x,$y :\n";
			echo "R: $leds[$index][0]\n";
			echo "G: $leds[$index][1]\n";
			echo "B: $leds[$index][2]\n";
		}*/

	echo "\n\n";
	break;
	
	
	
	
	
	case 'POST': 
		echo "OK-POST\n";
	 
		$x=intval($_POST["x"]);
		$y=intval($_POST["y"]);
		$r=intval($_POST["r"]);
		$g=intval($_POST["g"]);
		$b=intval($_POST["b"]);

		$leds=json_decode(file_get_contents("leds.json"), true);

		$index = $x + 8*$y;

		$leds[$index][0]=$r;
		$leds[$index][1]=$g;
		$leds[$index][2]=$b;
		$last_led=[$x,$y];
		
		file_put_contents("leds.json",json_encode($leds));

	echo "\n\n";
	
	break;
	
	
	default:	echo "You made a mistake\n";	break;
}






?>