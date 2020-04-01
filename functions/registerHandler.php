<?php 

function registerHandler($conn) {
    if (isset($_POST['rname']) && isset($_POST['rpassword']) && isset($_POST['rrole'])) {
        $query = 'SELECT * FROM `users` WHERE `UserName` = "'.$_POST['rname'].'"';
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            return 'there is already a account with the username '.$_POST['rname'];
        } else {
            // check if password has more than 8 characters
            if (strlen($_POST['rpassword']) > 8) {
                $query = 'INSERT INTO `users` (`UserName`, `Password`, `Role`) VALUES ("'.$_POST['rname'].'", "'.hash('sha256', $_POST['rpassword']).'", "'.$_POST['rrole'].'")';
                if (mysqli_query($conn, $query)) {
                    header('Location: ?article=users');
                } else {
                    return 'there was a fault with making the account';
                }
            } else {
                return 'password is too short';
            }
        }
    } elseif (isset($_POST['rname']) && isset($_POST['rpassword'])) {
        $query = 'SELECT * FROM `users` WHERE `UserName` = "'.$_POST['rname'].'"';
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            return 'there is already a account with the username '.$_POST['rname'];
        } else {
            if (strlen($_POST['rpassword']) > 8) {
                $query = 'INSERT INTO `users` (`UserName`, `Password`, `Role`) VALUES ("'.$_POST['rname'].'", "'.hash('sha256', $_POST['rpassword']).'", "member")';
                if (mysqli_query($conn, $query)) {
                    $_SESSION['name'] = $_POST['rname'];
                    $_SESSION['role'] = 'member';
                } else {
                    return 'there was a fault with making the account';
                }
            } else {
                return 'password is too short';
            }
        }
    }
}

?>