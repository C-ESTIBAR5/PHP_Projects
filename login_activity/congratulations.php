<?php

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Congratulations!</title>
</head>
<body style="background-color:gray">

<h1 align="center" style="font-size: 120px">Congratulations!</h1>

<p align="center" style="font-size: 120px">You have successfully logged in!</p>

</body>
</html>