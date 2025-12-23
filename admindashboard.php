<?php
session_start();

// Check if admin is logged in
if(!isset($_SESSION['username'])){
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #333;
            padding: 10px 20px;
            color: #fff;
        }
        .navbar h1 {
            display: inline-block;
            margin: 0;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            float: right;
            margin-top: 5px;
            padding: 5px 10px;
            border: 1px solid #fff;
            border-radius: 4px;
        }
        .container {
            padding: 20px;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        .card h2 {
            margin: 10px 0;
            font-size: 2em;
        }
        .card p {
            color: #555;
        }
    </style>
</head>
<body>

<div class="navbar">
    <h1>Admin Dashboard</h1>
    <a href="logout.php">Logout</a>
</div>

<div class="container">
    <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

    <div class="cards">
        <div class="card">
            <i class="fas fa-users fa-3x"></i>
            <h2>120</h2>
            <p>Total Users</p>
        </div>
        <div class="card">
            <i class="fas fa-box fa-3x"></i>
            <h2>75</h2>
            <p>Products</p>
        </div>
        <div class="card">
            <i class="fas fa-shopping-cart fa-3x"></i>
            <h2>50</h2>
            <p>Orders</p>
        </div>
        <div class="card">
            <i class="fas fa-chart-line fa-3x"></i>
            <h2>$12,000</h2>
            <p>Revenue</p>
        </div>
    </div>
</div>

</body>
</html>
