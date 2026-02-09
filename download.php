<?php
session_start();

// Security check
if (!isset($_SESSION['paid']) || !isset($_SESSION['purchased_models'])) {
    die("Access Denied. No valid purchase found.");
}

// Google Drive file ID list (model name => file ID)
$modelLinks = [
    "Plane OBJ Model" => "1siWcQIKvgiWLBBlthgshvpPkPWiYvCSp",
    "Drone 001 Stage 2" => "1Nu4qIzAW1Pj5luMOYUvXX0fLRgXkghpi",
    "Wooden Airplane Toy Helicopter" => "10NVOQx4laVx8GKhqv6LUa1Er9M7kXyyZ",
    "Spitfire v6" => "17kYU7rZORHlQul29HydmJo_BBaCrABJJ",
    "Plane OBJ" => "1tlNdzGacxsJBGx9nwhp3deNVMIrp3Pbp",
    "F104 Starfighter" => "1GvKtEr2IU4A8xAryX95ro3P94fdb9jq7",
    "AS-78 Condor" => "1kxk9XcWzUA5K2nYh0lHxswtOZ0zZsqBb",
    "Helicopter" => "1tsWiVeB08ZzefgibJAVcT9PMwdDox3mr",
    "NATO Shelter V1" => "1pjLAE2uU85QH7-2_jsvOVA7A25lAlBQY",
    "Maya - V6" => "1RcfCJeZG7bctXahhFElPVedE-xk7NFpq",
    "Wooden Toy Plane" => "1jEODImOf2jOBxJqOU34PENcdZ1TFtRB_",
    "Plane01" => "1KdiB1eLEFysQhnubixs7cf-bjRDgrNeY",
    "AirPlane1" => "1MX3eSx5Mx3IOTYu9TvKtEYotbX49llph",
    "Quadcopter" => "1YrkOH8GBoQ9tR3qg8L0c8sXcZJLZQazJ",
    "Jet Aircraft" => "1vKJeAL_8xHTDePVdmJ51UK-B1J2b4Vew",
    "Stealth Jet" => "1k1Esm6Tk3pxmN8Bmm5p9Jwxa77nFbZKk",
    "Boeing 747" => "1OKeZqO_yFCKCDtvbJODpeon4EXNOLYNh",
    "UAV drone" => "1tHFJ2VOPfRwO3JuZDJQ9sM3gOpNj5yhy",
    "Aeroplane Model" => "1ewbgHhPhblzGgNYh6noDiM9NjqRMEG1_",
    "Commercial Jet" => "1UWBX1jWaG1AOY0DH1ICRAIC38CtPDIrc",
    "Jet Fighter" => "1LTpki5ABFYH0H-1wPrr2s5lWjIdhE_U1",
    "Airforce 3D Jet" => "1ahTZmUb4N_QxzVuCL0FNsInuP8POmnRZ",
    "Aircraft Cargo" => "1-rP3m-CyPO1nUQe0HKhDUxJKumT6T6uU"
];

// Get user’s purchased model list from session
$purchased = $_SESSION['purchased_models'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Downloads - Voxel Vault</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f0f2f5;
      padding: 50px 20px;
      text-align: center;
    }

    h2 {
      color: #333;
      font-weight: 600;
      margin-bottom: 30px;
    }

    .download-list {
      display: inline-block;
      max-width: 600px;
      width: 100%;
      margin: 0 auto;
      text-align: left;
    }

    .download-item {
      background: #fff;
      padding: 15px 20px;
      margin-bottom: 15px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .download-item a {
      color: #ff6347;
      font-weight: bold;
      text-decoration: none;
    }

    .download-item a:hover {
      color: #e55347;
      text-decoration: underline;
    }

    .no-downloads {
      color: #777;
      font-size: 16px;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <h2>Download Your Purchased Models</h2>

  <div class="download-list">
    <?php
    $hasDownload = false;

    foreach ($purchased as $model):
        $modelName = $model['name'];

        if (isset($modelLinks[$modelName])):
            $hasDownload = true;
            $fileId = $modelLinks[$modelName];
            $directLink = "https://drive.google.com/uc?id=" . urlencode($fileId) . "&export=download";
    ?>
        <div class="download-item">
          <span><?= htmlspecialchars($modelName); ?></span>
          <a href="<?= $directLink ?>" download="<?= htmlspecialchars($modelName) ?>.zip">Download</a>
        </div>
    <?php
        endif;
    endforeach;

    if (!$hasDownload):
    ?>
      <div class="no-downloads">No valid download links found for your purchases.</div>
    <?php endif; ?>
  </div>

</body>
</html>
