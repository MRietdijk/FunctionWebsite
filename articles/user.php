<?php 

function getUser($conn) {
    if (isset($_SESSION['name'])) {
        if (isset($_POST['delete'])) {
            $_SESSION = array();
        }
        $query = 'SELECT * FROM `users` WHERE UserName = "'.$_SESSION['name'].'"';
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        return "
        <div class='page'>
            <h1>".$_SESSION['name']."</h1>
            <form action='' method='POST'>
                <input type='hidden' name='id' value='".$row['ID']."' />
                <input class='btn btn-danger' type='submit' name='delete' value='delete account' />
            </form>
        </div>
        ";
    } else {
        header("Location: index.php");
    }
}


?>