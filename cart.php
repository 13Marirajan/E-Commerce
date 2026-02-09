<?php
session_start();

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = floatval($_POST['product_price']);
    $product_image = $_POST['product_image'];

    // Check if product already exists in cart
    $exists = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['product_id'] == $product_id) {
            $item['quantity'] += 1;
            $exists = true;
            break;
        }
    }

    if (!$exists) {
        $_SESSION['cart'][] = [
            "product_id" => $product_id,
            "name" => $product_name,
            "price" => $product_price,
            "image" => $product_image,
            "quantity" => 1
        ];
    }
    
    echo json_encode(["status" => "success", "cart_count" => count($_SESSION['cart'])]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_id'])) {
    $remove_id = $_POST['remove_id'];
    $_SESSION['cart'] = array_filter($_SESSION['cart'], function ($item) use ($remove_id) {
        return $item['product_id'] != $remove_id;
    });
    echo json_encode(["status" => "success", "cart_count" => count($_SESSION['cart'])]);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
    echo json_encode(["status" => "cart_cleared"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart - Voxel Vault</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color:rgb(102, 97, 97);
            color: #fff;
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
            color: #ff3c41;
            text-decoration: none;
        }
        nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            gap: 0px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 10px 15px;
        }
        nav ul li a:hover 
        {
      color: #ff4d3b;
    }

        .modal-box {
            background-color: #1e1e1e;
            max-width: 700px;
            margin: 60px auto;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(255, 60, 65, 0.2);
            text-align: center;
        }
        .modal-box h1 {
            color: #ff3c41;
            margin-bottom: 25px;
            font-size: 32px;
        }
        .cart-items {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #2c2c2c;
            padding: 15px;
            border-radius: 8px;
        }
        .cart-item img {
            width: 80px;
            height: 80px;
            border-radius: 5px;
            object-fit: cover;
        }
        .cart-item h3 {
            margin: 0;
            color: #fff;
        }
        .cart-item p {
            margin: 5px 0 0;
            color: #aaa;
        }
        .cart-item-actions button {
            background-color: #ff3c41;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
        }
        .cart-summary {
            margin-top: 25px;
            text-align: right;
            font-size: 18px;
        }
        .checkout-button {
    margin-top: 20px;
    background-color: #ff3c41;
    color: white;
    font-size: 16px;
    padding: 12px 24px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
    transition: background 0.3s ease;
    text-decoration: none;
    
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
}

        .checkout-button:hover {
            background-color: #e0333a;
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
        <li><a href="Categories.php" onclick="openCategoriesModal()">Categories</a></li>
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

    <div class="modal-box">
        <h1>Your Cart</h1>
        <div class="cart-items" id="cart-items"></div>
        <div class="cart-summary">
    <p>Total: <strong id="total-price">Rs: 0.00</strong></p>
    <button id="checkout-button" class="checkout-button">Proceed to Checkout</button>
</div>


    </div>

    <script>
        function loadCart() {
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            let cartContainer = document.getElementById("cart-items");
            let totalPrice = 0;
            cartContainer.innerHTML = "";

            if (cart.length === 0) {
                cartContainer.innerHTML = "<p>Your cart is empty.</p>";
            } else {
                cart.forEach((item, index) => {
                    let itemTotal = item.price;
                    totalPrice += itemTotal;
                    cartContainer.innerHTML += `
                        <div class="cart-item">
                            <img src="${item.image}" alt="${item.name}">
                            <div>
                                <h3>${item.name}</h3>
                                <p>Price: Rs: ${item.price.toFixed(2)}</p>
                            </div>
                            <div class="cart-item-actions">
                                <button onclick="removeFromCart(${index})">Remove</button>
                            </div>
                        </div>
                    `;
                });
            }

            document.getElementById("total-price").innerText = "Rs: " + totalPrice.toFixed(2);
            document.getElementById("checkout-link").href = `checkout.php?total=${totalPrice.toFixed(2)}`;
        }

        function removeFromCart(index) {
            let cart = JSON.parse(localStorage.getItem("cart"));
            cart.splice(index, 1);
            localStorage.setItem("cart", JSON.stringify(cart));
            loadCart();
        }

        window.onload = loadCart;
    </script>
    <script>
    document.getElementById("checkout-button").addEventListener("click", function () {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];
        if (cart.length === 0) {
            alert("Your cart is empty. Please add items before proceeding.");
        } else {
            // Optionally pass total as a query parameter
            const total = cart.reduce((sum, item) => sum + item.price, 0).toFixed(2);
            window.location.href = `checkout.php?total=${total}`;
        }
    });
</script>

</body>
</html>
