<?php 

function Gallery() {
    $out = "";
    $allImgs = glob('img/*.*');

    foreach ($allImgs as $img) {
        $out .= "<img src='".$img."' class='img-thumbnail photo' />";
    }

    return $out;
}


?>