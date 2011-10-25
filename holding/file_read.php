<?php

$file = "filetest.txt";

$content = "";
if($handle = fopen($file, 'r')) {
	while(!feof($handle)) {
	$content .= fgets($handle);
	}
}

echo nl2br($content);
?>
