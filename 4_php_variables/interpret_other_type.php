<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interpretating</title>
</head>
<body>
    <?php
    $true_num = 3 + 0.14159;
    $true_str = "Tried and true";
    $true_array[49] = "An array element";
    $false_array = array();
    $false_null = NULL;
    $false_num = 999 - 999;
    $false_str = " ";

    echo "$true_num<br>";
    echo "$true_str<br>";
    echo "$true_array<br>";
    echo "$false_array<br>";
    echo "$false_null<br>";
    echo "$false_num<br>";
    echo "$false_str<br>";

    #null
    $_my_var = null;
    ?>
</body>
</html>