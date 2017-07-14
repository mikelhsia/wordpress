<?php
	echo "<div style='box-shadow: 1px 1px 3px grey;'>";
	echo "<h3 style='line-height:auto; backgound:white; border-radius:5px 5px 0 0; border: 2px solid;'>This is the for _SERVER global variable</h3>";
	echo "<pre style='background:grey; border-radius: 0 0 5px 5px; border: 2px solid;'>";
	print_r($_SERVER);
	echo "</pre>";
	echo "</div>";


	if ($_GET) {
		echo "<h3 style='line-height:1em; backgound:#EEEEFA; border-radius:4px; box-shadow:0px 0px 3px grey;'>This is the for _GET global variable</h3>";
		echo "<pre>";
		print_r($_GET);
		echo "</pre>";
	}
	echo "</div>";

	echo "<h3  style='line-height:1em; backgound:#EEEEFA; border-radius:4px; box-shadow:0px 0px 3px grey;'>This is the form sunmit by using post method</h3>";
	echo"<form action='global_variable.php' method='post'>";
	echo "Name: <input type='text' name='name'><br/>";
	echo "Age: <input type='text' name='age'><br/>";
	echo "<input type='submit' value='submit'></form>";

	if ($_POST) {
		echo "<h3 style='line-height:1em; backgound:#EEEEFA; border-radius:4px; box-shadow:0px 0px 3px grey;'>This is the for _POST global variable</h3>";
		echo "<pre>";
		echo "Name: ".$_POST['name']."<br/>";
		echo "age: ".$_POST['age']."<br/";
		echo "</pre>";
	}

	/* Or use $_REQUEST to receive both _GET and _POST */
?>
