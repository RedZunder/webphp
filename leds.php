<?php

header("Content-type: application/json");


$js=json_decode(file_get_contents("matrix.json"), true);

$x=intval($_GET["x"]);
$y=intval($_GET["y"]);
$r=intval($_GET["r"]);
$g=intval($_GET["g"]);
$b=intval($_GET["b"]);

$index = $x + 8 * $y;

echo "$index\n";

$js[$index][0]=$r;
$js[$index][1]=$g;
$js[$index][2]=$b;

echo json_encode($js);
file_put_contents("matrix.json",json_encode($js));

?>
