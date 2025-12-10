<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php
if(isset($_SESSION['error'])){
    echo "<p style='color:red'>".$_SESSION['error']."</p>";
    unset($_SESSION['error']);
}
?>

<form action="login_process.php" method="POST">
    Email: <br>
    <input type="email" name="email" required><br><br>

    Password: <br> 
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

</body>
</html>
