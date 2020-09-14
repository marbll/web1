<?php
session_start();
date_default_timezone_set('Europe/Moscow');
$start = microtime();


function checkRes($x, $y, $r){
    if ((($x * $x + $y * $y) <= $r * $r && $x >= 0 && $y <= 0) ||
    ($y <= $x + $r / 2 && $x <= 0 && $y >= 0) ||
    ($x >= 0 && $y >= 0 && $x <= $r && $y <= $r / 2)) {
        return true;
    }
    else {
        return false;
    }
}



if (!isset($_SESSION['history'])) {
$_SESSION['history'] = array();
}


$result = [$_GET['x'], $_GET['y'], $_GET['r']];


array_push($result, date("h:i:sa"));

foreach ($_SESSION['history'] as $res) {
echo "<tr class='row'><td>$res[0]</td>";
echo "<td>$res[1]</td>";
echo "<td>$res[2]</td>";
if (checkRes($res[0], $res[1], $res[2])) {echo "<td>true</td>";}
else {echo "<td>false</td>";}
echo "<td>$res[3]</td>";
echo "<td>$res[4]</td></tr>";

}


echo "<tr class='row'><td>$result[0]</td>";
echo "<td>$result[1]</td>";
echo "<td>$result[2]</td>";
if (checkRes($result[0], $result[1], $result[2])) {echo "<td>true</td>";}
else {echo "<td>false</td>";}
echo "<td>$result[3]</td>";
$resTime = round((microtime() - $start) * 1000, 3) . " mks";
echo "<td>$resTime</td></tr>";



array_push($result, $resTime);

array_push($_SESSION['history'], $result);