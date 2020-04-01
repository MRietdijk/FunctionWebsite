<?php 

function getRegister($conn, $errors) {
    if ($errors['register'] != "") {
        $errorMessage = '<div class="alert alert-danger error-message"><i class="fas fa-exclamation-circle mark"></i>'.$errors['register'].'</div>';
    } else {
        $errorMessage = "";
    }

    if (empty($_SESSION['name'])) {
        return '
        <div class="page">
            <div class="flex-box">
                <fieldset class="form-group">
                    <legend>Register</legend>
                    <form action="" method="POST">
                        <input type="text" name="rname" placeholder="Enter Username" /><br />
                        <input type="password" name="rpassword" placeholder="Password" /><br />
                        <button class="btn btn-primary">Register</button>
                    </form>
                    '.$errorMessage.'
                </fieldset>
            </div>
        </div>';
    } elseif ($_SESSION['role'] == 'admin') {
        return '
        <div class="page">
            <div class="flex-box">
                <fieldset class="form-group">
                    <legend>Add User</legend>
                    <form action="" method="POST">
                        <input type="text" name="rname" placeholder="Enter Username" /><br />
                        <input type="password" name="rpassword" placeholder="Password" /><br />
                        <select name="rrole">
                            <option>admin</option>
                            <option>member</option>
                        </select><br />
                        <button class="btn btn-primary">Register</button>
                    </form>
                    '.$errorMessage.'
                </fieldset>
            </div>
        </div>';
    } else {
        header('Location: index.php');
    }
}

?>