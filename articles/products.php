<?php 

function getProducts() {
    if(empty($_SESSION['name'])) {
        //header("Location: index.php");
        return "
        <div class='page'>
            <p>Please <span id='loginBtn'>login</span> to see this page</p>
        </div>
        ";
    }
    return "
    <div class='page'>
        <h1>Products</h1>
    </div>";
}

?>