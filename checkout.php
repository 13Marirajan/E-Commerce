<?php
session_start();
$totalAmount = isset($_GET['total']) ? floatval($_GET['total']) : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Your Purchase - Voxel Vault</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f8f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .checkout-container {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        h2 {
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }
        p {
            font-size: 18px;
            color: #666;
            margin-bottom: 20px;
        }
        .pay-button {
            background-color: #ff6347;
            color: white;
            font-size: 18px;
            padding: 12px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease-in-out;
            width: 100%;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }
        .pay-button:hover {
            background-color: #e55347;
        }
        .back-link {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
        }
        .back-link:hover {
            color: #ff6347;
        }
    </style>
</head>
<body>

    <div class="checkout-container">
        <h2>Complete Your Purchase</h2>
        <p>Total Price: ₹<?php echo number_format($totalAmount, 2); ?></p>
        <button id="rzp-button1" class="pay-button">Pay ₹<?php echo number_format($totalAmount, 2); ?> via Razorpay</button>
        <a href="cart.php" class="back-link">← Back to Cart</a>
    </div>

    <script>
        var options = {
            "key": "rzp_test_5DrYAT5aqyynqU", // Replace with your Razorpay API Key
            "amount": <?php echo $totalAmount * 100; ?>, // Convert to paisa
            "currency": "INR",
            "name": "Voxel Vault",
            "description": "Purchase 3D Model",
            "handler": function (response) {
                alert('Payment Successful! Payment ID: ' + response.razorpay_payment_id);
                window.location.href = "success.php?payment_id=" + response.razorpay_payment_id;
            },
            "prefill": {
                "name": "Your Name",
                "email": "your-email@example.com"
            },
            "theme": {
                "color": "#ff6347"
            }
        };
        
        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function (e) {
            rzp1.open();
            e.preventDefault();
        };
    </script>

</body>
</html>
