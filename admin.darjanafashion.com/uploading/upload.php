<?php
$base = "uploads/";
$original = $base."original/";
$product  = $base."product/";
$thumb    = $base."thumb/";

// Create folders if missing
foreach([$original, $product, $thumb] as $folder){
    if(!file_exists($folder)){
        mkdir($folder, 0777, true);
    }
}

if(isset($_FILES['image'])){
    if($_FILES['image']['error'] != 0){
        echo "Upload error: " . $_FILES['image']['error'];
        exit;
    }

    $filename = "img_".time().".jpg";
    $original_path = $original.$filename;

    // Move uploaded image
    if(move_uploaded_file($_FILES['image']['tmp_name'], $original_path)){

        // Generate product image 800x1300
        createImage($original_path, $product.$filename, 800, 1300);

        // Generate thumbnail 400x650
        createImage($original_path, $thumb.$filename, 400, 650);

        echo "Upload Successful!";
    } else {
        echo "Failed to move uploaded file.";
    }
} else {
    echo "No file received.";
}

// Function to resize image
function createImage($src, $dest, $w, $h){
    $image = imagecreatefromjpeg($src);
    $tmp = imagecreatetruecolor($w, $h);

    $width = imagesx($image);
    $height = imagesy($image);

    imagecopyresampled($tmp, $image, 0,0,0,0, $w,$h, $width,$height);
    imagejpeg($tmp, $dest, 90); // 90% quality
    imagedestroy($image);
    imagedestroy($tmp);
}
?>