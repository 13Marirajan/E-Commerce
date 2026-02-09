<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // 🔹 Your real email address
    $to = "13marirajan@gmail.com";

    $email_subject = "Voxel Vault Feedback: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Name: $name\n" .
                  "Email: $email\n" .
                  "Subject: $subject\n" .
                  "Message:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script>alert('✅ Your message has been sent successfully!');</script>";
    } else {
        echo "<script>alert('❌ Failed to send your message. Please try again later.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact - Voxel Vault</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #0d0d0d, #1f1f1f);
      color: #fff;
    }

    header {
      background-color: #111;
      color: white;
      padding: 16px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.4);
    }

    header .logo a {
      font-size: 28px;
      font-weight: 600;
      color: #ff3c3c;
      text-decoration: none;
    }

    nav ul {
      list-style: none;
      display: flex;
      margin: 0;
      padding: 0;
    }

    nav ul li {
      margin: 0 15px;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 500;
      transition: color 0.3s ease;
    }

    nav ul li a:hover {
      color: #ff3c3c;
    }

    .contact-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 60px 20px;
    }

    .contact-box {
      background: rgba(255, 255, 255, 0.05);
      border-radius: 20px;
      padding: 40px;
      max-width: 700px;
      width: 100%;
      backdrop-filter: blur(15px);
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
    }

    .contact-box h1 {
      text-align: center;
      font-size: 2em;
      margin-bottom: 25px;
      color: #fff;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: 500;
      margin-bottom: 8px;
      color: #ddd;
    }

    .form-group input,
    .form-group textarea {
      width: 100%;
      padding: 14px;
      background: #222;
      border: 1px solid #444;
      border-radius: 10px;
      color: #fff;
      font-size: 1em;
      outline: none;
      transition: border 0.3s;
    }

    .form-group input:focus,
    .form-group textarea:focus {
      border-color: #ff3c3c;
    }

    .form-group textarea {
      height: 140px;
      resize: none;
    }

    .form-group button {
      width: 100%;
      padding: 14px;
      background-color: #ff3c3c;
      border: none;
      border-radius: 10px;
      color: white;
      font-size: 1em;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s;
    }

    .form-group button:hover {
      background-color: #e03131;
    }

    footer {
      background-color: #111;
      color: white;
      text-align: center;
      padding: 25px 0;
      margin-top: 40px;
    }

    footer a {
      color: #ff3c3c;
      text-decoration: none;
      margin: 0 10px;
    }

    @media (max-width: 600px) {
      .contact-box {
        padding: 30px 20px;
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
        <li><a href="upload.php">Upload</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else: ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <div class="contact-wrapper">
    <div class="contact-box">
      <h1>Contact Us</h1>
      <form method="post" action="Contact.php">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Your Name" required />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" placeholder="Your Email" required />
        </div>
        <div class="form-group">
          <label for="subject">Subject</label>
          <input type="text" id="subject" name="subject" placeholder="Subject" required />
        </div>
        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" placeholder="Your Message" required></textarea>
        </div>
        <div class="form-group">
          <button type="submit">Send Message</button>
        </div>
      </form>
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
