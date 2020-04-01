<?php 

function Title() {
    if (isset($_GET['article'])) {
        if (file_exists('articles/'.$_GET['article'].'.php')) {
            $title = ucfirst($_GET['article']);
        } else {
            $title = "Page not found";
        }
    } else {
        $title = 'Home';
    }

    return $title;
}

?>