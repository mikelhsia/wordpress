<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<pre>
<script type="text/javascript">

document.write("<h1>Now we start:</h1>"); 

/*
使用 window.alert() 弹出警告框。
使用 document.write() 方法将内容写到 HTML 文档中。
使用 innerHTML 写入到 HTML 元素。
使用 console.log() 写入到浏览器的控制台。*/</script>
<?php

	header('content-type:text/html;charset=utf8');
	function odd($var) {
		if ($var % 2 == 1) {
			return true;
		}
	}
	function show_Spanish($n, $m) {
	    return("The number $n is called $m in Spanish");
	}

	function map_Spanish($n, $m)
	{
	    return(array($n => $m));
	}

	function add_call_by_reference (&$arr) {
		foreach ($arr as $key=>$val) {
			$arr[$key] = $val + 1;
		}
		return $arr;
	}

    date_default_timezone_set('Asia/Shanghai');
	//$y = date('Y');
	$y = $_GET['y']?$_GET['y']:date('Y');
	//$m = date('m');
	$m = @$_GET['m']?@$_GET['m']:date('m');
	$d = date('d');

	echo "$y-$m-$d";

	$day = date('t', strtotime("$y-$m-$d"));
	echo "<br/>本月有 = $day 天";

	$array1 = array(1,'m'=>2,3,4,5,6,7,'z'=>8,'x'=>9,1,2,'as'=>3,4,5,6,7,8,9,10);

	echo "<pre>";
	print_r(array_filter($array1,"odd"));
	echo "</pre>";

	$a = array(1, 2, 3, 4, 5);
	$b = array("uno", "dos", "tres", "cuatro", "cinco");

	$c = array_map("show_Spanish", $a, $b);
	print_r($c);

	$d = array_map("map_Spanish", $a , $b);
	print_r($d);

	print_r(add_call_by_reference($array1));
	//print_r($_SERVER);
	//print_r($GLOBALS);
	/*
	array_keys(input); array_values(input); in_array(needle, haystack); array_key_exists(key, array);
	array_flip(trans); array_reverse(array); count(var); array_count_values(input); 
	array_unique(array); array_filter(input); array_map(callback, arr1);
	sort(); rsort(); asort(); arsort(); array_flip(); ksort(); krsort();
	natsort(); natcasesort(); array_multisort(); 
	_________________________________________________________________________
	string nl2br ( string $string [, bool $is_xhtml = true ] )
 		- Inserts HTML line breaks before all newlines in a string
	_________________________________________________________________________
 	htmlspecialchars — Convert special characters to HTML entities
 	建议在输入数据进入数据库之前，进行三道把控：
 	1. html标签过滤
 	2. addslashes() 在特殊符号前加上跳脱符号，以免对数据库造成破坏
 	3. htmlspecialchars() 将特殊符号转成实体
	_________________________________________________________________________
 	ord — Return ASCII value of character
	*/

	$str="<b>Linux</b> and php are <b>lamp</b> or \n <b>linux</b> is very much.";
	$ptn='/^linux/i';
	$ptn2='/^linux/im';
	$ptn3='/.*/';
	$ptn4='/.*/s';
	$ptn5='/<b>.*<\/b>/i';
	$ptn6='/<b>.*<\/b>/iU';
	$rep='strtoupper($1)';

	$ptnArr[0]= '/php/';
	$ptnArr[1]= '/lamp/';
	$ptnArr[2]= '/much/';

	$repArr[0]= 'jQuery';
	$repArr[1]= 'LNMP';
	$repArr[2]= 'low';

	preg_match_all($ptn, $str, $arr);
	print_r($arr);
	preg_match_all($ptn2, $str, $arr);
	print_r($arr);
	preg_match_all($ptn3, $str, $arr);
	print_r($arr);
	preg_match_all($ptn4, $str, $arr);
	print_r($arr);
	preg_match_all($ptn5, $str, $arr);
	print_r($arr);
	preg_match_all($ptn6, $str, $arr);
	print_r($arr);

	// preg_replace($ptn, $rep, $str);
	echo $str;
	echo "</br></br>";
	echo preg_replace($ptnArr, $repArr, $str);

	// eval($str);   把字符串作为PHP代码执行


?>
</pre>

</body>
</html>