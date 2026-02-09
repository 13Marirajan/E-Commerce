<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    $sql = "SELECT * FROM users WHERE email='$email' AND otp='$otp'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "OTP Verified! You can reset your password.";
    } else {
        echo "Invalid OTP!";
    }
}
?>

<form method="POST">
    <input type="email" name="email" required placeholder="Email">
    <input type="text" name="otp" required placeholder="Enter OTP">
    <button type="submit">Verify OTP</button>