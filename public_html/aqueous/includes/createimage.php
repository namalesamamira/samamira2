<?php
function imageCreateFromAny($filepath) {
    $type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()
    $allowedTypes = array(
        1,  // [] gif
        2,  // [] jpg
        3,  // [] png
        6   // [] bmp
    );
    if (!in_array($type, $allowedTypes)) {
        return false;
    }
    switch ($type) {
        case 1 :
            return imageCreateFromGif($filepath);
        break;
        case 2 :
            return imageCreateFromJpeg($filepath);
        break;
        case 3 :
            return imageCreateFromPng($filepath);
        break;
        case 6 :
            return imageCreateFromBmp($filepath);
        break;
    }
}
