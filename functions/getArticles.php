<?php 

function getArticles($conn, $errors) {
    if (isset($_GET['article'])) {
        if (file_exists('articles/'.$_GET['article'].'.php')){
            $article = 'get'.ucfirst($_GET['article']);
            include 'articles/'.$_GET['article'].'.php';
        } else {
            include 'articles/notFound404.php';
            $article = 'getNotFound404';
        }
    } else {
        include 'articles/home.php';
        $article = 'getHome';
    }

    return $article($conn, $errors);
}

?>