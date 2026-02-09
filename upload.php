<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelDir = "uploads/models/";
    $imageDir = "uploads/images/";
    $allowedModelTypes = ['obj', 'fbx', 'zip'];
    $allowedImageTypes = ['jpg', 'jpeg', 'png', 'webp'];
    $maxModelSize = 100 * 1024 * 1024; // 100 MB

    if (!file_exists($modelDir)) mkdir($modelDir, 0777, true);
    if (!file_exists($imageDir)) mkdir($imageDir, 0777, true);

    if (!isset($_POST['modelTitle']) || !isset($_FILES['modelFile'])) {
        $message = "❌ Form data missing.";
    } else {
        $title = htmlspecialchars($_POST['modelTitle']);
        $uniqueID = time();

        $modelName = basename($_FILES["modelFile"]["name"]);
        $modelExt = strtolower(pathinfo($modelName, PATHINFO_EXTENSION));
        $modelSize = $_FILES["modelFile"]["size"];

        if (!in_array($modelExt, $allowedModelTypes)) {
            $message = "❌ Invalid model file type.";
        } elseif ($modelSize > $maxModelSize) {
            $message = "❌ Model file exceeds 100MB limit.";
        } else {
            $modelPath = $modelDir . $uniqueID . "_" . $modelName;
            $modelUploaded = move_uploaded_file($_FILES["modelFile"]["tmp_name"], $modelPath);

            if ($modelUploaded) {
                $uploadedImages = [];

                if (!empty($_FILES['modelImages']['name'][0])) {
                    foreach ($_FILES['modelImages']['name'] as $key => $imgName) {
                        $tmpName = $_FILES['modelImages']['tmp_name'][$key];
                        $imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

                        if (in_array($imgExt, $allowedImageTypes)) {
                            $imgPath = $imageDir . $uniqueID . "_" . $key . "_" . basename($imgName);
                            if (move_uploaded_file($tmpName, $imgPath)) {
                                $uploadedImages[] = $imgPath;
                            }
                        }
                    }
                }

                $message = "✅ Upload successful!<br>Model Title: <strong>$title</strong><br>";
                $message .= "Model file saved as: <code>$modelPath</code><br>";
                $message .= "Uploaded " . count($uploadedImages) . " image(s).";

                // Optional: Save $title, $modelPath, $uploadedImages to database
            } else {
                $message = "❌ Error uploading model file.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload 3D Model</title>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #2e2e2e;
      color: #fff;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #121212;
      padding: 20px 40px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo a {
      color: #ff3c3c;
      font-size: 26px;
      font-weight: 700;
      text-decoration: none;
    }

    nav ul {
      list-style: none;
      margin: 0;
      padding: 0;
      display: flex;
      gap: 20px;
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

    .container {
      max-width: 600px;
      margin: 60px auto;
      background-color: #3b3b3b;
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 0 12px rgba(255, 60, 60, 0.2);
      text-align: center;
    }

    h2 {
      margin-bottom: 20px;
      font-size: 24px;
    }

    input[type="file"],
    input[type="text"] {
      padding: 10px;
      border-radius: 8px;
      border: none;
      background-color: #fff;
      color: #333;
      margin-bottom: 20px;
      width: 100%;
    }

    input[type="submit"] {
      background-color: #ff3c3c;
      color: white;
      padding: 12px 30px;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    input[type="submit"]:hover {
      background-color: #e03232;
    }

    .message {
      margin-bottom: 20px;
      font-size: 16px;
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

  <div class="container">
    <h2>Upload 3D Model</h2>

    <?php if (isset($message)): ?>
      <p class="message"><strong><?= $message ?></strong></p>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">
      <label for="modelTitle">Model Title:</label><br>
      <input type="text" name="modelTitle" id="modelTitle" required><br>

      <label for="modelImages">Model Images (you can select multiple):</label><br>
      <input type="file" name="modelImages[]" accept=".jpg,.jpeg,.png,.webp" multiple required><br>

      <label for="modelFile">Model File (.obj, .fbx, .zip):</label><br>
      <input type="file" name="modelFile" accept=".obj,.fbx,.zip" required><br>

      <input type="submit" value="Upload Model">
    </form>
  </div>

</body>
</html>
