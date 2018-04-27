<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Testing</title>
        <meta name="description" content="An interactive getting started guide for Brackets.">
        <link rel="stylesheet" href="main.css">
    </head>
    <body>
        <?php
            $cars = array("Fiat", "Lambo", "Nissan");
            check();
            arrays();
            arraysize();
            stringComb();
            function stringComb()
                {
                    $name="Name";
                    $surname="Surname";
                    $combine = $name."".$surname;
                    echo $combine;
                    return $combine;
                }
            function arrays(){
                $cars = array("Volvo", "BMW", "Toyota");
                echo "My cars are " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
                if (sizeof($cars)<0){
                    echo "<br>";
                    echo "true";
                    return true;
                }
                else{
                    echo "<br>";
                    echo "false";
                    return false;
                }
            }
            function arraysize(){
                $cars = array("Volvo", "BMW", "Toyota");
                $size=sizeof($cars);
                echo "<br>";
                echo sizeof($cars);
                echo "<br>";
                return $size;
            }
            function check(){
                $num1=5;
                $num2=6;
                $total=$num1+$num2;
                echo $total;
                echo "<br>";
                return $total;
                
            }
        
        ?>
    </body>
</html>