<?php session_start(); ?>
<?php
    if(isset($_SESSION['adminname'])) {
        unset($_SESSION['adminname']);
        header('Location: index.php');
    }
    else {
        unset($_SESSION['username']);
        header('Location: index.php');
    }
?>