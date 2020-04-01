<?php 

function getGallery() {
    if (empty($_SESSION['name'])) {
        header("Location: index.php");
    }
    $gallery = Gallery(); 

    return $gallery;
}



?>