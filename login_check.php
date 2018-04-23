<?php
    if ($_SESSION['logged_in']==false){
        echo 'Please log-in';
        header("location:login.php");
    }

?>