<?php
    if (isset( $_POST['send']));
    {
        $myemail ='neil.mizzi.b42040@mcast.edu.mt';
        $myPassword ='mcast451400';
        $username =$_POST['first_name'];
        $surname =$_POST['last_name'];
        $email =$_POST['email_Address'];
        $comment =$_POST['comments'];
        
        require($_SERVER['DOCUMENT_ROOT'].'/phpmailer/PHPMailerAutoload.php');

        $mail = new PHPMailer(); #create a new instance
        $mail->isSMTP();#using SMTP
        $mail->isHtml(true);
        $mail->Host = "smtp.office365.com";
        $mail->SMTPDebug =2;#include client and server messages jekk tnehhi din biex tnehhi il code milli jidher
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";
        $mail->SMTPAuth = true;
        $mail->Username = $myemail;
        $mail->Password = $myPassword;
        $mail->Body = $comment;
        $mail->Subject = "test";
        $mail->From = $myemail;#sender
        $mail->AddAddress($myemail);#recepient

        //$mail->Send(); #sending the email
        if (!$mail->Send()){ #sending the email
            echo"Message was not sent";
            echo "Mailer Error:". $mail->ErrorInfo;
        }
        else{
            echo "Message was sent";
        }
        }

    //this is to send email
    
?>