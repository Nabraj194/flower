<?php 
session_start();
include("db.php"); // Make sure you have a DB connection file

$success = "";
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(empty($username) || empty($email) || empty($password)){
        $error = "All fields are required!";
    } else {
        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if(mysqli_num_rows($check) > 0){
            $error = "Email already registered!";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $insert = mysqli_query($conn, "INSERT INTO users(username,email,password) 
                                           VALUES('$username','$email','$hashed')");
            if($insert){
                $success = "Registration successful! You can now login.";
            } else {
                $error = "Error occurred!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArtNest - Register</title>

<style>
    *{
        margin:0;
        padding:0;
        font-family: 'Times New Roman', serif;
    }
    body{
        background:#f5f5f5;
    }

    
    /* REGISTER BOX */
    .register-box{
        width:400px;
        background:white;
        margin:60px auto;
        padding:30px;
        border-radius:20px;
        box-shadow:0 3px 10px rgba(0,0,0,0.2);
        text-align:center;
    }
    .register-box h2{
        font-size:32px;
        margin-bottom:20px;
    }
    .register-box input{
        width:90%;
        padding:13px;
        margin-top:15px;
        border-radius:10px;
        border:1px solid #aaa;
        font-size:18px;
    }
    .register-box button{
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
    .register-box button:hover{
        background:#0e87c2;
    }

</style>

</head>
<body>
<!-- REGISTER FORM -->
<div class="register-box">
    <h2>Create Account</h2>

    <?php if($error != "") echo "<p class='msg'>$error</p>"; ?>
    <?php if($success != "") echo "<p class='success'>$success</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Create Password" required>
        <button type="submit">Register</button>
    </form>

    <p style="margin-top:15px;">Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>
