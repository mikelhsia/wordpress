<?php
/*/namespace namespacename;
class classname
{
	    function __construct()
		        {
				        echo __METHOD__,"\n";
					    }
}
function funcname()
{
	    echo __FUNCTION__,"\n";
}
const constname = "namespaced";

include 'example1.php';

echo "<br>XXX" . __NAMESPACE__ . "XXX<br>";
$a = 'classname';
$obj = new $a; // prints classname::__construct
$b = 'funcname';
$b(); // prints funcname
echo constant('constname'), "\n"; // prints global
echo "<hr>";

namespace\funcname();

echo "<hr>";
echo "<br>XXX" . __NAMESPACE__ . "XXX<br>";
// note that if using double quotes, "\\namespacename\\classname" must be used
$a = '\namespacename\classname';
$obj = new $a; // prints namespacename\classname::__construct
$a = 'namespacename\classname';
$obj = new $a; // also prints namespacename\classname::__construct
$b = 'namespacename\funcname';
$b(); // prints namespacename\funcname
$b = '\namespacename\funcname';
$b(); // also prints namespacename\funcname
echo constant('\namespacename\constname'), "\n"; // prints namespaced
echo constant('namespacename\constname'), "\n"; // also prints namespaced
*/
session_start();
if (isset($_SESSION['_view'])) {
	$_SESSION['_view']+=1;
} else {
    $_SESSION['_view']=1;
}

if ($_SESSION['_view'] > 10) {
	unset($_SESSION['_view']);
}
?>
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
<body>
<h1>Welcome to nginx!</h1>
<!--
<p>If you see this page, the nginx web server is successfully installed and
working. Further configuration is required.</p>

<p>For online documentation and support please refer to
<a href="http://nginx.org/">nginx.org</a>.<br/>
Commercial support is available at
<a href="http://nginx.com/">nginx.com</a>.</p>
<p><em>Thank you for using nginx.</em></p>
-->
<table style='border: solid 2px black;'>
	<tr>
		<th> ID </th>
		<th> Firstname </th>
		<th> Lastname </th>
		<th> Email </th>
		<th> Reg_date </th>
	</tr>
<?php
	class TableRows extends RecursiveIteratorIterator {
		function __construct($it) {
			parent::__construct($it, self::LEAVES_ONLY);
		}
		function current() {
			return "<td style='width: 150px; border: 1px solid black;'>" . parent::current() . "</td>";;
		}
		function beginChildren () {
			return "<tr>";
		}
		function endChildren () {
			return "</tr>" . "\n";
		}
	}

	// DB init
	$servername = "localhost";
	$username = "root";
	$password = "f19811128";

	// Object-oriented
	/*
	$conn = new mysqli($servername, $username, $password);
	if ($conn->connect_error) {
	    die("连接失败: " . $conn->connect_error);
	} 
	echo "连接成功";
	$conn->close();
	
	// Process-oriented
	$conn = mysqli_connect($servername, $username, $password);
	if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
	}
	echo "连接成功";
	mysqli_close($conn);
	*/
	// PDO
	try {
		$conn = new PDO ("mysql:host=$servername;dbname=myDBPDO",$username,$password);
		echo "Connected!<br>";

		// 设置 PDO 错误模式为异常 
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		/* Create database
		$sql = "CREATE DATABASE myDBPDO"; 
		$conn->exec($sql); 
		echo "数据库创建成功<br>"; 
		*/
		/* Create table
		$sql = "CREATE TABLE MyGuests (
    		    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				firstname VARCHAR(30) NOT NULL,
				lastname VARCHAR(30) NOT NULL,
				email VARCHAR(50),
				reg_date TIMESTAMP)";
		// 使用 exec() ，因为没有结果返回 
		$conn->exec($sql); 
		echo "MyGuests 数据表创建成功<br>"; 
		*/
		/* Single record insert
		$sql = "INSERT INTO MyGuests (firstname, lastname, email, reg_date) VALUES ('John','Doe','John.Doe@hotmail.com',now())";
		$conn->exec($sql);
		echo "单笔新纪录插入成功<br>";
		*/

		// 事務處理開始
		/*
		$conn->beginTransaction();
		$conn->exec("INSERT INTO MyGuests (firstname, lastname, email, reg_date) VALUES ('Johnny','Dee','Johnny.Dee@hotmail.com',now())");
		$conn->exec("INSERT INTO MyGuests (firstname, lastname, email, reg_date) VALUES ('Marry','Kay','Marry.Key@hotmail.com',now()+2)");
		$conn->exec("INSERT INTO MyGuests (firstname, lastname, email, reg_date) VALUES ('Manna','Tech','Manna.Tech@hotmail.com',now()+4)");
		$conn->commit();
		echo "多筆記錄插入成功<br>";
		*/

		// 預處理語句
		/*
		date_default_timezone_set("PRC");

		$stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email, reg_date) VALUES (:firstname, :lastname, :email, :reg_date)");
		$stmt->bindParam(':firstname', $firstname);
		$stmt->bindParam(':lastname', $lastname);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':reg_date', $reg_date);

		 // 插入其他行
		 $firstname = "Mary";
		 $lastname = "Moe";
		 $email = "mary@example.com";
		 $reg_date = date("Y-m-d", time());
	     $stmt->execute();

	     // 插入其他行
	     $firstname = "Julie";
		 $lastname = "Dooley";
		 $email = "julie@example.com";
		 $reg_date = date("Y-m-d", time());
		 $stmt->execute();

		 echo "預處理數據插入成功<br>";
		 */

		// 範例：讀取數據
		$stmt = $conn->prepare("select * from MyGuests");
		$stmt->execute();

		// 設置結果為關聯組集
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $key => $item) {
			echo $item;
			if ($key === "reg_date") {
				echo "</tr>";
			}
		}
		$dsn = null;
	} 
	catch (PDOException $e) { 
		// 如果多筆执行失败回滚
		// $conn->rollback();
		if (isset($sql)) {
			echo $sql . "<br>" . $e->getMessage(); 
		} else {
			echo $e->getMessage();
		}
	}
	$conn = null;
?>
</table>
<br>
<hr>
<br>

<?php
/********  Practicing calculation
$x=6;
$y=$x*2;
if (true) {
	echo multiply($x, $y);
	echo "<hr>";
	echo "<hr>";
	if (isset($_SESSION['_view'])) {
		echo 'Review: ' . $_SESSION['_view'];
	} else {
		echo "<h1>Session has been destroyed!</h1>";
	}
	echo "<hr>";
	echo "<hr>";
}
*/

// 区分大小写的常量名
/*
define("GREETING", "欢迎访问 Runoob.com");
echo GREETING;    // 输出 "欢迎访问 Runoob.com"
echo '<br>';
echo "greeting";   // 输出 "greeting"

define("GREETING", "Hello!!!", true);
echo GREETING;
echo greeting;
*/
// Set error handler 设置错误处理程序
/*
function customError($errno, $errstr)
{
	echo "<b>Error:</b> [$errno] $errstr<br>";
	echo "脚本结束";
	error_log("Error: [$errno] $errstr",1, "someone@example.com","From: webmaster@example.com");
	die();
}
set_error_handler("customError");		// Set error handler
trigger_error("变量值必须小于等于 1");	// Set error trigger


// 过滤器 － 要学习
if(!filter_has_var(INPUT_GET, "website"))
{
		echo("没有 url 参数");
}
else
{
		$url = filter_input(INPUT_GET, "website", FILTER_SANITIZE_URL);
			echo $url;
}
*/
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
名字: <input type="text" name="name">
<span class="error">* <?php if(isset($nameErr)) {echo $nameErr;}?></span>
<br><br>
E-mail: <input type="text" name="email">
<span class="error">* <?php if(isset($emailErr)) { echo $emailErr;}?></span>
<br><br>
网址: <input type="text" name="website">
<span class="error"><?php  if(isset($websiteErr)) {echo $websiteErr;}?></span>
<br><br>
备注: <textarea name="comment" rows="5" cols="40"></textarea>
<br><br>
性别:
<input type="radio" name="gender" value="female">女
<input type="radio" name="gender" value="male">男
<span class="error">* <?php  if(isset($genderErr)) {echo $genderErr;}?></span>
<br><br>
<input type="submit" name="submit" value="Submit"> 
</form>

<?php 

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
echo "<hr>";

if ($_SERVER['REQUEST_METHOD']=='POST') {
  $name = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $gender = test_input($_POST["gender"]);
  $comment = test_input($_POST["comment"]);
  $website = test_input($_POST["website"]);

  echo $name;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $gender;
  echo "<br>";
  echo $website;
  echo "<br>";
  echo $comment;
  echo "<hr>";
}
?>

<?php
/*
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
//echo $_SERVER['HTTP_REFERER'];
//iecho "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
$name = $_REQUEST['fname']; 
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];
echo $name; 
$name = $_POST['fname']; 
echo __FILE__ . "     -    " . $name; 
// 允许上传的图片后缀
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$extension = end($temp);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg")
|| ($_FILES["file"]["type"] == "image/x-png")
|| ($_FILES["file"]["type"] == "image/png"))
&& ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
&& in_array($extension, $allowedExts))
{
	if ($_FILES["file"]["error"] > 0) {
		echo "错误：: " . $_FILES["file"]["error"] . "<br>";
	} else {
		echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
		echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
		echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
		echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
																	
	// 判断当期目录下的 upload 目录是否存在该文件
	// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
		if (file_exists("upload/" . $_FILES["file"]["name"])) {
			echo $_FILES["file"]["name"] . " 文件已经存在。 ";
		} else {
			// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
			move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
			echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
		}
	}
} else {
	echo "非法的文件格式";
}
*/

// json encoding
/*
echo "<h2>json encoding example:</h2>";
   class Emp {
	public $name = "";
    public $hobbies  = "";
	public $birthdate = "";
}

   date_default_timezone_set("PRC");
   $e = new Emp();
   $e->name = "sachin";
   $e->hobbies  = "sports";
   //$e->birthdate = date('m/d/Y h:i:s a', "8/5/1974 12:20:03 pm");
   $e->birthdate = date('m/d/Y h:i:s a', strtotime("8/5/1974 12:20:03"));

   echo json_encode($e);
*/
?>

</body>
</html>
