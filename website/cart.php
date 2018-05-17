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
                
                
                        
                        if(isset($_POST['submit']))
                        {
                           echo " <form method ='post' action='update.php'>";
                            echo "<label for='name'>Email</label>";
					
                            echo "<input type='text' name='Email' id='Email' />";

                            echo "<label for='name'>Password</label>";

                            echo "<input type='text' name='Password' id='Password' />";
                            echo "<button class='button1 btn btn-danger btn-lg' type='submit' name='send'>Send</button>";
                            echo " </form>";
                         
                        }
                        else{
                            if(isset($_GET['id']))
                            {
                                $chosen=$_GET['id'];
                                $query = "INSERT INTO cart (UserId, ProductId, Quantity)
                                        values ('$_SESSION[userId]','$chosen',1)";
                                $result = mysqli_query($conn, $query)
                                or die("Error in query: ". mysqli_error($conn));

                            $query1 = "SELECT *
                                            FROM cart
                                            INNER JOIN products
                                            ON cart.ProductId = products.ProductId
                                            WHERE cart.UserId=$userId";
                                    $result1 = mysqli_query($conn, $query1)
                                    or die("Error in query: ". mysqli_error($conn));
                                    while ($row = mysqli_fetch_assoc($result1)){
                                        echo "<div class='productsDiv'><img src = '$row[productImage]' width='200px' height='200px'>";
                                        echo "<p>$row[Name] $row[Price] euro </p><p>Quantity $row[Instock]</p>";
                                        echo "<button><a href='http://localhost:8084/website/delete.php?id=$row[CartId]'>Remove Item from list</a></button></div>";
                                    }
                            }
                            else{
                                $query1 = "SELECT *
                                            FROM cart
                                            INNER JOIN products
                                            ON cart.ProductId = products.ProductId
                                            WHERE cart.UserId=$userId";
                                    $result1 = mysqli_query($conn, $query1)
                                    or die("Error in query: ". mysqli_error($conn));
                                    while ($row = mysqli_fetch_assoc($result1)){
                                        echo "<div class='productsDiv'><img src = '$row[productImage]' width='200px' height='200px'>";
                                        echo "<p>$row[Name] $row[Price] euro </p><p>Quantity $row[Instock]</p>";
                                        echo "<button><a href='http://localhost:8084/website/delete.php?id=$row[CartId]'>Remove Item from list</a></button></div>";
                                    }
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
        <form action="cart.php" method="post">
            <button class="button1 btn btn-danger btn-lg" type="submit" name="submit">Buy All</button>
        </form>
    </body>
</html>