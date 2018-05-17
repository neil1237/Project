<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>GETTING STARTED WITH BRACKETS</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="css.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="container">
            <header>
                <div class ="section1">
                    <img src="images/logo.png" class="title" onclick="clicked()" style="width:100px;height:100px;">
                </div>
                <div class="clear"></div>
                
                <nav>
				    <ul>
				        <li><a class="active" href="index.php">Welcome Page</a></li>
				        <li><a href="items.php">Items for sale</a></li>
				        <li><a href="gallery.html">Gallery</a></li>
				        <li><a href="contactUs.html">Contact us</a></li>
				</ul>
				</nav>
            </header>
            
            <div class="products">
                    <?php
                        session_start();
                        $userId = $_SESSION['userId'];
                        include 'connect.php';
                
                            $query4 = "select cart.ProductId, products.Name, products.Price from cart inner join products on cart.ProductId=products.ProductId where cart.UserId=$userId";

                            $result4 = mysqli_query($conn, $query4)or die("Error in query: ". mysqli_error($conn));
                            $products = '';
                            while ($row = mysqli_fetch_assoc($result4)){
                                $products .= "<p>$row[Name] $row[Price] euro </p></br>";                                      
                            }
                            if(isset($_POST['send']))
                            {
                                require($_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoload.php'); #load the library required for phpmailer
                                
                                $myemail =$_POST['Email'];
                                $myPassword =$_POST['Password'];
                                $mail = new PHPMailer(); #create a new instance
                                $mail->isSMTP(); #using SMTP
                                $mail->isHtml(true);
                                $mail->Host = 'smtp.office365.com';
                                #$mail->SMTPDebug = 2; #include client and server messges
                                $mail->Port = 587;
                                $mail->SMTPSecure = 'tls';
                                $mail->SMTPAuth = true;
                                $mail->Username = $myemail;
                                $mail->Password = $myPassword;
                                $mail->Body = $products;
                                $mail->Subject = 'Products Bought';
                                $mail->From = $myemail; #sender
                                $mail->AddAddress($myemail); #recepient

                                if (!$mail->Send()) #sending the email
                                {
                                    echo "Message was not sent";
                                    echo "Mailer Error: ". $mail->ErrorInfo;
                                }
                                else{
                                    echo 'Message was sent';
                                
                                    $query2 = "update products set Instock=Instock-1 where ProductId in (select ProductId from cart where UserId=$userId)";
                                    $result = mysqli_query($conn, $query2)
                                    or die("Error in query: ". mysqli_error($conn));

                                    $query3 = "delete from cart where UserId = $userId";
                                    $result = mysqli_query($conn, $query3)
                                    or die("Error in query: ". mysqli_error($conn));
                                    echo '<script language="javascript">';
                                    echo 'alert("Items bought succsesfully")';
                                    echo '</script>';
                                    header("Location: index.php");
                                }
                            }
                        
                    ?>
            </div>
            
        </div>
        <script>
            function clicked() {
                alert("Welome to the website");
            }
        </script>
    </body>
</html>