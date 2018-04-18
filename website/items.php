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
                    <img src="sub.png" class="title">
                </div>
                <!--
                <div class ="section2">
                    <nav>
                      <a href="/html/">Sign-Up</a> |
                      <a href="/css/">Help</a> |
                      <a href="/js/">Contact Us</a> |
                      <a href="/jquery/">Advertise</a>
                      <a href="/jquery/">API</a>
                    </nav>
                    
                </div>
                -->
                <div class ="section3">
                    <button class ="cart">Cart</button>
                </div>
                <div class="clear"></div>
                
                <!--
                <div class ="section4">
                    <div class="navbar">
                      <div class="dropdown">
                        <button class="dropbtn">Classifieds 
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                      </div>
                        <div class="dropdown">
                        <button class="dropbtn">Cars and Parts 
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                      </div>
                        <div class="dropdown">
                        <button class="dropbtn">Propert 
                          <i class="fa fa-caret-down"></i>
                        </button>
                        <div class="dropdown-content">
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                      </div>
                        <div class="dropdown">
                        <button>Dropdown</button>
                        <div class="dropdown-content">
                          <a href="#">Link 1</a>
                          <a href="#">Link 2</a>
                          <a href="#">Link 3</a>
                        </div>
                      </div>
                        <a href="stores">Contact Us</a>
                        <form action="/action_page.php">
                            <div class="search">
                              <input class="textbox" type="text" placeholder="    Search" name="search">
                              <button class="button1" type="submit">Submit</button>
                            </div>
                    </form>
                    </div> 
                    
                  
                </div>
                -->
                <nav>
				    <ul>
				        <li><a class="active" href="index.html">Welcome Page</a></li>
				        <li><a href="items.php">Items for sale</a></li>
				        <li><a href="gallery.html">Gallery</a></li>
				        <li><a href="contactUs.html">Contact us</a></li>
                        
                        <form action="search.php" method="post">
                            <div class="search">
                              <input class="textbox" type="text" placeholder="    Search" name="search">
                              <button class="button1 btn btn-danger btn-lg" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
				</ul>
				</nav>
            </header>
            
            <div class="products">
                    <?php
                        $conn = mysqli_connect("localhost", "root", "", "supermarket");
                        $query = "SELECT * FROM products";
                        $result = mysqli_query($conn, $query)
                        or die("Error in query: ". mysqli_error($conn));
                        while ($row = mysqli_fetch_assoc($result)){
                            echo "<div class='productsDiv'><img src = '$row[productImage]' width='200px' height='200px'>";
                            echo "<p>$row[Name] $row[Price] euro </p><p>Quantity $row[Instock]</p>";
                            echo "<button><a href='http://localhost:8084/website/cart.php?id=$row[ProductId]'>Buy now</a></button></div>";
                        }
                        
                    ?>
            </div>
            
        </div>
        
    </body>
</html>