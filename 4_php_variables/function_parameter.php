<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Function Parameter</title>
</head>
<body>
    <?php
    
    // multiply a value by 10 and return it to the caller
    function multiply ($value) {
     $value = $value * 10;
     return $value;
    }
    $retval = multiply (10);
    Print "Return value is $retval\n";
    ?>
</body>
</html>