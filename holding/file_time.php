<?php

$file = 'filetest.txt';

echo filesize($file) . "<br/>";
echo filemtime($file) . "<br/>";
echo filectime($file) . "<br/>";
echo fileatime($file) . "<br/>";

$array = pathinfo(__FILE__);

print_r($array);

?>
