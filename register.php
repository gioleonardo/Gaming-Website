<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <!-- local Icons style -->
        <link rel="stylesheet" href="./images/fontawesome-free-6.5.1-web/css/all.min.css">
    </head>
    <body>
        <?php
            // USING THE INCLUDE TO GET MY NAV LINKS
            include('.\assets\header.html');
            // USING THE INCLUDE TO CONNECT TO DATABASE.
            include('.\assets\dbconnect.php');

            // FOR REGISTRATION
            if (isset($_POST['register'])){
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['reg_mail'];
                $password = $_POST['reg_pwd'];
                // PASSWORD ENCRYPTION(HEXADECIMAL CHARACTERS)
                $password = md5($password);
                
                // GETTING ALL DETAILS FROM THE REGISTER TABLE TO KNOW IF THE USER IS ALREADY REGISTERED IF THE USER IS ALREADY REGISTERED THEN
                // MEASSAGE ALREADYREGISTERED  ELSE REGISTER THE USER.
                $check_email = "SELECT * FROM register WHERE  email = '$email' ";
                $result = $dbconn -> query($check_email);

                if($result -> num_rows > 0){
                    echo "<h5 class='success_message'>USER ALREADY REGISTERED!!</h5>";
                }
                else{
                    $data = "INSERT INTO register(First_Name, Last_Name, Email, Password) values('$fname', '$lname', '$email', '$password')";
                    $data_run = mysqli_query($dbconn, $data);
    
                    if($data_run){
                        echo "<h3 class='success_message'>sucessfully registered!! you can Login now.</h3>";
                    }
                    else{
                        echo "Error: " . mysqli_error($dbconn);
                    }
                }
            }

            // FOR LOGIN
            IF (isset($_POST['login'])){
                $login_mail = $_POST['login_mail'];
                $login_pass = $_POST['login_pwd'];
                $login_pass = md5($login_pass);

                // CHECKING IF USER DETAILS ARE IN MY REGISTER TABLE IF YEA THE USER IS REGISTERED ELSE THE MESSAGE
                // INCORRECT LOGIN DETAILS
                $login_stmt = "SELECT * FROM register WHERE email = '$login_mail' and Password = '$login_pass' ";
                $login_run = $dbconn -> query($login_stmt);

                if($login_run -> num_rows > 0){
                    session_start();
                    $row_data = $login_run -> fetch_assoc();
                    $_SESSION['email'] = $row_data['email'];
                    header("Location: order.php");
                    exit();
                }
                else{
                    echo "<h3 class = 'error_message'>Incorrect Login details! check email or password!!</h3>";
                }
            }
        
        ?>



        <div class="register-login">
            <div class="register-header">
                <h2>My account</h2>
                <p><i class="fa-regular fa-id-card"></i> Please Login or register to view orders or join the community</p>
            </div>

            <div class="account-style">
                <div >
                    <h2>Register</h2>
                    <form action="register.php"  class="gen-form-style" method="post">
                        <div>
                            <input type="text" id='fname' name='fname' class="fields" placeholder="first name" required>
                            <input type="text" id='lname' name='lname' class="fields" placeholder="last name" required>
                            <input type="email" id='reg_mail' name='reg_mail' class="fields" placeholder="email" required>
                            <input type="password" id='reg_pwd' name='reg_pwd' class="fields" placeholder="password" required>
                            <input type="password" id='conf_pwd' name='conf_pwd' class="fields" placeholder="confirm password" required>
                            <div class="checkbox-container">
                                <label for="checkbox">show password</label>
                                <input type="checkbox" name="checkbox" id="checkbox" onclick='show_password()'>
                            </div>
                            
                            <button id="register_button" name="register">Sign up <i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>

                <div >
                    <h2>Login</h2>
                    <form action="register.php" class="gen-form-style" method="post">
                    
                        <div>
                            <input type="email" id='login_mail' name='login_mail' class="fields" placeholder="email" required>
                            <input type="password" id='login_pwd' name='login_pwd' class="fields" placeholder="password" required>

                            <p id="recover_pwd"><a href="">Recover password</a></p>

                            <button id="login_button" name="login">Login <i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>                   
            </div>
        </div>

        <!-- IMPORTING THE FOOTER -->
        <?php include('.\assets\footer.html'); ?>

        <script src="script.js" async defer></script>
    </body>
</html>