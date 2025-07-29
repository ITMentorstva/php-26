<?php

if(session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once "models/Images.php";

$image = new Images();

foreach($_FILES['profileImage']['name'] as $key => $file)
{

    $imageSize = $_FILES['profileImage']['size'][$key];

    if(!$image->isValidSize($imageSize)) {
        $_SESSION['imageErrors'][] = "Slika je prevelika!";
        continue;
    }

    $imgName = $_FILES['profileImage']['name'][$key];

    $imageType = pathinfo($imgName, PATHINFO_EXTENSION);
    if(!$image->isValidExtension($imageType)) {
        $_SESSION['imageErrors'][] = "Nije dobra extenzija slike";
        continue;
    }


    $tmpName = $_FILES['profileImage']['tmp_name'][$key];

    list($width, $height) = getimagesize($tmpName);
    if(!$image->isValidProportion($width, $height)) {
        $_SESSION['imageErrors'][] = "Slika je presiroka ili previsoka!";
        continue;
    }

    $randomName = $image->generateRandomName('jpg');

    if( !is_dir('./uploads') ) {
        mkdir('./uploads', 0755, true);
    }

    $image->upload($tmpName, $randomName, "uploads");

}

header("Location: images.php");


