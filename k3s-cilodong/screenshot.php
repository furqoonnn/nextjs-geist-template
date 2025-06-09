<?php
// Create a blank image
$width = 1200;
$height = 900;
$image = imagecreatetruecolor($width, $height);

// Set background color (white)
$white = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $white);

// Set colors
$blue = imagecolorallocate($image, 37, 99, 235); // Blue-600
$gray = imagecolorallocate($image, 55, 65, 81);  // Gray-700

// Add theme name
$font = 5; // Built-in font
$theme_name = "K3S Cilodong";
$box = imagettfbbox(5, 0, $font, $theme_name);
$text_width = abs($box[4] - $box[0]);
$text_x = ($width - $text_width) / 2;
imagestring($image, $font, $text_x, $height/2 - 50, $theme_name, $blue);

// Add theme description
$description = "WordPress Theme for K3S Kecamatan Cilodong";
$box = imagettfbbox(3, 0, $font, $description);
$text_width = abs($box[4] - $box[0]);
$text_x = ($width - $text_width) / 2;
imagestring($image, 3, $text_x, $height/2, $description, $gray);

// Output image
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
