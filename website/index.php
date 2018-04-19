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

                <nav>
				    <ul>
				        <li><a class="active" href="index.html">Welcome Page</a></li>
				        <li><a href="items.php">Items for sale</a></li>
				        <li><a href="gallery.html">Gallery</a></li>
				        <li><a href="contactUs.html">Contact us</a></li>
				</ul>
				</nav>
            </header>
            
            <div class="jumbotron jumbotron-fluid">
                <?php
                    session_start();
                    echo "<h1 class='display-4'>Welcome $_SESSION[name] to a one of a kind shopping experience</h1>";
                ?>
              <p class="lead">Here you can buy every item you ever decired .This has every top seller items world wide</p>
              <hr class="my-4">
              <p>Here we have the best provider making it the safest and the least place were risks occur</p>
              <p class="lead">
                <a class="btn btn-danger btn-lg" href="items.php" role="button">Learn more</a>
              </p>
            </div>
            
        </div>
        
    </body>
</html>