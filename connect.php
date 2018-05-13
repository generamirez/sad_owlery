<?php

if(session_status() == 1){
    session_start();
    $host="localhost"; // Host name
    $username="root"; // Mysql username
    $password=""; // Mysql password
    $db_name="owlery_sad"; // Database name
    $tbl_name="users"; // Table name
    // Connect to server and select databse.
    $dbcon=mysqli_connect("$host", "$username", "$password", "$db_name")or die("cannot connect");
    date_default_timezone_set('Asia/Hong_Kong');

}
    


?>