<?php

header("Content-type: application/json");

switch($_SERVER["REQUEST_METHOD"])
{
	case 'GET':
		//sensehat address
		$adds=0x46;
		$leds=array();

		for($i = 0; $i < 64; i++)
		{
			// 0 - 63 -> 0-8, 0-8
			$x=$i % 8;
			$y=floor($i/8);
			
			//LED matrix starts at 0x00 - 0xc0 (192)
			$r_reg=dechex($x + 24*$y);
			$g_reg=dechex($x + 24*$y + 8);
			$b_reg=dechex($x + 24*$y + 16);

			$r_val = shell_exec("i2cget -y 1 $adds $r_reg");
			$g_val = shell_exec("i2cget -y 1 $adds $g_reg"); 
			$b_val = shell_exec("i2cget -y 1 $adds $b_reg");

			//save the RGB into an array
			$led=array($r_val;$g_val,$b_val);
			//append it to the matrix
			array_push($leds, $led);
		}
		
		print_r($leds);

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