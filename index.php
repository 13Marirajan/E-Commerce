<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Voxel Vault - Home</title>
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
  color: white;
  text-decoration: none;
  font-weight: 500;
  transition: color 0.3s ease;
  padding-bottom: 4px;
  border-bottom: 2px solid transparent;
}

nav ul li a:hover {
  color: #ff3c3c;
}

nav ul li a.active {
  color: #ff3c3c;
  border-bottom: 2px solid #ff3c3c;
}

    .banner {
      height: 400px;
      background: url('images/background_image.jpg') center center/cover no-repeat;
      position: relative;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      color: #fff;
    }

    .banner::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.6);
      z-index: 0;
    }

    .banner h1,
    .banner p {
      z-index: 1;
    }

    .search-bar {
      display: flex;
      background: white;
      padding: 10px;
      border-radius: 30px;
      width: 300px;
      margin-top: 20px;
      z-index: 1;
    }

    .search-bar input {
      border: none;
      outline: none;
      flex: 1;
      padding: 10px;
      border-radius: 20px;
    }

    .search-bar button {
      background-color: #ff4d3b;
      color: white;
      border: none;
      padding: 10px 15px;
      border-radius: 20px;
      cursor: pointer;
    }

    .section-title {
      text-align: center;
      font-size: 2.2rem;
      margin-top: 50px;
      margin-bottom: 20px;
      color: #ffffff;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 30px;
      padding: 40px;
      max-width: 1200px;
      margin: auto;
    }

    .card {
      background-color: rgb(85, 85, 85);
      border-radius: 15px;
      overflow: hidden;
      text-align: center;
      transition: transform 0.3s;
      box-shadow: 0 10px 20px rgba(255, 99, 71, 0.1);
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card img {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    .card h3 {
      margin: 15px 0 10px;
      font-size: 1.3rem;
      color: #fff;
    }

    .card p.price {
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
        <?php
        if (isset($_SESSION['user_id'])) {
          echo '<li><a href="logout.php">Logout</a></li>';
        } else {
          echo '<li><a href="login.php">Login</a></li>';
        }
        ?>
      </ul>
    </nav>
  </header>

  <section class="banner">
    <h1>Find Your Perfect Product</h1>
    <p>Explore a variety of categories and amazing offers</p>
    <form action="search.php" method="GET" class="search-bar">
      <input type="text" name="query" placeholder="Search for products..." required>
      <button type="submit">Search</button>
    </form>
  </section>

  <section>
    <h2 class="section-title">Browse by Categories</h2>
    <div class="grid-container">
      <a href="categories item/aircraft detail.html">
        <div class="card">
          <img src="images/categories aircraft/Aircraft.jpg" alt="Aircraft">
          <h3>Aircraft</h3>
        </div>
      </a>
      <a href="categories item/character detail.html">
        <div class="card">
          <img src="images/Categories image/Character.jpg" alt="Character">
          <h3>Character</h3>
        </div>
      </a>
      <a href="categories item/vehicle detail.html">
        <div class="card">
          <img src="images/Categories image/Car.jpg" alt="Car">
          <h3>Vehicle</h3>
        </div>
      </a>
      <a href="categories item/food detail.html">
        <div class="card">
          <img src="images/Categories image/Food.jpg" alt="Food">
          <h3>Food</h3>
        </div>
      </a>
      <a href="categories item/furniture detail.html">
        <div class="card">
          <img src="images/Categories image/furniture.jpg" alt="Furniture">
          <h3>Furniture</h3>
        </div>
      </a>
      <a href="categories item/plant detail.html">
        <div class="card">
          <img src="images/Categories image/Plant.jpg" alt="Plant">
          <h3>Plant</h3>
        </div>
      </a>
      <a href="categories item/animal detail.html">
        <div class="card">
          <img src="images/Black Cat/black-cat-3d-model-e194670d51.jpg" alt="Animals">
          <h3>Animals</h3>
        </div>
      </a>
      <a href="categories item/weapons detail.html">
        <div class="card">
          <img src="images/ak47/ak-47-assault-rifle-3d-model-low-poly-obj-fbx-blend (1).jpg" alt="Weapons">
          <h3>Weapons</h3>
        </div>
      </a>
      <a href="categories item/watercarft detail.html">
        <div class="card">
          <img src="images/Old_boat_Mesh/wooden-boat-3d-model-low-poly-obj-fbx-stl (1).jpg" alt="Watercraft">
          <h3>Watercraft</h3>
        </div>
      </a>
    </div>
  </section>

 

  <footer>
    <p>&copy; 2025 Voxel Vault. All rights reserved.
      <a href="#">Privacy Policy</a> | <a href="#">Terms & Conditions</a>
    </p>
  </footer>

</body>

</html>
