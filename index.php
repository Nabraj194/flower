<?php 
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ArtNest - Handmade Products</title>

    <style>
        *{
            margin:0;
            padding:0;
            font-family: 'Times New Roman', serif;
        }

        body{
            background:#f5f5f5;
        }

        /* ---------------- NAVBAR ------------------ */
        .navbar {
            width: 95%;
            background: #1ba8e9;
            padding: 12px 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-radius: 20px;
            box-shadow: 0px 2px 8px rgba(0,0,0,0.2);
            font-family: "Times New Roman", serif;
            margin: 15px auto;
        }

        .navbar .logo {
            display: flex;
            align-items: center;
            margin-left: 30px;
        }

        .navbar .logo img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
        }

        .navbar ul li a {
            text-decoration: none;
            font-size: 22px;
            color: white;
            font-weight: bold;
            background: white;
            color: #000;
            padding: 8px 25px;
            border-radius: 25px;
            transition: 0.3s;
        }

        .navbar ul li a:hover {
            background: #f4a200;
            color: #fff;
        }

        .navbar .btn-area {
            margin-right: 30px;
        }

        .navbar .btn-area a {
            text-decoration: none;
            font-size: 20px;
            font-weight: bold;
            padding: 8px 20px;
            border-radius: 25px;
            background: #f4a200;
            color: white;
            margin-left: 10px;
            transition: 0.3s;
        }

        .navbar .btn-area a:hover {
            background: #ffcd38;
            color: #000;
        }


        /* ---------------- HERO SECTION ------------------ */
        .hero{
            width:100%;
            height:420px;
            background:url(home.avif);
            background-size:cover;
            background-position:center;
            display:flex;
            justify-content:center;
            align-items:center;
            flex-direction:column;
            color:white;
            text-shadow:0 2px 5px rgba(0,0,0,0.5);
        }

        .hero h1{
            font-size:55px;
        }

        .hero p{
            font-size:22px;
            margin-top:10px;
        }

        .search-box{
            margin-top:25px;
            background:white;
            padding:10px 20px;
            border-radius:30px;
            width:50%;
            display:flex;
            align-items:center;
        }

        .search-box input{
            width:100%;
            padding:12px;
            font-size:18px;
            border:none;
            outline:none;
        }


        /* ---------------- CATEGORY ------------------ */
        .categories{
            margin-top:50px;
            text-align:center;
        }

        .categories h2{
            font-size:35px;
            margin-bottom:20px;
        }

        .cat-container{
            display:flex;
            justify-content:center;
            gap:20px;
            flex-wrap:wrap;
        }

        .cat-box{
            background:white;
            width:240px;
            padding:20px;
            border-radius:20px;
            box-shadow:0 2px 8px rgba(0,0,0,0.2);
            text-align:center;
            transition:0.3s;
        }

        .cat-box:hover{
            transform:scale(1.05);
        }

        .cat-box img{
            width:100%;
            height:160px;
            border-radius:20px;
            object-fit:cover;
        }

        .cat-box h3{
            margin-top:10px;
            font-size:22px;
        }


        /* ---------------- PRODUCTS ------------------ */
        .products{
            margin-top:60px;
            text-align:center;
            padding-bottom:50px;
        }

        .products h2{
            font-size:35px;
        }

        .product-grid{
            display:flex;
            justify-content:center;
            gap:25px;
            flex-wrap:wrap;
            margin-top:20px;
        }

        .product-card{
            background:white;
            width:250px;
            padding:15px;
            border-radius:20px;
            box-shadow:0 3px 10px rgba(0,0,0,0.2);
            transition:0.3s;
        }

        .product-card:hover{
            transform:scale(1.05);
        }

        .product-card img{
            width:100%;
            height:200px;
            border-radius:15px;
            object-fit:cover;
        }

        .product-card h4{
            font-size:20px;
            margin-top:10px;
        }

        .product-card p{
            font-size:18px;
            color:green;
            margin-top:5px;
        }


        /* ---------------- FOOTER ------------------ */
        .footer{
            width:100%;
            background:#111;
            color:white;
            text-align:center;
            padding:20px 0;
            margin-top:50px;
        }
        .footer {
  background-color: #111;
  color: #fff;
  padding: 40px 0 20px;
  font-family: Arial, sans-serif;
}

.footer-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  gap: 30px;
  width: 90%;
  margin: auto;
}

/* .footer-box h3 {
  margin-bottom: 15px;
  font-size: 16px;
  color: #f5a623;
}
.footer-box new-foot{
   
    font-size: 16px;
} */
.footer-box h3 {
  margin-bottom: 8px;   /* space below heading */
}

.new-foot {
  margin-top: 5px;      /* keeps logo just below text */
}

.new-foot img {
  display: block;       /* forces image to stay below */
  max-width: 120px;     /* adjust size if needed */
}

.footer-box ul {
  list-style: none;
  padding: 0;
}

.footer-box ul li {
  margin-bottom: 8px;
}

.footer-box ul li a {
  color: #ccc;
  text-decoration: none;
}

.footer-box ul li a:hover {
  color: #f5a623;
}

.footer-box p {
  color: #ccc;
  margin: 5px 0;
}

.footer-bottom {
  text-align: center;
  margin-top: 30px;
  border-top: 1px solid #333;
  padding-top: 15px;
  font-size: 14px;
  color: #aaa;
}


    </style>
</head>
<body>


    <!-- ---------------- NAVBAR START ---------------- -->
    <div class="navbar">

        <div class="logo">
            <img src="whh.jpeg" alt="logo">
            <h2 style="margin-left: 10px; color: white;">ArtNest</h2>
        </div>

        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="category.php">Category</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>

        <div class="btn-area">
            <?php 
            if(isset($_SESSION['user_id'])){ 
            ?>
                <a href="#"><?php echo $_SESSION['username']; ?></a>
                <a href="logout.php" style="background:red;">Logout</a>
            <?php 
            } else { 
            ?>
                <a href="register.php">Register</a>
                <a href="login.php" style="background:green;">Login</a>
            <?php } ?>
        </div>

    </div>
    <!-- ---------------- NAVBAR END ---------------- -->



    <!-- HERO -->
    <div class="hero">
        <h1>Welcome to ArtNest</h1>
        <p>Handmade · Creative · Unique</p>

        <div class="search-box">
            <input type="text" placeholder="Search your requirement...">
        </div>
    </div>



    <!-- CATEGORY SECTION -->
    <section class="categories">
        <h2>Shop by Category</h2>

        <div class="cat-container">
            <div class="cat-box">
                <img src="land.jpg">
                <h3>Handmade Baskets</h3>
            </div>

            <div class="cat-box">
                <img src="land.jpg">
                <h3>Art & Paintings</h3>
            </div>

            <div class="cat-box">
                <img src="land.jpg">
                <h3>Ceramic & Cups</h3>
            </div>

            <div class="cat-box">
                <img src="land.jpg">
                <h3>Decor Items</h3>
            </div>
        </div>
    </section>



    <!-- FEATURED PRODUCTS -->
    <section class="products">
        <h2>Featured Products</h2>

        <div class="product-grid">

            <div class="product-card">
                <img src="a.jpg">
                <h4>Handmade Flower Basket</h4>
                <p>Rs. 850</p>
            </div>

            <div class="product-card">
                <img src="a.jpg">
                <h4>Clay Coffee Cup</h4>
                <p>Rs. 550</p>
            </div>

            <div class="product-card">
                <img src="a.jpg">
                <h4>Woolen Table Mat</h4>
                <p>Rs. 350</p>
            </div>

            <div class="product-card">
                <img src="a.jpg">
                <h4>Colorful Handmade Pot</h4>
                <p>Rs. 1200</p>
            </div>

        </div>
    </section>


    <footer class="footer">
  <div class="footer-container">

    <!-- Social Media -->
    <div class="footer-box">
      <h3>SOCIAL MEDIA</h3>
      <ul>
        <li><a href="#">Facebook</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">Tiktok</a></li>
      </ul>
    </div>

    <!-- Secure Payment -->
    <div class="footer-box">
      <h3>SECURE PAYMENT</h3>
      <div class="new-foot">
        <img src="es.png" alt="">
    </div>
    </div>

    <!-- Contact Us -->
    <div class="footer-box">
      <h3>CONTACT US</h3>
      <p>Whatsapp/Viber:</p>
      <p><strong>9812345670</strong></p>
    </div>

    <!-- Information -->
    <div class="footer-box">
      <h3>INFORMATION</h3>
      <ul>
        <li><a href="#">FAQ</a></li>
        <li><a href="#">Terms and Conditions</a></li>
        <li><a href="#">Refund and Return Policy</a></li>
      </ul>
    </div>

  </div>

  <div class="footer-bottom">
    <p>© 2025 Artnest. All Rights Reserved.</p>
  </div>
</footer>


</body>
</html>
