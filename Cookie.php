<?php 

echo "Set Cookie <br>";
setcookie("category", "Books", time() + 86400 , "/");
echo "Your Cookie has been Set <br>";

?>