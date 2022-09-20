<?php

header("Content-Type: text/plain");
header('Content-Disposition: attachement; filename="phonghaw1m.csv"');
for ($x = 1; $x <= 1000000; $x++) {
echo $x.','."The number is: $x ".','.$x."\n";
}
?>