<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Variable</title>
</head>
<body>
    <?php
    $x = 4;
    function assignx () {
        $x = 0;
        print "\$x inside function is $x.<br>";       
    }
    assignx();
    print "\$x outside of function is $x";
    ?>
</body>
</html>