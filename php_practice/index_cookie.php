<html>
<head>
<meta charset="utf-8">
<title>菜鸟教程(runoob.com)</title>
</head>
<body>

<?php
// setcookie(name, value, expire, path, domain);
if (isset($_COOKIE["user"]))
	echo "欢迎 " . $_COOKIE["user"] . "!<br>";
else
	echo "普通访客!<br>";
?>

</body>
</html>
