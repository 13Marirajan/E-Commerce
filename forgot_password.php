<?php
session_start();
$conn = new mysqli("localhost", "root", "", "project");

// Step flags
$step = isset($_POST['step']) ? $_POST['step'] : 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Step 1: Enter Email
    if ($step == 1) {
        $email = $_POST['email'];
        $result = $conn->query("SELECT * FROM users WHERE email='$email'");
        if ($result->num_rows == 1) {
            $otp = rand(100000, 999999);
            $_SESSION['reset_email'] = $email;
            $_SESSION['otp'] = $otp;
            $_SESSION['otp_time'] = time();

            // Simulate OTP sending
            echo "<div class='message success'>This is your OTP: $otp</div>";

            $step = 2;
        } else {
            echo "<div class='message error'>Email not found.</div>";
        }
    }

    // Step 2: Verify OTP
    elseif ($step == 2) {
        $entered_otp = $_POST['otp'];
        $original_otp = $_SESSION['otp'];
        $otp_time = $_SESSION['otp_time'];

        if (time() - $otp_time > 300) {
            echo "<div class='message error'>OTP expired. Try again.</div>";
            session_destroy();
            $step = 1;
        } elseif ($entered_otp == $original_otp) {
            echo "<div class='message success'>OTP verified. You can now reset your password.</div>";
            $step = 3;
        } else {
            echo "<div class='message error'>Invalid OTP. Try again.</div>";
            $step = 2;
        }
    }

    // Step 3: Reset Password
    elseif ($step == 3) {
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $email = $_SESSION['reset_email'];
        $conn->query("UPDATE users SET password='$new_password' WHERE email='$email'");
        echo "<div class='message success'>Password reset successfully! <a href='login.php'>Login</a></div>";
        session_destroy();
        $step = 1;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Segoe UI", sans-serif;
            background: url('pexels-jplenio-1103970.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .box {
            width: 350px;
            padding: 40px;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            border-radius: 10px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .box h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        .box input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            background: transparent;
            border: 1px solid #aaa;
            border-radius: 5px;
            color: white;
            outline: none;
        }

        .box input[type="number"]::-webkit-outer-spin-button,
        .box input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .box input[type="number"],
        .box input[type="text"]{
        --moz-appearance: textfield;
        } 

        .box button {
            width: 100%;
            padding: 12px;
            background-color: #FFC107;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            color: black;
            transition: background-color 0.3s ease;
        }

        .box button:hover {
            background-color: #e0a800;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #ffc107;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .message {
            text-align: center;
            padding: 10px;
            margin: 15px auto;
            width: 350px;
            border-radius: 5px;
            font-weight: bold;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>

<div class="box">
    <?php if ($step == 1): ?>
        <form method="POST">
            <h2>Forgot Password</h2>
            <input type="hidden" name="step" value="1">
            <input type="email" name="email" required placeholder="Enter your email">
            <button type="submit">Send OTP</button>
            <a href="login.php" class="back-link">← Back</a>
        </form>

    <?php elseif ($step == 2): ?>
        <form method="POST">
            <h2>Enter OTP</h2>
            <input type="hidden" name="step" value="2">
            <input type="text" name="otp" required placeholder="Enter OTP" maxlength="6" pattern="\d{6}" inputmode="numeric">
            <button type="submit">Verify OTP</button>
            <a href="forgot_password.php" class="back-link">← Back</a>
        </form>

    <?php elseif ($step == 3): ?>
        <form method="POST">
            <h2>Reset Password</h2>
            <input type="hidden" name="step" value="3">
            <input type="password" name="new_password" required placeholder="New password">
            <button type="submit">Reset Password</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
