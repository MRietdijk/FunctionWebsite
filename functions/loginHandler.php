<?php 

function loginHandler() {
    if (isset($_SESSION['name'])) {
        return '<form method="POST" action=""><input class="btn btn-primary" type="submit" name="logout" value="logout"/></form><a class="btn btn-link login-btn" href="http://localhost/semester2/toets_site/?article=user">'.$_SESSION['name'].'</a>';
    } else {
        return '<a class="btn btn-primary" href="http://localhost/semester2/toets_site/?article=register">Register</a><button id="login-btn" class="btn btn-primary">Login</button>';
    }
}



?>