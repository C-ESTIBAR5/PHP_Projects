<?php

// Start the session
session_start();

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    // Redirect the user to the congratulations page
    header('Location: login.php');
    exit;
    // Check if the user is already logged in

}

// Check if the user has submitted the login form
if (isset($_POST['submit'])) {
    // Get the username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate the username and password
    if ($username === 'admin' && $password === 'admin') {
        // The username and password are correct
        $_SESSION['username'] = $username;

        // Redirect the user to the congratulations page
        header('Location: congratulations.php');
        exit;
    } else {
        // The username and password are incorrect
        $error = 'Invalid username or password.';
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body style="background-color:gray">
<h1 align="center" style="font-size: 120px">LOGIN</h1>

<?php if (isset($error)) : ?>
    <p style="color: red;"><?php echo $error; ?></p>
<?php endif; ?>

<div>
<form align="center" action="login.php" method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" name="submit" value="Login">
</form>
</div>

</body>
</html>