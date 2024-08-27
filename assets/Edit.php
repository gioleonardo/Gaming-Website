<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Edit products</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style.css">
        <!-- local Icons style -->
        <link rel="stylesheet" href="../images/fontawesome-free-6.5.1-web/css/all.min.css">
    </head>
    <body>
        <?php
         // TO IMPORT DATABASE CONNECTION
            include('..\assets\dbconnect.php');
            $id = "";
            $name = "";
            $developer = "";
            $price = "";
            //  IF SERVER DETECTS A GET METHOD,
            if ($_SERVER['REQUEST_METHOD'] == 'GET'){
                // IF NOT GIVE AN ERROR MESSAGE
                if(!isset($_GET['id'])){
                    echo '<h1>nil</h1>';
                };
                // GET MY ID SO I COULD USE IT TO DELETE AN ITEM
                $id = $_GET['id'];

                // SELECT ALL ITEMS FROM PRODUCTS WHERE THE ID MATCHES THE ID FROM THE GET METHOD
                $edit_stmt = "SELECT * FROM products WHERE id = $id";
                $result = $dbconn -> query($edit_stmt);
                $row = $result -> fetch_assoc();

                // IF THE STATEMENT DOSENT WORK GIVE AN ERROR MESSAGE AND REDIRECT TO ADMIN PAGE
                if(!$row){
                    echo"error in fetching details";
                    header("location:../admin.php");
                }

                $name = $row["name"];
                $developer = $row["developer"];
                $price = $row["price"];
            }
            //  IF SUCCESSFUL USE THE ID RECIEVED TO UPDATE THE PRODUCT INFO
            else{
                $id = $_POST["id"];
                $name = $_POST["product"];
                $developer = $_POST["developer"];
                $price = $_POST["price"];

                $edit_sql = " UPDATE products 
                                SET name = '$name', developer ='$developer', price = $price
                                WHERE id = $id
                
                ";
                $edit_run = $dbconn -> query($edit_sql);

                // IF IT WORKS DISPLAY A SUCCESS MESSAGE ELSE DISPLAY AN ERROR MESSAGE.
                if(!$edit_sql){
                    echo "
                    <div id='error_message'>
                        <h1>product details not updated!!!!!</h1>
                    </div>
                    ";
                }
                else{
                    echo"
                        <div class='success_message'>
                            Product details Updated sucessfully..
                        </div>
                    ";
                }
            }
        ?>
        <!-- FORM TO EDIT PRODUCT BY THE ID ECHO GETS THE DATA SENT BY THE ADMIN EDIT BUTTON -->
        <div class="edit-style">
            <div class="title">
                <h2>Add product to database</h2>
                <hr>
            </div>
            <form action="edit.php" class="gen-form-style" method="post">
                <div>
                    <input type="hidden" name="id" value="<?php echo $id?>">
                    <input type="text" id='product' name='product' value="<?php echo $name ?>"  class="fields" required>
                    <input type="text" id='developer' name='developer' value="<?php echo $developer ?>" class="fields" required>
                    <input type="text" id='price' name='price' value="<?php echo $price ?>"  class="fields" required>
                    <button name="edit">Update prod info <i class="fa-solid fa-plus"></i></button>
                    <button class="back"><a href="../admin.php">Go back to admin panel</a> <i class="fa-solid fa-angles-left"></i></button>
                </div>
            </form>
        </div>

    
    </body>
</html>