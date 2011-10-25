<?php

	$file = 'filetest.txt';
	if($handle = fopen($file, 'w')) {
		fwrite($handle, "123");

		$pos = ftell($handle);

		fseek($handle, $pos-6);
		fwrite($handle, "blah");

		rewind($handle);
		fwrite($handle, "last");	
	
		fclose($handle);
	} else {
		echo "Could not open file for writing.";
	}

?>
