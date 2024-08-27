<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Products</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <!-- local Icons style -->
        <link rel="stylesheet" href="./images/fontawesome-free-6.5.1-web/css/all.min.css">
    </head>
    <body>
        <?php
            // IMPORTING NAVBAR FROM ASSETS
            include('.\assets\header.html');
            // IMPORTING CONNECTION TO DATABASE FROM ASSETS
            include('.\assets\dbconnect.php');

            // GETTING DETAILS FROM PRODUCTS PAGE
            if (isset($_POST['add'])){
                $order_id = $_GET['id'];
                $order_img = $_POST['hidden_img'];
                $order_name = $_POST['hidden_name'];
                $order_dev = $_POST['hidden_developer'];
                $order_qty = $_POST['qty'];
                $order_price = $_POST['hidden_price'];

                $order_sql = "INSERT INTO cart(name, developer, image ,price, quantity) 
                VALUES ('$order_name', '$order_dev','$order_img' ,'$order_price', '$order_qty')";
                $result = $dbconn -> query($order_sql);

                if ($order_sql){
                    echo '<h3 class= "sucess_message">Succesfully added to cart</h3>';
                }
            }
        ?>

        <div class="body-bg">
            <!-- POPULATING GAMING PRODUCTS -->

            <section class="featured-games">
                <h2>Games</h2>
                <P>BEST GAMES FOR THE BEST PRICES</P>
                <div class='games-con'>
                    <?php 
                        $games_sql = "SELECT * FROM products";
                        $result = $dbconn -> query($games_sql);

                        if(!$result){
                            die("invalid query: ".$dbconn->error);
                        }

                        while($games_stmt = mysqli_fetch_assoc($result)){
                            echo"
                                <div class='f-gm'>
                                    <form action='products.php?action=add&id=$games_stmt[id]' method='post'>
                                    <img src='images/games/$games_stmt[image]'>
                                        <div class='description'>
                                            <span>$games_stmt[developer]</span>
                                            <h5>$games_stmt[name]</h5>
                                            <div class='rating'>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                            </div>
                                            <h4>£$games_stmt[price]</h4>

                                            <label for='qty'>Quantity</label>
                                            <select name='qty' class='qty'>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>
                                                <option value='6'>6</option>
                                                <option value='7'>7</option>
                                                <option value='8'>8</option>
                                                <option value='9'>9</option>
                                                <option value='10'>10</option>
                                            </select>
                                            <input type='hidden' name='hidden_img' value='$games_stmt[image]'>
                                            <input type='hidden' name='hidden_name' value='$games_stmt[name]'>
                                            <input type='hidden' name='hidden_developer' value='$games_stmt[developer]'>
                                            <input type='hidden' name='hidden_price' value='$games_stmt[price]'>
                                            <a href=''><button class= prod_but name ='add'><i class='fa-solid fa-cart-shopping'></i></button></a>
                                            
                                        </div>
                                    </form>
                                </div>
                            ";
                            
                        };
                    ?>
                </div>
            </section>
            <!-- POPULATING GAMING PRODUCTS -->
            <section class="featured-games">
                <h2>CONSOLES AND ACCESORIES</h2>
                <P>only the best and affordable gaming accesories and consoles</P>
                <div class='games-con'>
                    <?php 
                        $accesories_sql = "SELECT * FROM accesories";
                        $result = $dbconn -> query($accesories_sql);

                        if(!$result){
                            die("invalid query: ".$dbconn->error);
                        }

                        while($accesories_stmt = mysqli_fetch_assoc($result)){
                            echo"
                                <div class='f-gm'>
                                    <form action='products.php?id= $accesories_stmt[id]' method='post'>
                                    <img src='images/games/$accesories_stmt[image]'>
                                        <div class='description'>
                                            <span>$accesories_stmt[developer]</span>
                                            <h5>$accesories_stmt[name]</h5>
                                            <div class='rating'>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                            </div>
                                            <h4>£$accesories_stmt[price]</h4>

                                            <label for='qty'>Quantity</label>
                                            <select name='qty' class='qty'>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>
                                                <option value='6'>6</option>
                                                <option value='7'>7</option>
                                                <option value='8'>8</option>
                                                <option value='9'>9</option>
                                                <option value='10'>10</option>
                                            </select>
                                            <input type='hidden' name='hidden_img' value='$accesories_stmt[image]'>
                                            <input type='hidden' name='hidden_name' value='$accesories_stmt[name]'>
                                            <input type='hidden' name='hidden_developer' value='$accesories_stmt[developer]'>
                                            <input type='hidden' name='hidden_price' value='$accesories_stmt[price]'>

                                            <a href=''><button class= prod_but name ='add'><i class='fa-solid fa-cart-shopping'></i></button></a>
                                        </div>
                                    </form>
                                </div>
                            ";

                        };
                    ?>
                
                </div>
            <section>
            <!-- POPULATING GAMING PRODUCTS -->
            <section class="featured-games">
                <h2>PC Gaming components</h2>
                <P>only the best and affordable pc gaming accesories and consoles</P>
                <div class="games-con">
                    <?php 
                        $pc_sql = "SELECT * FROM pc_gaming";
                        $result = $dbconn -> query($pc_sql);

                        if(!$result){
                            die("invalid query: ".$dbconn->error);
                        }

                        while($pc_stmt = mysqli_fetch_assoc($result)){
                            echo"
                                <div class='f-gm'>
                                    <form action='products.php?id= $pc_stmt[id]' method='post'>
                                    <img src='images/games/$pc_stmt[image]'>
                                        <div class='description'>
                                            <span>$pc_stmt[developer]</span>
                                            <h5>$pc_stmt[name]</h5>
                                            <div class='rating'>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                                <i class='fa-solid fa-star'></i>
                                            </div>
                                            <h4>£$pc_stmt[price]</h4>

                                            <label for='qty'>Quantity</label>
                                            <select name='qty' class='qty'>
                                                <option value='1'>1</option>
                                                <option value='2'>2</option>
                                                <option value='3'>3</option>
                                                <option value='4'>4</option>
                                                <option value='5'>5</option>
                                                <option value='6'>6</option>
                                                <option value='7'>7</option>
                                                <option value='8'>8</option>
                                                <option value='9'>9</option>
                                                <option value='10'>10</option>
                                            </select>

                                            <input type='hidden' name='hidden_img' value='$pc_stmt[image]'>
                                            <input type='hidden' name='hidden_name' value='$pc_stmt[name]'>
                                            <input type='hidden' name='hidden_developer' value='$pc_stmt[developer]'>
                                            <input type='hidden' name='hidden_price' value='$pc_stmt[price]'>

                                            <a href=''><button class= prod_but name ='add'><i class='fa-solid fa-cart-shopping'></i></button></a>
                                        </div>
                                    </form>
                                </div>
                            ";

                        };
                    ?>
                </div>
            <section>
        </div>
        <!-- IMPORTING THE FOOTER -->
        <?php include('.\assets\footer.html'); ?>
       
        <script src="script.js" async defer></script>
    </body>
</html>