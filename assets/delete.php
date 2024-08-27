<?php
// GET AN ITEM SENT BY THE DELETE BUTTON IN THE ADMIN PAGE AND DELETE IT.
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        include('..\assets\dbconnect.php');

        $delete_sql = "DELETE FROM products WHERE id =$id";
        $delete_run = $dbconn -> query($delete_sql);

        echo "<h1>product details deleted</h1>";
        header("location:../admin.php");
    }
?>