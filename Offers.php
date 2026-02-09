<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Voxel Vault - Offers</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: #121212;
      color: #f2f2f2;
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
      font-weight: 600;
      color: #ff3c3c;
      text-decoration: none;
    }

    nav ul {
      display: flex;
      list-style: none;
      gap: 25px;
    }

    nav ul li a {
      color: #f2f2f2;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    nav ul li a:hover {
      color: #ff3c3c;
    }

    .offers-container {
      max-width: 1200px;
      margin: 50px auto;
      padding: 20px;
    }

    .offers-container h1 {
      text-align: center;
      font-size: 2.5rem;
      color: #ff3c3c;
      margin-bottom: 40px;
    }

    .offers-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }

    .offer-card {
      background: #1e1e1e;
      border-radius: 18px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
      transition: transform 0.3s ease;
    }

    .offer-card:hover {
      transform: translateY(-5px);
    }

    .offer-card img {
      width: 100%;
      height: 220px;
      object-fit: cover;
    }

    .offer-info {
      padding: 20px;
    }

    .offer-info h3 {
      font-size: 1.4rem;
      margin-bottom: 10px;
    }

    .offer-info .price {
      color: #ff3c3c;
      font-size: 1.2rem;
      font-weight: 600;
    }

    .old-price {
      color: #888;
      text-decoration: line-through;
      font-size: 0.95rem;
      margin-left: 8px;
    }

    .offer-info button {
      margin-top: 15px;
      padding: 10px 18px;
      background: #ff3c3c;
      border: none;
      border-radius: 8px;
      color: white;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .offer-info button:hover {
      background: #e03030;
    }

    footer {
      background: #1c1c1c;
      padding: 25px 0;
      text-align: center;
      color: #aaa;
      margin-top: 50px;
    }

    footer a {
      color: #ff3c3c;
      text-decoration: none;
      margin: 0 10px;
    }

    @media screen and (max-width: 600px) {
      .offer-info h3 {
        font-size: 1.2rem;
      }

      .offer-info button {
        width: 100%;
      }
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

  <div class="offers-container">
    <h1> Special 3D Model Offers</h1>

    <div class="offers-grid">
      <!-- Spider-Man -->
      <div class="offer-card">
        <img src="images/Categories image/Character.jpg" alt="Spider-Man">
        <div class="offer-info">
          <h3>Spider-Man</h3>
          <p><span class="price">Rs:300</span><span class="old-price">Rs:500</span></p>
          <button>Add to Cart</button>
        </div>
      </div>

      <!-- Iron Man -->
      <div class="offer-card">
        <img src="images/Trending Products/iron-man.jpg" alt="Iron Man">
        <div class="offer-info">
          <h3>Iron Man</h3>
          <p><span class="price">Rs:1500</span><span class="old-price">Rs:3000</span></p>
          <button>Add to Cart</button>
        </div>
      </div>

      <!-- Classic Car -->
      <div class="offer-card">
        <img src="images/Trending Products/Car.jpg" alt="Classic Car">
        <div class="offer-info">
          <h3>Classic Car</h3>
          <p><span class="price">Rs:250</span><span class="old-price">Rs:400</span></p>
          <button>Add to Cart</button>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; 2025 Voxel Vault. All rights reserved. 
      <a href="#">Privacy Policy</a> | 
      <a href="#">Terms & Conditions</a>
    </p>
  </footer>

</body>
</html>
