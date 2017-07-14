<?php
	header("content-type:text/html;charset=utf-8")
	$arr["name"]="Michael";
	$arr["age"]=39;

	print_r($arr);
	echo "<hr>";

	//$arr2 = each($arr);
	// Can be replaced by foreach();
	while ( list($key, $val) = each($arr)) {	
		echo "<h1 style='text-shadow:1px 2px 3px grey;'>" . $key . ": " . $val . "</h1>";
	}

	foreach ($arr as $key=>$val) {
		if (is_string($key)) {
		echo "<h1 style='text-shadow:1px 2px 3px grey;'>" . strtoupper($key) . ": " . $val . "</h1>";
		} else {
			echo "<h1 style='text-shadow:1px 2px 3px grey; '>" . $key . ": " . $val . "</h1>";
		}
	}

?>
