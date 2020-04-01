<?php

session_start();
include 'functions/bootstrap.php';

bootstrap();

$cssLinks = getCss();

$conn = dbConnection();

$message = loginScreenHandler($conn);

$navigator = getNav($conn);

$loginButton = loginHandler();

$registerResponse = registerHandler($conn);

$content = getArticles($conn, ['register' => $registerResponse]);

$title = Title();

$function = getFunction();
updateUser($conn);


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Mart Rietdijk | <?= $title?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    
    <?= $cssLinks ?>
    <script src="js/script.js"></script>
  </head>
  <body onload="<?= $function ?>">
    <div id="layer" class="layer">
        <form id="loginForm" class="login-form" action="" method="POST">
            <div class="login-form-inner">
                <div class="form-group">
                <label>Email address</label>
                <input type="text" class="form-control" name="account" aria-describedby="emailHelp" placeholder="Enter Username">
                </div>
                <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="psw" placeholder="Password">
                </div>
                <?= $message ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <nav class="navbar navbar-expand-sm navbar-dark bg-primary">
        <a class="navbar-brand" href="http://localhost/semester2/toets_site/">Mart Rietdijk</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <?= $navigator ?>
            </ul>
            <?= $loginButton ?>
        </div>
    </nav>
    <main>
        <?= $content ?>
    </main>
    <footer class="footer">
        <div class="container footer-div">
          <span class="text-muted">2020 Mart Rietdijk Inc.&copy;</span>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
        $("#login-btn").click(function() {
            $(".layer").fadeIn();
            $(".login-form").fadeIn("slow");
            $(".layer").css("display", "flex");
        });
        $("#loginBtn").click(function() {
            $(".layer").fadeIn();
            $(".login-form").fadeIn("slow");
            $(".layer").css("display", "flex");
        });

        $(".layer *").click(function(e) {
            e.stopPropagation();
        });

        $(".layer").click(function(){
            $(".layer").fadeOut();
            $(".login-form").fadeOut("slow");
        });
    </script>
  </body>
</html>