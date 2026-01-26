<?php
session_start();

/* ===== AUTH + ROLE CHECK ===== */
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

/* ===== SIMPLE PAGE ROUTING ===== */
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard | ArtNest</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body { background:#f4f6f9; }
        .sidebar {
            min-height:100vh;
            background:#343a40;
        }
        .sidebar a {
            color:#fff;
            padding:12px 20px;
            display:block;
            text-decoration:none;
        }
        .sidebar a:hover { background:#495057; }
        .card-icon { font-size:40px; opacity:0.7; }
    </style>
</head>

<body>
<div class="container-fluid">
<div class="row">

    <!-- SIDEBAR -->
    <div class="col-md-2 sidebar p-0">
        <h4 class="text-white text-center py-3 border-bottom">ArtNest Admin</h4>
        <a href="?page=dashboard"><i class="fas fa-home me-2"></i>Dashboard</a>
        <a href="?page=users"><i class="fas fa-users me-2"></i>Users</a>
        <a href="?page=products"><i class="fas fa-box me-2"></i>Products</a>
        <a href="logout.php" class="text-danger">
            <i class="fas fa-sign-out-alt me-2"></i>Logout
        </a>
    </div>

    <!-- CONTENT -->
    <div class="col-md-10">

        <!-- TOP BAR -->
        <nav class="navbar bg-white shadow-sm">
            <div class="container-fluid">
                <span class="navbar-brand">
                    Welcome, <strong><?php echo $_SESSION['username']; ?></strong>
                </span>
            </div>
        </nav>

        <div class="container mt-4">

        <?php if ($page == 'dashboard') { ?>
        <!-- DASHBOARD -->
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card bg-primary text-white shadow">
                    <div class="card-body d-flex justify-content-between">
                        <div><h5>Users</h5><h2>120</h2></div>
                        <i class="fas fa-users card-icon"></i>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card bg-success text-white shadow">
                    <div class="card-body d-flex justify-content-between">
                        <div><h5>Products</h5><h2>75</h2></div>
                        <i class="fas fa-box card-icon"></i>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php if ($page == 'users') { ?>
        <!-- USERS -->
        <h4 class="mb-3">Registered Users</h4>
        <table class="table table-bordered bg-white shadow">
            <tr><th>ID</th><th>Username</th><th>Role</th></tr>
            <tr><td>1</td><td>admin</td><td>Admin</td></tr>
            <tr><td>2</td><td>ram</td><td>User</td></tr>
        </table>
        <?php } ?>

        <?php if ($page == 'products') { ?>
        <!-- PRODUCTS -->
        <h4 class="mb-3">Products</h4>
        <table class="table table-bordered bg-white shadow">
            <tr><th>ID</th><th>Name</th><th>Price</th></tr>
            <tr><td>1</td><td>Handmade Basket</td><td>Rs. 850</td></tr>
            <tr><td>2</td><td>Art Painting</td><td>Rs. 1500</td></tr>
        </table>
        <?php } ?>

        </div>
    </div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
