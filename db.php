<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "1234567";
    $dbname = "quiz";

    $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

    if(mysqli_connect_errno()){
        die("Database Connection Failed".mysqli_connect_error());
    }
?>