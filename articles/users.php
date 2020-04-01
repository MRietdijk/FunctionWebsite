<?php 

function getUsers($conn) {
    if (isset($_SESSION['name']) && $_SESSION['role'] == 'admin') {
        $query = 'SELECT * FROM `users` WHERE UserName != "'.$_SESSION['name'].'"';
        $result = mysqli_query($conn, $query);
        $out = '<div class="page"><a href="http://localhost/semester2/toets_site/?article=register" class="btn btn-success add-btn"><i class="fas fa-user-plus"></i></a>';
        $out .= "<table class='table table-striped'>
                <tr class='thead-dark'><th>ID</th><th>Name</th><th>Role</th><th>Delete</th><th>Update</th>";
        while ($row = mysqli_fetch_assoc($result)) {
               $out .= "<tr><td>".$row["ID"]."</td><td>".$row["UserName"]."</td><td>".$row["Role"]."</td>
               <td><form action='' method='POST'><input type='hidden' name='id' value='".$row['ID']."'/> 
               <button class='btn btn-danger' value='delete' type='submit' name='delete' ><i class='far fa-trash-alt'></i></button></form></td>
               <td><a href='http://localhost/semester2/toets_site/?article=update&id=".$row['ID']."'><i class='far fa-edit'></i></a></td></tr>";
        }
        $out .= "</table></div>";
        return $out;
    } else {
        header('Location: index.php');
    }
}


?>