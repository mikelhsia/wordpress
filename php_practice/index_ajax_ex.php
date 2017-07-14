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
<script>
	function showUser (str) {
		if (str == "") {
			document.getElementById("txtHint").innerHTML = "";
			return
		}

		if (window.XMLHttpRequest) {
			// IE7+, Firefox, Chrome, Opera, Safari 浏览器执行代码
			xmlhttp=new XMLHttpRequest();
		} else {
			// IE6, IE5 浏览器执行代码
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}


		xmlhttp.onreadystatechange = function () {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
			}
		}

		xmlhttp.open("GET", "getuser.php?q="+str, true);
		xmlhttp.send();
	}
</script>
</head>
<body>
<h1>AJAX + MySQL Selector!</h1>
<hr>
<form>
	<select name="user" onchange="showUser(this.value)">
		<option value="">Select a person:</option>
		<option value="1">John Doe</option>
		<option value="3">Mary Kay</option>
		<option value="4">Manna Tech</option>
		<option value="5">Marry Moe</option>
	</select>
</form>
<br>

<div id="txtHint"><b>Person info will be listed here.</b></div>
</body>
</html>
