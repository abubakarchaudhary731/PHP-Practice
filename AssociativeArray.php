<?php
echo "Associative Array <br>";

$favFruit = array("AB" => "Mango",
                "Umer" => "Apple",
                "Aman" => "Banana",
                "Zain" => "Peach");
    foreach ($favFruit as $key => $value) { 
        echo "$key like $value <br>";
    };
?>

<!-- Multi Dimensional Array  -->
<?php
echo "Multi Dimensional Array <br>";

$MultiDim = array(
    array(3, 4, 3, 7),
    array(45, 6, 56, array('apple', 'banana', 'cherry')),
    array(5, 7, 87, 77)
);

for ($i = 0; $i < count($MultiDim); $i++) {
    for ($j = 0; $j < count($MultiDim[$i]); $j++) {
        if (is_array($MultiDim[$i][$j])) {
            for ($k = 0; $k < count($MultiDim[$i][$j]); $k++) {
                echo $MultiDim[$i][$j][$k] . " ";
            }
        } else {
            echo $MultiDim[$i][$j] . " ";
        }
    }
    echo "<br>";
}
?>
