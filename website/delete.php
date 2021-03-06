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
                <div class ="section3">
                    <button class ="cart" name ="cart">Cart</button>
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
            <form method ="post" action="delete.php"></form> 
            <div class="products">
                    <?php
                        session_start();
						include 'connect.php';
                        $chosen=$_GET['id'];
                        $query = "DELETE from cart where CartId ='$chosen'";
                        $result = mysqli_query($conn, $query)
                        or die("Error in query: ". mysqli_error($conn));   
                        
                                echo '<script language="javascript">';
                                echo 'alert("Removed item number $chosen ")';
                                echo '</script>';
                        header("Location: items.php");
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