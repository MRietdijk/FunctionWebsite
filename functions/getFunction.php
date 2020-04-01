<?php 
// if login has failed the screen stays on
function getFunction() {
    if (!empty($_GET['function'])) {
        $function = "loadLogin()";
    } else {
        $function = "";
    }

    return $function;
}



?>