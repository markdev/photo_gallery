<?php

echo __FILE__ . "<br/>";
echo __LINE__ . "<br/>";
echo dirname(__FILE__) . "<br/>";
echo __DIR__ . "<br/>";

echo file_exists(dirname(__FILE__)) ? 'yes' : 'no' ;
echo "<br/>";
?>
