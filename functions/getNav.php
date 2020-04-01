<?php 

function getNav($conn) {
    $out= "";
    $sql = "SELECT Label, Href FROM navigator";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
                $out .= '<li class="nav-item"><a class="nav-link" href="'.$row['Href'].'">'.$row['Label'].'</a></li>';
            } else {
                if ($row['Label'] != 'Users') {
                    $out .= '<li class="nav-item"><a class="nav-link" href="'.$row['Href'].'">'.$row['Label'].'</a></li>';
                }
            }
        }
    }

    return $out;
}


?>