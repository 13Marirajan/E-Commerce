<?php
session_start();

// Database connection settings
$host = "localhost"; // Change if needed
$user = "root"; // Default user for local development
$password = ""; // Default password for local development
$database = "voxelvault"; // Ensure this matches your database name

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search query
$search = "";
$results = [];
if (isset($_GET['query'])) {
    $search = $conn->real_escape_string($_GET['query']); // Prevent SQL injection

    // Search query
    $sql = "SELECT * FROM products WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Voxel Vault</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .container {
            padding: 20px;
            text-align: center;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }
        .product-item {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }
        .product-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 5px;
        }
        .product-item a {
            text-decoration: none;
            color: #ff6347;
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<header>
    <div class="logo"><a href="index.php">Voxel Vault</a></div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="Shop.html">Shop</a></li>
            <li><a href="Categories.html">Categories</a></li>
            <li><a href="Offers.html">Offers</a></li>
            <li><a href="Contact.html">Contact</a></li>
            <li><a href="Cart.html">Cart</a></li>
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

<section class="container">
    <h1>Search Results for "<?php echo htmlspecialchars($search); ?>"</h1>
    <?php if (!empty($results)) { ?>
        <div class="product-list">
            <?php foreach ($results as $row) { ?>
                <div class="product-item">
                    <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
                    <h3><?php echo htmlspecialchars($row['name']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                    <p><strong>Price:</strong> Rs. <?php echo htmlspecialchars($row['price']); ?></p>
                    <a href="<?php echo htmlspecialchars($row['detail_page']); ?>">View Product</a>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p>No products found.</p>
    <?php } ?>
</section>

<footer>
    <p>&copy; 2025 Voxel Vault. All rights reserved.</p>
</footer>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>
