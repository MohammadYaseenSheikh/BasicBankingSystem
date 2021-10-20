<?php

    $servername = "localhost";
    $username = "root";
    $pwd = "";
    $dbname = "TSF_DB";

    $conn = mysqli_connect($servername, $username, $pwd, $dbname);

    if(!$conn){
        die("Databse Connection Failed:".mysqli_connect_error());
    }

?>