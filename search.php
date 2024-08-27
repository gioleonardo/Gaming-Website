<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Search</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <!-- local Icons style -->
        <link rel="stylesheet" href="./images/fontawesome-free-6.5.1-web/css/all.min.css">
    </head>
    <body>
        <?php 
         // INSERTING MY NAVLINKS AND IMPORTING MY DATABASE CONNECTION
            include('.\assets\header.html');
            include('.\assets\dbconnect.php');
        ?>
        <!-- FORM  TO SEARCH FOR PRODUCT IN DATABASE -->
        <div class="body-bg">
            <form action="search.php" method="post" class="search_form">
                <h3>Search our database for specific products in stock now:</h3>
                
                <div>
                    <label for="filter">choose from dropdown a suitable search term</label>
                    <select name="filter" id="filter">
                        <option value="Name">NAME</option>
                        <option value="Name">PRICE</option>
                        <option value="Name">DEVELOPER</option>
                    </select>
                </div>
                
                <div>
                    <label for="search">Please specify:</label>
                    <input type="search" id="search" name="search">
                    <button id="search_button" name="submit_search"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>


        <?php 
         // IF I HAVE CLICKED ON THE SUBIT_SEARCH BUTTON THEN 
            if (isset($_POST["submit_search"])){

                $product_search = $_POST["search"];
                // GET ALL ITEMS FROM THE DATABASE THAT THE PRICE, NAME , DEVELOPER, OR IMAGE IS SIMILAR 
                // TO WHAT IS IN THE SEARCH BAR EHICH IS HELD IN VARIABLE PRODUCT SEARCH
                $sql = "SELECT * 
                FROM products 
                where id like '%$product_search%'
                OR name like '%$product_search%'
                OR developer like '%$product_search%'
                OR price like '%$product_search%'
                OR image like '%$product_search%'
                ";

                $result = mysqli_query($dbconn, $sql);
                echo '<table>';
                // DISPLAY THE RESULTS
                if (mysqli_num_rows($result) > 0) {
                    echo "
                        <h1 id='search_result_header'> YOUR SEARCH RESULTS........</h3>
                        
                        <tr>
                            <th>IMAGE</th>
                            <th>PRODUCT</th>
                            <th>DEVELOPER</th>
                            <th>PRICE</th>
                        </tr>
                        </thead>
                
                    ";
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "
                         
                            <tbody>
                            <tr>
                                <td><img class='table_img' src='images/games/$row[image]'></td>
                                <td>$row[name]</td>
                                <td>$row[developer]</td>
                                <td>£$row[price]</td>
                            </tr>
                            </tbody> 
                            
                        ";
                    }
                    
                }
                else{
                    echo "
                        <div id='error_message'>
                            <h1>Product not in Database contact us for more info....</h1>
                        </div>
                    ";
                }
            }
            echo"</table>";
        ?>
        <!-- IMPORTING THE FOOTER -->
        <?php include('.\assets\footer.html');?>

        <!-- LOCAL JS FILE -->
        <script src="script.js" async defer></script>

        <!-- JQUERY CDN LINK(FASTER) -->
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" 
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" 
        crossorigin="anonymous">
        </script>

      
    </body>
</html>
