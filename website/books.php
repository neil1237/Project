
<?php
    
    #1 Connect to db
    $conn = mysqli_connect('localhost','root','','supermarket','3306')
        or die('Cannot connect');
    #2 Constructing the query
    $query = 'select * from products';
    #3 Preparing the query/connection
    $result=mysqli_query($conn,$query);
    #fetch into while loop
    while ($row=mysqli_fetch_assoc($result))
    {
        <?php
        echo "<div class='mydiv'><img src = '$row[productImage]' width='50px' height='50px'>";
        echo "<p>$row[ProductId]</p><p>$row[Name]</p><p> $row[Price]</p>    <p>$row[Instock]</p></div>";
        ?>
        <?php
        /*
        echo"$row[ProductId] $row[Name] $row[Price] $row[Instock]  <br/>";*/
    }
?>