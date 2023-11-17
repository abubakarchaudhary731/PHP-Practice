<?php
echo "Function <br>";

function Total($arr) {
    $sum = 0;
    foreach ($arr as $value) {
        $sum += $value;
    }
return $sum;
}

$AB = [100, 92, 100, 95, 91];
$umer = [30, 25, 54, 73, 17];
$AB_total = Total($AB);
$umer_total = Total($umer);
echo "Total Marks of AB is $AB_total/500 <br>";
echo "Total Marks of Umer is $umer_total/500 <br>";




?>