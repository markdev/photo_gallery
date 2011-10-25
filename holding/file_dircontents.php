<?php

$dir = ".";

if(is_dir($dir)) {
	if($dirhandle = opendir($dir)) {
		while($filename = readdir($dirhandle)) {
			print($filename . "<br/>");
		}
	}
} else {
	echo "Invalid directory";
}

?>
