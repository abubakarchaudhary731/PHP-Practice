<!-- FOR LOOP  -->
<?php 
echo "For Loop <br>";
for ($i=0; $i < 4; $i++) { 
    echo "$i <br>";
}
?>

<!-- FOR EACH LOOP  -->
<?php 
echo "ForEach Loop <br>";
$arr = array("AB", "Bakar", "Apple", "end");
foreach ($arr as $value) {
    echo "$value <br>";
}
?>

<!-- WHILE LOOP  -->
<?php
echo "While LOOP PHP";
echo "<br>";

$i = 0;
while ($i <= 10) {
    echo $i;
    echo "<br>";
    $i+=2;
}
?>

<!-- DO WHILE LOOP  -->
<?php 
echo "Do WHILE LOOP PHP";
$i = 0;
do {
    echo $i . "<br>";
    $i += 3;
} while ($i <= 10);
?>