<!DOCTYPE html>
<html>
    
    <head>
        <title>Club Registration Form</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="form-group bg-light" >
            <div class="container">
                <div class="login">
                    <h1>Login Page</h1>    
                    <form method ="post" action="loginRegistration.php">
                      <h3>Enter your Details</h3>
                        Email:
                      <input type="email" name="email1" class="form-control" required>
                      <br>
                      Password:
                      <input type="password" name="password"class="form-control" >
                      
                      <br><br>
                      <input type="submit" class="btn btn-primary"value="Submit" name ="login">
                      <input type="reset"class="btn btn-light" value="Refresh" >

                    </form> 
                </div>
                <br><br>
                <div class="signup">
                    <h1>Sign Up Page</h1>    
                    <form method ="post" action="loginRegistration.php">
                      <h3>Enter your Details</h3>
                        Name:
                      <input type="text" name="name" class="form-control" required>
                        Surname:
                      <input type="text" name="surname" class="form-control" required>
                        Email:
                      <input type="email" name="email" class="form-control" required>
                        Username:
                      <input type="text" name="username2" class="form-control" required>
                      <br>
                      Password:
                      <input type="password" name="password2"class="form-control" >
                      
                      <br><br>
                      <input type="submit" class="btn btn-danger"value="Submit" name ="sign-up">
                      <input type="reset"class="btn btn-light" value="Refresh" >

                    </form> 
                </div>
                
            </div>
            <?php
                    session_start();
                if (isset($_POST['login'])){
                    $email1=$_POST['email1'];
                    $password=$_POST['password'];
                    if (!empty($email1) && !empty($password)){
                        include 'connect.php';
                        $query = "SELECT Name FROM user Where Email='$email1' and Password='$password'";
                        $result = mysqli_query($conn, $query)
                        or die("Error in query: ". mysqli_error($conn));

                            if (mysqli_num_rows($result) >0)
                            {
                                $row= mysqli_fetch_row($result);
                                $name=$row[0];
                                $_SESSION['name']=$name;
                            }
                            else
                            {
                                echo '<script language="javascript">';
                                echo 'alert("Email or password are incorrect")';
                                echo '</script>';
                            }
                        
                        /*UserId*/
                        $query1 = "SELECT UserId FROM user Where Email='$email1' and Password='$password'";
                        $result1 = mysqli_query($conn, $query1)
                        or die("Error in query: ". mysqli_error($conn));

                            if (mysqli_num_rows($result1) >0)
                            {
                                $row= mysqli_fetch_row($result1);
                                $userId=$row[0];
                                $_SESSION['userId']=$userId;
                                header("Location: index.php");
                            }


                    }
                }
            if (isset($_POST['sign-up'])){
                    $name=$_POST['name'];
                    $surname=$_POST['surname'];
                    $email=$_POST['email'];
                    $username2=$_POST['username2'];
                    $password2=$_POST['password2'];
                    if (!empty($name) && !empty($name)){
                        $conn = mysqli_connect("localhost", "root", "", "supermarket");
                        $query = "INSERT INTO user (Name,Surname,Email,Username,Password)
                                VALUES ('$name','$surname','$email','$username2','$password2')";
                        $result = mysqli_query($conn, $query)
                        or die("Error in query: ". mysqli_error($conn));
                        
                        echo '<script language="javascript">';
                                echo 'alert("New account created now login")';
                                echo '</script>';
                    }
                }

            ?>
        </div>
    </body>
</html>