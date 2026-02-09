<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Download Page - Voxel Vault</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #121212;
      color: #fff;
      padding: 40px;
      text-align: center;
    }
    .download-btn {
      padding: 12px 20px;
      background-color: #ff3c38;
      color: #fff;
      border: none;
      border-radius: 8px;
      margin: 10px;
      cursor: pointer;
      font-size: 16px;
    }
    .download-btn:hover {
      background-color: #e13330;
    }
  </style>
</head>
<body>
  <h1>Thank you for your purchase!</h1>
  <p>Your downloads are ready below:</p>

  <div id="downloadArea"></div>

  <script>
    const cart = JSON.parse(localStorage.getItem("cart"));
    const downloadArea = document.getElementById("downloadArea");

    console.log("Cart:", cart); // for debugging

    if (cart && cart.length > 0) {
      cart.forEach((product) => {
        const button = document.createElement("button");
        button.textContent = `⬇ Download ${product.name}`;
        button.className = "download-btn";
        button.onclick = () => {
          if (product.downloadLink) {
            window.open(product.downloadLink, "https://drive.google.com/uc?id=1pjLAE2uU85QH7-2_jsvOVA7A25lAlBQY&export=download");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1tsWiVeB08ZzefgibJAVcT9PMwdDox3mr/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1GvKtEr2IU4A8xAryX95ro3P94fdb9jq7/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1tlNdzGacxsJBGx9nwhp3deNVMIrp3Pbp/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/10NVOQx4laVx8GKhqv6LUa1Er9M7kXyyZ/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1kxk9XcWzUA5K2nYh0lHxswtOZ0zZsqBb/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1e2OkFDcRn7gEC72GJiesrEp5hykHT2BD/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1FOXC9YyQUIK9D4Z8XWNhgn4IeN_otjrc/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1phip8QOO5XGRZJLQa5s669l9HYIpUmE4/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1rCQz4fJhFh7LSE5M7s5r5fKTCK4hf0ym/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1WHFyJdveLyoutbTWVTMX-0wbT_9sCRRf/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1dyMIB7lrlWPy4xG-tzjS71_TsVKxgfG0/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1rwbFgtl_EE2GfEJBd1n_2YZmKB4EZYzr/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1Mr29ne2lMordPOnmIE58uygDs3mIaUyr/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1uBLv7PED7jv6pGW4Tf8RXihIH6HXXUjE/view?usp=drive_link");
            window.open(product.downloadLink, "https://drive.google.com/file/d/1zZjZG6T9htonK15BcyB-fArSceTzKoVh/view?usp=drive_link");
           
          } else {
            alert("Download link not found for this product.");
          }
        };
        downloadArea.appendChild(button);
      });

      localStorage.removeItem("cart"); // optional: clear cart after showing buttons
    } else {
      downloadArea.innerHTML = "<p>No purchased products found.</p>";
    }
  </script>
</body>
</html>
