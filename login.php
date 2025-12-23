<?php
session_start();
include("db.php"); // Make sure you have a DB connection file

$error = "";

// If form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($email) || empty($password)){
        $error = "All fields are required!";
    } else {
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if(mysqli_num_rows($query) > 0){
            $user = mysqli_fetch_assoc($query);
            // Verify password
            if(password_verify($password, $user['password'])){
                // Set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                // Redirect to landing page after login
                header("Location: admindashboard.php");
                exit();
            } else {
                $error = "Incorrect password!";
            }
        } else {
            $error = "Email not registered!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArtNest - Login</title>

<style>
    *{
        margin:0;
        padding:0;
        font-family: 'Times New Roman', serif;
    }
    body{
        background:#f5f5f5;
    }

    /* LOGIN BOX */
    .login-box{
        width:400px;
        background:white;
        margin:60px auto;
        padding:30px;
        border-radius:20px;
        box-shadow:0 3px 10px rgba(0,0,0,0.2);
        text-align:center;
    }
    .login-box h2{
        font-size:32px;
        margin-bottom:20px;
    }
    .login-box input{
        width:90%;
        padding:13px;
        margin-top:15px;
        border-radius:10px;
        border:1px solid #aaa;
        font-size:18px;
    }
    .login-box button{
        margin-top:20px;
        width:95%;
        padding:12px;
        background:#1ba8e9;
        color:white;
        font-size:22px;
        border:none;
        border-radius:15px;
        cursor:pointer;
        font-weight:bold;
        transition:0.3s;
    }
    .login-box button:hover{
        background:#0e87c2;
    }
    .msg{
        color:red;
        margin-bottom:10px;
    }
</style>

</head>
<body>

<div class="login-box">
    <h2>Login</h2>

    <?php if($error != "") echo "<p class='msg'>$error</p>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
    </form>

    <p style="margin-top:15px;">Don't have an account? <a href="register.php">Register</a></p>
</div>

</body>
</html>
