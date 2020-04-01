<?php 

function bootstrap() {
    $allFunctions = glob('functions/*.php');

    foreach ($allFunctions as $function) {
        include_once $function;
    }
}

?>