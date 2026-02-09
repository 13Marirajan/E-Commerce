<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Voxel Vault - Shop</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: rgba(0, 0, 0, 0.7);
      color: #f0f0f0;
    }

    header {
      background-color: #111;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 8px rgba(255, 99, 71, 0.2);
    }

    .logo a {
      font-size: 28px;
      font-weight: 600;
      color: #ff4d3b;
      text-decoration: none;
    }

    nav ul {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      margin-left: 25px;
    }

    nav ul li a {
      color: #f0f0f0;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s ease;
    }

    h1 {
      text-align: center;
      font-size: 2.5rem;
      margin-top: 40px;
      margin-bottom: 20px;
      color: #ffffff;
    }

    .product-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 30px;
      padding: 40px;
      max-width: 1200px;
      margin: auto;
    }

    .product-item {
      background-color:rgb(85, 85, 85);
      border-radius: 15px;
      box-shadow: 0 10px 20px rgba(255, 99, 71, 0.1);
      overflow: hidden;
      text-align: center;
      transition: transform 0.3s, box-shadow 0.3s;
    }

    .product-item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

      .product-item .price {
      font-size: 1.2rem;
      color: #ff6347;
      margin-bottom: 10px;
    }

    footer {
      background-color: #111;
      color: #ccc;
      text-align: center;
      padding: 20px 0;
      margin-top: 40px;
    }

    footer a {
      color: #ff6347;
      text-decoration: none;
      margin: 0 10px;
    }

    footer a:hover {
      text-decoration: underline;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

  </style>
</head>

<body>

  <header>
    <div class="logo"><a href="index.php">Voxel Vault</a></div>
    <nav>
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="Shop.php">Shop</a></li>
        <li><a href="Categories.php">Categories</a></li>
        <li><a href="Offers.php">Offers</a></li>
        <li><a href="Contact.php">Contact</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="upload.php">upload</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <main>
    <h1>Our Products</h1>
    <section class="product-list">
    <a href="../product detail/Detail flight.html">
        <div class="product-item">
        <img src="../images/categories aircraft/Aircraft.jpg" alt="Flight">
          <h3> Flight</h3>
          <p class="price">Rs: 199</p>
        </div>
      </a>
      <a href="product detail/Detail jet.html">
        <div class="product-item">
          <img src="images/categories aircraft/jet.jpg" alt="Jet">
          <h3>Jet</h3>
          <p class="price">Rs: 250</p>
        </div>
      </a>
      <a href="../product detail/Detail starfighter.html">
        <div class="product-item">
        <img src="../images/starfighter/f104g-starfighter-fighter-jet-3d-model-86300b5ed4.jpg" alt="Jet">
        <h3>starfighter</h3>
        <span class="price">Rs:299</span>
        </div>
      </a>
      <a href="../product detail/Detail CONDOR.html">
        <div class="product-item">
        <img src="../images/CONDOR/battlefield-2042-condor-flight-3d-model-obj-fbx-blend (1).jpg" alt="Military Aircraft">
        <h3>Toy airplane</h3>
        <span class="price">Rs:29.99</span>
        </div>
      </a>
      <a href="../product detail/Detail - selter.html">
        <div class="product-item">
        <img src="../images/categories aircraft/selter.jpg" alt="Selter">
        <h3>Selter</h3>
          <span class="price">Rs:29.99</span>
        </div>
      </a>
      <a href="../product detail/detail cat.html">
        <div class="product-item">
        <img src="../images/Black Cat/black-cat-3d-model-f65f56095c.jpg" alt="Flight">
        <h3>black cat</h3>
        <span class="price">Rs:199</span>
        </div>
      </a>
      <a href="../product detail/detail shark.html">
        <div class="product-item">
        <img src="../images/Shark/great-white-shark-3d-model-d6e76e6881.jpg" alt="Toy Flight">
        <h3>Shark</h3>
          <span class="price">Rs:29.99</span>
        </div>
      </a>
      <a href="../product detail/detail rhino.html">
        <div class="product-item">
        <img src="../images/rhino/white-rhinoceros-highpoly-sculpture-3d-model-ff5263b4d5.jpg" alt="Helicopter">
        <h3>Rhino</h3>
        <span class="price">Rs:29.99</span>
        </div>
      </a>
    </section>
  </main>

  <footer>
    <p>&copy; Voxel Vault. All rights reserved.
      <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a>
    </p>
  </footer>

</body>

</html>
