<?php 


function updateUser($conn) {
    if(isset($_POST['delete']) && isset($_POST['id'])) {
        $query = 'DELETE FROM `users` WHERE `ID` = "'.$_POST['id'].'"';
        mysqli_query($conn, $query);
        header('Location: ?article=users');
    } elseif (isset($_POST['uid']) && isset($_POST['uname']) && isset($_POST['upassword']) && isset($_POST['urole'])) {
        $query = 'UPDATE `users` SET `UserName` = "'.$_POST['uname'].'", `Password` = "'.hash('sha256', $_POST['upassword']).'", `Role` = "'.$_POST['urole'].'" WHERE `ID` = "'.$_POST['uid'].'"';
        mysqli_query($conn, $query);
        header('Location: ?article=users');
    }
}


?>