<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin</title>
        <meta name="Admin" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">

        <!-- local Icons style -->
        <link rel="stylesheet" href="./images/fontawesome-free-6.5.1-web/css/all.min.css">
    </head>
    <body>
        <?php
            // IMPORTING CONNECTION TO DATABASE FROM ASSETS
            include('.\assets\dbconnect.php');
        ?>
        
        <div class="admin-style">
            <h2>ADMIN PANEL</h2>
            <h3>Manage catalogue, clients and orders from here............</h3>
            <!-- ADMIN PAGE TO MANAGE THE USERS ON WEBSITE -->
            <h4>Manage Clients:</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>
                    <?php
                        $register_stmt = "SELECT * FROM register";
                        $result = $dbconn -> query($register_stmt);

                        if(!$result){
                            die("invalid query: ".$dbconn->error);
                        }

                        while($register_stmt = mysqli_fetch_assoc($result)){
                            echo"
                                <tr>
                                    <td>$register_stmt[First_Name]</td>
                                    <td>$register_stmt[Last_Name]</td>
                                    <td>$register_stmt[Email]</td>
                                    <td>
                                        <button class='edit-button'><a href='.\assets\edit.php?id=$register_stmt[id]'>Edit</a></button> 
                                        <button class='delete-button'><a href='.\assets\delete.php?id=$register_stmt[id]'>Delete</a></button>
                                    </td>
                                </tr>                            
                            ";
                        }
                    ?>

                </tbody>

            </table>
            <!-- ADMIN PAGE TO MANAGE THE PRODUCTS ON WEBSITE -->
            <h4>Manage Catalogue:</h4>
            <button class="create-button"><a href='.\assets\create.php'>Add New Product</a></button>
            <table class="table">
                <thead>
                    <tr>
                        <th>Product-name</th>
                        <th>Developer</th>
                        <th>image</th>
                        <th>price</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $product_sql = "SELECT * FROM products";
                        $result = $dbconn -> query($product_sql);

                        if(!$result){
                            die("invalid query: ".$dbconn->error);
                        }

                        while($product_stmt = mysqli_fetch_assoc($result)){
                            echo"
                                <tr>
                                    <td>$product_stmt[name]</td>
                                    <td>$product_stmt[developer]</td>
                                    <td><img class = 'table_img' src='images/games/$product_stmt[image]'></td>
                                    <td>£$product_stmt[price]</td>
                                    <td>
                                        <button class='edit-button'><a href='.\assets\Edit.php?id=$product_stmt[id]'>Edit</a></button> 
                                        <button class='delete-button'><a href='.\assets\delete.php?id=$product_stmt[id]'>Delete</a></button>
                                    </td>
                                </tr>                            
                            ";
                        }
                    ?>
                </tbody>

            </table>
            <!-- ADMIN PAGE TO MANAGE THE ORDERS ON WEBSITE -->
            <h4>Manage Orders:</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Order Name</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>
                    <tr>
                        <?php
                            $cart_sql = "SELECT * FROM cart";
                            $result = $dbconn -> query($cart_sql);

                            if(!$result){
                                die("invalid query: ".$dbconn->error);
                            }

                            while($cart_stmt = mysqli_fetch_assoc($result)){
                                echo"
                                    <tr>
                                        <td>$cart_stmt[id]</td>
                                        <td>$cart_stmt[name]</td>
                                        <td>$cart_stmt[quantity]</td>
                                        <td>£$cart_stmt[price]</td>
                                        <td>
                                            <button class='edit-button'><a href='.\assets\Edit.php?id=$cart_stmt[id]'>Edit</a></button> 
                                            <button class='delete-button'><a href='.\assets\delete.php?id=$cart_stmt[id]'>Delete</a></button>
                                        </td>
                                    </tr>                            
                                ";
                            }
                        ?>
                    </tr>
                </tbody>

            </table>
        </div>
        
    
        <a href="./assets/edit.php"></a>
    </body>
</html>