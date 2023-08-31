<?php 

session_start();

$random_alpha = md5(rand());

$captcha_code = substr($random_alpha, 0, 6);

$_SESSION['captcha_code'] = $captcha_code;

header('Content-Type: image/png');

$image = imagecreatetruecolor(235, 60);

$background_color = imagecolorallocate($image, 230, 230, 230); //ganti warna background capptcha

$text_color = imagecolorallocate($image, 255, 255, 255); //ganti warna teks captcha

imagefilledrectangle($image, 0, 0, 235, 60, $background_color);

$font = dirname(__FILE__) . '/monofont.ttf';

imagettftext($image, 40, 0, 55, 45, $text_color, $font, $captcha_code);

imagepng($image);

imagedestroy($image);

 ?>