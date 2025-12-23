<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Product arrays
$products = [
    'handmade' => [
        ['name'=>'Handmade Flower Basket','price'=>'850','img'=>'new (1).jpg'],
        ['name'=>'Woven Storage Basket','price'=>'950','img'=>'new (2).jpg'],
        ['name'=>'Handmade Gift Box','price'=>'1200','img'=>'a.jpg'],
        ['name'=>'Decorative Handmade Tray','price'=>'700','img'=>'tray.jpg
        '],
    ],
    'art' => [
        ['name'=>'Oil Painting Landscape','price'=>'2500','img'=>'x.jpg'],
        ['name'=>'Abstract Wall Art','price'=>'1800','img'=>'acc.jpg'],
        ['name'=>'Canvas Painting Set','price'=>'3200','img'=>'canv.jpg'],
        ['name'=>'Mini Art Frames','price'=>'900','img'=>'images.jpg'],
    ],
    'ceramic' => [
        ['name'=>'Clay Coffee Cup','price'=>'550','img'=>'cl.webp'],
        ['name'=>'Ceramic Vase','price'=>'1500','img'=>'pot.webp'],
        ['name'=>'Handmade Ceramic Plate','price'=>'700','img'=>'ivory.webp'],
        ['name'=>'Decorative Ceramic Bowl','price'=>'1200','img'=>'b.jpg'],
    ],
    'decor' => [
        ['name'=>'Woolen Table Mat','price'=>'350','img'=>'a.jpg'],
        ['name'=>'Wall Hanging','price'=>'900','img'=>'a.jpg'],
        ['name'=>'Handmade Candle Holder','price'=>'600','img'=>'a.jpg'],
        ['name'=>'Colorful Handmade Pot','price'=>'1200','img'=>'a.jpg'],
    ]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>ArtNest - Handmade Products</title>
<style>
/* ========== YOUR CSS (UNCHANGED) ========== */
*{margin:0;padding:0;font-family:'Times New Roman', serif;}
body{background:#f5f5f5;}
.navbar{width:95%;background:#1ba8e9;padding:12px 0;display:flex;align-items:center;justify-content:space-between;border-radius:20px;box-shadow:0px 2px 8px rgba(0,0,0,0.2);margin:15px auto;}
.navbar .logo{display:flex;align-items:center;margin-left:30px;}
.navbar .logo img{width:60px;height:60px;border-radius:50%;}
.navbar ul{list-style:none;display:flex;gap:25px;margin:0;}
.navbar ul li a{text-decoration:none;font-size:22px;font-weight:bold;background:white;color:#000;padding:8px 25px;border-radius:25px;transition:0.3s;}
.navbar ul li a:hover{background:#f4a200;color:#fff;}
.navbar .btn-area{margin-right:30px;}
.navbar .btn-area a{text-decoration:none;font-size:20px;font-weight:bold;padding:8px 20px;border-radius:25px;background:#f4a200;color:white;margin-left:10px;transition:0.3s;}
.navbar .btn-area a:hover{background:#ffcd38;color:#000;}
.hero{width:100%;height:420px;background:url(home.avif);background-size:cover;background-position:center;display:flex;justify-content:center;align-items:center;flex-direction:column;color:white;text-shadow:0 2px 5px rgba(0,0,0,0.5);}
.hero h1{font-size:55px;}
.hero p{font-size:22px;margin-top:10px;}
.search-box{margin-top:25px;background:white;padding:10px 20px;border-radius:30px;width:50%;display:flex;align-items:center;}
.search-box input{width:100%;padding:12px;font-size:18px;border:none;outline:none;}
.categories{margin-top:50px;text-align:center;}
.categories h2{font-size:35px;margin-bottom:20px;}
.cat-container{display:flex;justify-content:center;gap:20px;flex-wrap:wrap;}
.cat-box{background:white;width:240px;padding:20px;border-radius:20px;box-shadow:0 2px 8px rgba(0,0,0,0.2);text-align:center;transition:0.3s;}
.cat-box:hover{transform:scale(1.05);}
.cat-box img{width:100%;height:160px;border-radius:20px;object-fit:cover;}
.cat-box h3{margin-top:10px;font-size:22px;}
.products{margin-top:60px;text-align:center;padding-bottom:50px;}
.products h2{font-size:35px;}
.product-grid{display:flex;justify-content:center;gap:25px;flex-wrap:wrap;margin-top:20px;}
.product-card{background:white;width:250px;padding:15px;border-radius:20px;box-shadow:0 3px 10px rgba(0,0,0,0.2);transition:0.3s;}
.product-card:hover{transform:scale(1.05);}
.product-card img{width:100%;height:200px;border-radius:15px;object-fit:cover;}
.product-card h4{font-size:20px;margin-top:10px;}
.product-card p{font-size:18px;color:green;margin-top:5px;}
.about-box{max-width:900px;margin:60px auto;background:white;padding:40px;border-radius:20px;box-shadow:0 3px 10px rgba(0,0,0,0.2);}
.about-box h1{text-align:center;margin-bottom:20px;}
.about-box p{font-size:18px;line-height:1.8;color:#444;margin-bottom:15px;}
.footer{width:100%;background:#111;color:white;text-align:center;padding:20px 0;margin-top:50px;}
.footer {background-color:darkcyan;color:#fff;padding:40px 0 20px;font-family:Arial, sans-serif;}
.footer-container{display:grid;grid-template-columns:repeat(auto-fit,minmax(200px,1fr));gap:30px;width:90%;margin:auto;}
.new,.facebook,.tiktok,.new-foot img{display:block;max-width:120px;margin-top:px;margin-left:20px;}
.footer-box h3{margin-bottom:8px;}
.footer-box ul{list-style:none;padding:0;}
.footer-box ul li{margin-bottom:8px;}
.footer-box ul li a{color:#ccc;text-decoration:none;}
.footer-box ul li a:hover{color:#f5a623;}
.footer-box p{color:#ccc;margin:5px 0;}
.footer-bottom{text-align:center;margin-top:30px;border-top:1px solid #050505ff;padding-top:15px;font-size:14px;color:#fcf8f8ff;}
/* ================= FOOTER ALIGNMENT FIX ================= */
/* No style changed – layout only */

.footer-box ul li{
    display:flex;
    align-items:center;
    gap:10px;
}

.footer-box ul li div{
    margin:0 !important;
}

.footer-box ul li img{
    width:20px;
    height:20px;
    object-fit:contain;
}

/* Secure payment logo alignment */
.new-foot img{
    margin-left:0 !important;
}

/* Mobile responsive alignment */
@media(max-width:600px){
    .footer-container{
        text-align:center;
    }
    .footer-box ul li{
        justify-content:center;
    }
}

</style>
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">
    <div class="logo">
        <img src="whh.jpeg" alt="logo">
        <h2 style="margin-left: 10px; color: white;">ArtNest</h2>
    </div>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?page=about">About</a></li>
        <li><a href="index.php">Category</a></li>
        <li><a href="index.php">Contact</a></li>
    </ul>
    <div class="btn-area">
        <?php if(isset($_SESSION['user_id'])){ ?>
            <a href="#"><?php echo $_SESSION['username']; ?></a>
            <a href="logout.php" style="background:red;">Logout</a>
        <?php } else { ?>
            <a href="register.php">Register</a>
            <a href="login.php" style="background:green;">Login</a>
        <?php } ?>
    </div>
</div>

<!-- ================= PAGE CONTENT ================= -->

<?php if($page == 'home' && $category==''){ ?>

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
        <a href="index.php?category=handmade"><div class="cat-box">
            <img src="land.jpg">
            <h3>Handmade Baskets</h3>
        </div></a>
        <a href="index.php?category=art"><div class="cat-box">
            <img src="titel.jpg">
            <h3>Art & Paintings</h3>
        </div></a>
        <a href="index.php?category=ceramic"><div class="cat-box">
            <img src="earth.webp">
            <h3>Ceramic & Cups</h3>
        </div></a>
        <a href="index.php?category=decor"><div class="cat-box">
            <img src="land.jpg">
            <h3>Decor Items</h3>
        </div></a>
    </div>
</section>

<!-- FEATURED PRODUCTS -->
<section class="products">
    <h2>Featured Products</h2>
    <div class="product-grid">
        <?php foreach($products['handmade'] as $p){ ?>
        <div class="product-card">
            <img src="<?php echo $p['img']; ?>">
            <h4><?php echo $p['name']; ?></h4>
            <p>Rs. <?php echo $p['price']; ?></p>
        </div>
        <?php } ?>
    </div>
</section>

<?php } elseif($category!=''){ ?>

<!-- CATEGORY PRODUCT LIST -->
<section class="products">
    <h2>
        <?php 
            if($category=='handmade') echo "Handmade Baskets";
            elseif($category=='art') echo "Art & Paintings";
            elseif($category=='ceramic') echo "Ceramic & Cups";
            elseif($category=='decor') echo "Decor Items";
        ?>
    </h2>
    <div class="product-grid">
        <?php 
            if(isset($products[$category])){
                foreach($products[$category] as $p){
                    echo '<div class="product-card">';
                    echo '<img src="'.$p['img'].'">';
                    echo '<h4>'.$p['name'].'</h4>';
                    echo '<p>Rs. '.$p['price'].'</p>';
                    echo '</div>';
                }
            } else {
                echo '<p>No products found in this category.</p>';
            }
        ?>
    </div>
</section>

<?php } elseif($page=='about'){ ?>

<!-- ABOUT SECTION -->
<div class="about-box">
    <h1>About ArtNest</h1>
    <p>
        ArtNest is a handmade product e-commerce website created to promote creativity,
        culture, and local craftsmanship.
    </p>
    <p>
        This platform is developed using PHP, HTML, CSS, and JavaScript as a practical
        project with login system, product display, and category management.
    </p>
    <p>
        Our goal is to connect local artists with customers through a secure
        and user-friendly online marketplace.
    </p>
</div>

<?php } ?>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-container">
        <div class="footer-box">
            <h3>SOCIAL MEDIA</h3>
            <ul>
                <li>
    <img src="fb.jpg" width="20px" class="social-icon">
    <a href="#">Facebook</a>
</li>

<li>
    <img src="inst.webp" width="20px" class="social-icon">
    <a href="#">Instagram</a>
</li>

<li>
    <img src="R.jpg" width="20px" class="social-icon">
    <a href="#">Tiktok</a>
</li>

        </div>
        <div class="footer-box">
            <h3>SECURE PAYMENT</h3>
            <div class="new-foot"><img src="es.png" alt=""></div>
        </div>
        <div class="footer-box">
            <h3>CONTACT US</h3>
            <p>artnest@gmail.com</p>
            <p>Nepalgunj, Banke</p>
            <p>Whatsapp/Viber:</p>
            <p><strong>9812345670</strong></p>
        </div>
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
