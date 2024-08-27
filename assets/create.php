<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Create product</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style.css">
        <!-- local Icons style -->
        <link rel="stylesheet" href="../images/fontawesome-free-6.5.1-web/css/all.min.css">
    </head>
    <body>

        <?php
            include('..\assets\dbconnect.php');
            // IMPORTING CONNECTION TO DATABASE FROM ASSETS

            // INSERTING DATA INTO DATABASE DYNAMICALLY FROM WEBPAGE
            if (isset($_POST['create'])){
                $name = $_POST["product"];
                $developer = $_POST["developer"];
                $img = $_POST["image"];
                $price = $_POST["price"];
                

                $create_stmt = "INSERT INTO products (name, developer, image, price) VALUES ('$name','$developer','$img','$price')";
                $create_run = $dbconn -> query($create_stmt);
                //  ERROR CHECKING IF STATEMENT RUNS OR NOT OUTPUT A MESSAGE.
                if(!$create_stmt){
                    echo "
                    <div id='error_message'>
                        <h1>product details not added!!!!!</h1>
                    </div>
                    ";
                }
                else{
                    echo"
                        <h3 class='success-message'>
                            Product added to database sucessfully..
                        </h3>
                    ";
                }
            }
        ?>
        
        <!-- FORM TO DYNAMICALLY CREATE PRODUCTS -->
        <div class="create-style">
            <div class="title">
                <h2>Add a new product to the database..</h2>
                <hr>
            </div>
            <form action="create.php" class="gen-form-style" method="post">
                <div>
                    <input type="text" id='product' name='product' placeholder="Product name" class="fields" required>
                    <input type="text" id='developer' name='developer' placeholder="Developer" class="fields" required>
                    <input type="text" id='price' name='price' placeholder="Price" class="fields" required>
                    <input type='text' name='image' placeholder="Image name" class="fields" required>
                    
                    <button name="create">ADD <i class="fa-solid fa-plus"></i></button>
                    <button class="back"><a href="../admin.php">Go back to admin panel</a> <i class="fa-solid fa-angles-left"></i></button>
                </div>
            </form>
        </div>
    </body>
</html>