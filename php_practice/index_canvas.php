<?php
/*
	GD庫畫圖
*/
	// 準備畫布
	$img = imagecreatetruecolor(300, 200);

	// 準備塗料
	$white_color = imagecolorallocate($img, 255,255,255);
	$black_color = imagecolorallocate($img, 0,0,0);

	// 背景填充成黑色
	imagefill($img,0,0,$black_color);

	// 畫出一個白色的橢圓
	imagefilledellipse($img, 158,151,100,80,$white_color);

	// 輸出至瀏覽器
	header("content-type:image/png");
	imagepng($img);

	// 關閉並回收畫布
	imagedestroy($img);

?>