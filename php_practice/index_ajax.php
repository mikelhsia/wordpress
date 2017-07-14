<!DOCTYPE html>
<html>
<head>
<title>Welcome to nginx!</title>
<style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
</style>
</head>
<script>
	function showHint (str) {
		if (str.length <= 0) {
			document.getElementById("txtHint").innerHTML = '';
		}

		if (window.XMLHttpRequest) {
			// IE7+, Firefox, Chrome, Opera, Safari 浏览器执行的代码
			xmlhttp = new XMLHttpRequest();
		} else {
			// IE6, IE5 浏览器执行的代码
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
			}
		}

		xmlhttp.open("GET","gethint.php?q="+str,true);
		xmlhttp.send();
	}

</script>
<body>
<h1>Welcome to nginx!</h1>
<hr>
<p><b>在输入框中输入一个姓名:</b></p>
<form> 
姓名: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>返回值: <span id="txtHint"></span></p>

<hr>
<h2>XML simple api</h2>
<?php
	$xml=simplexml_load_file("note.xml");
	echo $xml->to . "<br>";
	echo $xml->from . "<br>";
	echo $xml->a12y . "<br>";
	echo $xml->heading . "<br>";
	echo $xml->body . "<br>";
	echo $xml->a12y;
?>

<?php
	// $xml=simplexml_load_file("note.xml");
	echo "<br>" . $xml->getName() . "<br>";

	foreach($xml->children() as $child) {
		echo $child->getName() . ": " . $child . "<br>";
	}
?>
</body>
</html>
