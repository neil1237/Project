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
                    <form method ="post" action="login.php">
                      <h3>Enter your Details</h3>
                        Username:
                      <input type="text" name="Username" class="form-control" required>
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
                    <form method ="post" action="send.php">
                      <h3>Enter your Details</h3>
                        Username:
                      <input type="text" name="Username" class="form-control" required>
                      <br>
                      Password:
                      <input type="password" name="password"class="form-control" >
                      
                      <br><br>
                      <input type="submit" class="btn btn-danger"value="Submit">
                      <input type="reset"class="btn btn-light" value="Refresh" >

                    </form> 
                </div>
                <?php
                    
                if (isset($_POST['login'])){
                    $email=$_POST['Username'];
                    $password=$_POST['password'];
                    if (!empty($name) && !empty($name)){
                        $conn = mysqli_connect("localhost", "root", "", "supermarket");
                        $query = "SELECT * FROM user";
                        $result = mysqli_query($conn, $query)
                        or die("Error in query: ". mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($result)){
                            if ($row[Email] == $email && $row[$password] == $password )
                            {
                                window.open('http://localhost:8084/website/index.html');
                            }
                            
                        }
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>