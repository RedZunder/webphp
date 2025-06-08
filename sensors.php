<?php

header("Content-type: application/json");

	//I2C
	$press_raw1=shell_exec("i2cget -y 1 0x5c 0x2a");
	$press_raw2=shell_exec("i2cget -y 1 0x5c 0x29");
	$press_raw3=shell_exec("i2cget -y 1 0x5c 0x28");
	
	$temp_h=shell_exec("i2cget -y 1 0x5f 0x2b");
	$temp_l=shell_exec("i2cget -y 1 0x5f 0x2a");
	
	$hum_h=shell_exec("i2cget -y 1 0x5f 0x29");
	$hum_l=shell_exec("i2cget -y 1 0x5f 0x28");
	
	$acc_x_h=shell_exec("i2cget -y 1 0x1c 0x29");
	$acc_x_l=shell_exec("i2cget -y 1 0x1c 0x28");
	$acc_y_h=shell_exec("i2cget -y 1 0x1c 0x2b");
	$acc_y_l=shell_exec("i2cget -y 1 0x1c 0x2a");
	$acc_z_h=shell_exec("i2cget -y 1 0x1c 0x2d");
	$acc_z_l=shell_exec("i2cget -y 1 0x1c 0x2c");
	
	
	
	
	
	
	//PRESSURE
	$out["s1"]["sensor"]="pressure";
	$out["s1"]["value"]=(hexdec($press_raw1)*256*256+hexdec($press_raw2)*256+hexdec($press_raw3))/4096;
	$out["s1"]["unit"]="hPa";
	
	//TEMPERATURE
	$out["s2"]["sensor"]="temperature";
	$out["s2"]["value"]=8*((hexdec($temp_h)*256+hexdec($temp_l))-300)/200;
	$out["s2"]["unit"]="°C";
	
	//HUMIDITY
	$out["s3"]["sensor"]="humidity";
	$out["s3"]["value"]=2*((hexdec($hum_h)*256+hexdec($hum_l))-4000)/2000;
	$out["s3"]["unit"]="%";
	
	//ACC
	$out["lx"]["sensor"]="linear x";
	$out["lx"]["value"]=(hexdec($acc_x_h)*256+hexdec($acc_x_l));
	$out["lx"]["unit"]="deg";
	$out["ly"]["sensor"]="linear x";
	$out["ly"]["value"]=(hexdec($acc_y_h)*256+hexdec($acc_y_l));
	$out["ly"]["unit"]="deg";
	$out["lz"]["sensor"]="linear x";
	$out["lz"]["value"]=(hexdec($acc_z_h)*256+hexdec($acc_z_l));
	$out["lz"]["unit"]="deg";
	
	
	echo json_encode($out);



?>