<?php 
 // IMPORTING MY DATABASE CONNECTION AND STATING A PHP SESSION
    session_start();
    include('.\assets\dbconnect.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Order</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <!-- local Icons style -->
        <link rel="stylesheet" href="./images/fontawesome-free-6.5.1-web/css/all.min.css">
    </head>
    <body>
        <?php 
            include('.\assets\header.html'); 
            // DELETE AN ORDER FROM DATABASE
            if(isset($_GET['action']) && $_GET['action'] == "delete"){
                $cart_id = $_GET['id'];
                $delete_stmt = "DELETE FROM cart WHERE id='$cart_id'";
                mysqli_query($dbconn, $delete_stmt);
                if($delete_stmt){
                    echo "<h3 class='success-message'>Sucessfully removed from cart</h3>";
                }
            }
        
        ?>
        <!-- FORM FOR SUBMITTING ORDER TO EMAIL -->
        <form action="order.php" method="POST">
        <div class="table-container">
            <table>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Developer</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Remove Item</th>
                </tr>
                <?php
                    $cart_sql = "SELECT * FROM cart";
                    $result = $dbconn -> query($cart_sql);
                    $total = 0;
                    // VIEW ALL ROWS IN CART TABLE
                    if(mysqli_num_rows($result) >0){
                        while($cart_stmt = mysqli_fetch_assoc($result)){
                            $items= (number_format($cart_stmt['price'] * $cart_stmt['quantity'], 2));
                            echo"
                                <tr>
                                    <td><img src='images/games/$cart_stmt[image]' class='table_img'></td>
                                    <td>$cart_stmt[name]</td>
                                    <td>$cart_stmt[developer]</td>
                                    <td>$cart_stmt[price]</td>
                                    <td>$cart_stmt[quantity]</td>
                                    <td>£$items</td>
                                    <td><button class='button'><a href='order.php?action=delete&id=$cart_stmt[id]'>Remove item</a></button></td>
                                </tr>   
                            ";
                            $total += ($cart_stmt['price'] * $cart_stmt['quantity']);
                            $total_format = number_format($total, 2);
                        };
                    };
                    echo"
                        <tr></tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total:</td>
                            <td>£$total_format</td>
                            <td><button class='button' id='proceed'>PROCEED TO PAYMENT</button></td>
                        </tr>
                    "
                ?>
            </table>

        </div>
        </form>
        <!-- GETTING ALL ORDERS FROM THE CART DATABASE TO SEND TO EMAIL -->
        <?php
            $sql = "SELECT * FROM cart";
            $result = $dbconn->query($sql);
            
            if (isset($_POST['Proceed'])) {
                // Preparing the email details
                $to = "bi51hx@student.sunderland.ac.uk";
                $subject = "All Order Details";
                $message = "Here are the order details:\n\n";
            
                // Fetch each order
                while($row = $result->fetch_assoc()) {
                    $message .= "Order ID: " . $row["id"] . "\n";
                    $message .= "Product: " . $row["name"] . "\n";
                    $message .= "Order Quantity: " . $row["quantity"] . "\n";
                    $message .= "Total Cost: " . $row["price"] . "\n";
                }
            
                // Set the email headers
                $headers = "From: bi51hx";
                $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
            
                // Send the email
                if (mail($to, $subject, $message, $headers)) {
                    echo "<h3 class='success-message'>Order details bi51hx@student.sunderland.ac.uk sent successfully!</h3>";
                } else {
                    echo "Failed to send order details.";
                }
            } 
            else {
                echo "<h3 class='error-message'>Not sent</h3>";
            }
        ?>
        <!-- IMPORTING THE FOOTER -->
        <?php include('.\assets\footer.html'); ?>
        <script src="script.js" async defer></script>
    </body>
</html>
