<?php
// CONNECTION TO DATABASE.
    $servername = 'localhost';
    $username = 'admin';
    $password = 'pass';
    $dbname = 'test';

    $dbconn = new mysqli($servername, $username, $password, $dbname);
    

    if($dbconn -> connect_error){
        die('Connection failed!!. CHECK '. $dbconn->connect_error);
    }  
   
?>