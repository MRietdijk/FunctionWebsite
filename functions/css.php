<?php 

function getCss() {
    $out = "";
    $allCss = glob("css/*.css");

    foreach ($allCss as $cssFile) {
        $out .= '<link rel="stylesheet" href="'.$cssFile.'">';
    }

    return $out;
}

?>