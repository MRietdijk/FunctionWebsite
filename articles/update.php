<?php 

function getUpdate($conn) {
    if (isset($_GET['id']) && $_SESSION['role'] == 'admin') {
        $sqlQuery = 'SELECT * FROM `users` WHERE `ID` = "'.$_GET['id'].'"';
        $result = mysqli_query($conn, $sqlQuery);
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['Role'] == 'admin') {
                $admin = "selected";
                $member = "";
            } else {
                $admin = "";
                $member = "selected";
            }
            if (mysqli_num_rows($result) == 1) {
                $out = '
                <div class="page">
                    <div class="flex-box">
                        <fieldset class="form-group">
                            <legend>Update Account</legend>
                            <form action="" method="POST">
                                <input name="uid" type="hidden" value="'.$row['ID'].'" />
                                <input type="text" name="uname" placeholder="'.$row['UserName'].'" /><br />
                                <input type="password" name="upassword" placeholder="password isn&apos;t visible" /><br />
                                <select name="urole">
                                    <option value="admin" '.$admin.'>admin</option>
                                    <option value="member" '.$member.'>member</option>
                                </select><br />
                                <button class="btn btn-primary">change</button>
                            </form>
                        </fieldset>
                    </div>
                </div>';
            } else {
                $out = "Sorry something went wrong";
            }
        }

        return $out;
    } else {
        header("Location: index.php");
    }
}



?>