<?php
session_start();

// -------------------------
// Database Connection
// -------------------------
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "your_database_name";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if(!$conn){
    die("Database connection failed");
}

// -------------------------
// Logout
// -------------------------
if(isset($_GET['logout'])){
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

// -------------------------
// Login Process
// -------------------------
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){
        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['name'];

        header("Location: login.php");
        exit;
    } else {
        $error = "Invalid Email or Password!";
    }
}

// -------------------------
// If Logged In → Show Dashboard
// -------------------------
if(isset($_SESSION['user_id'])){
    echo "<h2>Welcome, ".$_SESSION['username']." 👋</h2>";
    echo "<a href='login.php?logout=true'>Logout</a>";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php
if(isset($error)){
    echo "<p style='color:red;'>$error</p>";
}
?>

<form method="POST">
    Email:<br>
    <input type="email" name="email" required><br><br>

    Password:<br>
    <input type="password" name="password" required><br><br>

    <button type="submit" name="login">Login</button>
</form>

</body>
</html>
