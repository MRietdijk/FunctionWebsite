<?php 

function dbConnection() {
    $ini_array = parse_ini_file("config/config.ini");
    $conn = mysqli_connect($ini_array['host'], $ini_array['account'], $ini_array['password'], $ini_array['DBname']);

    if(!$conn) {
        die("Connection failedL: ".mysqli_connect_error());
    }

    return $conn;
}


?>