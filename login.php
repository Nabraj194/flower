<?php
session_start();
include("db.php"); // Database connection

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
            if(password_verify($password, $user['password'])){
                // Set session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role']; // 'admin' or 'user'

                // Redirect based on role
                if($user['role'] == 'admin'){
                    header("Location: admin_dashboard.php");
                } else {
                    header("Location: index.php");
                }
                exit();
            } else {
                $error = "Incorrect password!";
            }
        } else {
            $error = "Email not registered!";
        }
    }
}
session_start();
if(!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin'){
    header("Location: login.php");
    exit();
}

?>
