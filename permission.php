<?php
    if(!$_SESSION['Rule']=="admin"){
        header("location: index.php");
        die();
    }
?>
    