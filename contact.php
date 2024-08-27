<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Contact</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <!-- local Icons style -->
        <link rel="stylesheet" href="./images/fontawesome-free-6.5.1-web/css/all.min.css">
    </head>
    <body>
        <?php
            include('.\assets\header.html');
            include('.\assets\dbconnect.php');
            

            if (isset($_POST['submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $subject = $_POST['subject'];
                $message = $_POST['message'];

                // USING THE INBUITS FUNCTION MAIL
                
                $mail_header = "From:" .$name. "<" .$email. ">";
                $recipient = "dimgiovanni768@gmail.com";

                mail($recipient, $subject, $message, $mail_header) or die("error!!!");

                echo "<h1 class='success-image'>Successfully sent to bi51hx@student.sunderland.ac.uk</h1>";

            }   
        ?>
        <!-- FORM FOR GETTING CUSTOMER MEASSAGE DETAILS -->
        <div class="body-bg">
            <div class="form" >
                <form action='contact.php'  class="gen-form-style" method="post">
                    <div class="title">
                        <h2>GET IN TOUCH GAMER............</h2>
                        <hr>
                    </div>
                    <input type="text" id='name' name='name' placeholder="Your name" class="fields" required>
                    <input type="email" id='mail' name='email' placeholder="Your email" class="fields" required>
                    <input type="text" id='subject' name='subject' placeholder="subject" class="fields">
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="message........." class="fields" required></textarea>
                    <button name="submit">Send <i class="fa-solid fa-paper-plane"></i></button>
                </form>
                
                <div class="form-img">
                    <i class="fa-brands fa-slack"></i></i>
                </div>

            </div>
        </div>

        <!-- IMPORTING THE FOOTER -->
        <?php include('.\assets\footer.html');?> 
        <script src="script.js" async defer></script>
    </body>
</html>