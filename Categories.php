<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Voxel Vault - Categories</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to right, #1c1c1e, #2c2c2e);
      color: #f1f1f1;
    }

    header {
      background-color: #111;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 8px rgba(255, 99, 71, 0.2);
    }


    header .logo a {
      font-size: 28px;
      font-weight: 700;
      color: #ff4d3b;
      text-decoration: none;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
    }
    nav ul li
     {
      margin-left: 25px;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: 0.3s ease;
    }

    nav ul li a:hover {
      color: #ff4d3b;
    }

    h1 {
      text-align: center;
      margin: 40px 0 20px;
      font-size: 36px;
      color: #ff4d3b;
    }

    .product-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 30px;
      padding: 0 40px 60px;
      max-width: 1400px;
      margin: 0 auto;
    }

    .category-item {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(6px);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      overflow: hidden;
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .category-item:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
    }

    .category-item img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .category-item h3 {
      font-size: 20px;
      padding: 15px 0;
      color: #fff;
    }

    a {
      text-decoration: none;
      color: inherit;
    }

    footer {
      background-color: #121212;
      color: white;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }

    footer a {
      color: #ff4d3b;
      text-decoration: none;
      margin: 0 10px;
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
        <li><a href="Categories.php" style="color:#ff4d3b;">Categories</a></li>
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
    <h1>Explore Categories</h1>
    <section class="product-list">
      <a href="categories item/aircraft detail.html">
        <div class="category-item">
          <img src="images/categories aircraft/Aircraft.jpg" alt="Aircraft">
          <h3>Aircraft</h3>
        </div>
      </a>
      <a href="categories item/character detail.html">
        <div class="category-item">
          <img src="images/Categories image/Character.jpg" alt="Character">
          <h3>Character</h3>
        </div>
      </a>
      <a href="categories item/vehicle detail.html">
        <div class="category-item">
          <img src="images/Categories image/Car.jpg" alt="Vehicle">
          <h3>Vehicle</h3>
        </div>
      </a>
      <a href="categories item/food detail.html">
        <div class="category-item">
          <img src="images/Categories image/Food.jpg" alt="Food">
          <h3>Food</h3>
        </div>
      </a>
      <a href="categories item/furniture detail.html">
        <div class="category-item">
          <img src="images/Categories image/furniture.jpg" alt="Furniture">
          <h3>Furniture</h3>
        </div>
      </a>
      <a href="categories item/plant detail.html">
        <div class="category-item">
          <img src="images/Categories image/Plant.jpg" alt="Plant">
          <h3>Plant</h3>
        </div>
      </a>
      <a href="categories item/animal detail.html">
        <div class="category-item">
        <img src="images/Black Cat/black-cat-3d-model-e194670d51.jpg" alt="Animals">
          <h3>Animals</h3>
        </div>
      </a>
      <a href="categories item/weapons detail.html">
        <div class="category-item">
        <img src="images/ak47/ak-47-assault-rifle-3d-model-low-poly-obj-fbx-blend (1).jpg"  alt="Weapons">
          <h3>Weapons</h3>
        </div>
      </a>
      <a href="categories item/furniture detail.html">
        <div class="category-item">
        <img src="images/Old_boat_Mesh/wooden-boat-3d-model-low-poly-obj-fbx-stl (1).jpg"  alt="Watercraft">
          <h3>Watercraft</h3>
        </div>
      </a>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Voxel Vault. All rights reserved.
      <a href="#">Privacy Policy</a> |
      <a href="#">Terms & Conditions</a>
    </p>
  </footer>

</body>
</html>
