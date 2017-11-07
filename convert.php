<?php 
$source_file = "image.jpg";

$im = ImageCreateFromJpeg($source_file); 

$imgw = imagesx($im);
$imgh = imagesy($im);

for ($i=0; $i<$imgw; $i++)
{
        for ($j=0; $j<$imgh; $j++)
        {

                // get the rgb value for current pixel

                $rgb = ImageColorAt($im, $i, $j); 

                // extract each value for r, g, b

                $rr = ($rgb >> 16) & 0xFF;
                $gg = ($rgb >> 8) & 0xFF;
                $bb = $rgb & 0xFF;

                // get the Value from the RGB value

                $g = round(($rr + $gg + $bb) / 3);

                // grayscale values have r=g=b=g

                $val = imagecolorallocate($im, $g, $g, $g);

                // set the gray value

                imagesetpixel ($im, $i, $j, $val);
        }
}

header('Content-type: image/jpeg');
imagejpeg($im);
?>