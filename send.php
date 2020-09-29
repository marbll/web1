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
 $x = $result[0];
 $y = $result[1];
 $r = $result[2];

 $flag =  true;

 if (is_numeric($x) && strlen(explode('.', $x)[1]) == 0 && $x >= -4 && $x <= 4){
     $x = intval($x);
     $result[0] = $x;
 }else {
     $flag = false;
 }
if (is_numeric($y) && $y > -3 && $y < 5){
    $y = floatval($y);
    trim($y,'0');
    $y = floatval($y);
    $result[1] = $y;
    if (strlen(explode('.', $y)[1]) > 10){
        $flag = false;
    }

}else {
    $flag = false;
}
if (is_numeric($r) && strlen(explode('.', $r)[1]) <= 0 && $r >= 1 && $r <= 5){
    $r = intval($r);
    $result[2] = $r;
}else {
    $flag = false;
}

foreach ($_SESSION['history'] as $res) {
    echo "<tr class='row'>";
    echo "<td>$res[0]</td>";
    echo "<td>$res[1]</td>";
    echo "<td>$res[2]</td>";
    echo "<td>$res[3]</td>";
    echo "<td>$res[4]</td>";
    echo "<td>$res[5]</td></tr>";
}

if ($flag){

    echo "<tr class='row'>";
    echo "<td>$x</td>";
    echo "<td>$y</td>";
    echo "<td>$r</td>";
    if (checkRes($result[0], $result[1], $result[2])) {
        array_push($result, "true");
        echo "<td>true</td>";
    }
    else {
        echo "<td>false</td>";
        array_push($result, "false");
    }
    $date = date("h:i:sa");
    array_push($result, $date);
    echo "<td>$date</td>";
    $resTime = round((microtime() - $start) * 1000, 3) . " mks";
    echo "<td>$resTime</td></tr>";

    array_push($result, $resTime);

    array_push($_SESSION['history'], $result);
}else{
    //echo "Data is invalid";
}
