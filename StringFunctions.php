<?php
echo "String Functions";
echo "<br>";
$Heading = "My Name is AbuBakar";

echo "The Length of my String is " . strlen($Heading);
echo "<br>";
echo "The Words in my String is " . str_word_count($Heading);
echo "<br>";
echo "The Reverse of my String is " . strrev($Heading);
echo "<br>";
echo "To Search the Word in String use strpos " . strpos($Heading, "AbuBakar");
echo "<br>";
echo "To Replace " . str_replace("AbuBakar", "AB", $Heading);
echo "<br>";
echo "To Repeat your String ". str_repeat($Heading, 5);
echo "<br>";
echo "rtrim or ltrim is used for remove spaces."

?>