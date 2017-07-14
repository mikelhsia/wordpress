<?php
/**
 * Created by PhpStorm.
 * User: puppylpy
 * Date: 16/05/2017
 * Time: 10:36 PM
 */
$value = $_GET['q'];
switch($value) {
    case 1:
        echo "Are you John?";
        break;
    case 3:
        echo "Are you Mary Kay?";
        break;
    case 4:
        echo "Are you Manna Tech?";
        break;
    case 5:
        echo "Are you Marry Moe?";
        break;
    default:
        echo "Hello, " . $str;
}
?>