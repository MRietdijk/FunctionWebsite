<?php 

function loginScreenHandler($conn) {
    if (isset($_POST['account']) && isset($_POST['psw'])) {
        $query = 'SELECT * FROM `users` WHERE `UserName` = "'.$_POST['account'].'" AND `Password` = "'.hash('sha256', $_POST['psw']).'"';
        $result = mysqli_query($conn, $query);
        $_GET['function'] = "";
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['name'] = $row['UserName'];
                $_SESSION['role'] = $row['Role'];
            }
            return "";
        } else {
            $_GET['function'] = 'Loginscreen';
            return '<div class="alert alert-danger error-message"><i class="fas fa-exclamation-circle mark"></i>Wrong name or password</div>';
        }
    } elseif (isset($_POST['logout'])) {
        $_SESSION = array();
    }
}

?>