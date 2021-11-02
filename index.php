<!DOCTYPE html>

<head>
  <title>Name</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Quicksand" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">
  <link rel="stylesheet" href="./src/css/main.css">
</head>

<body class="page-index">
  <?php

  require 'components/header.php';

  $products_query = "SELECT * FROM products WHERE stock > 0 LIMIT 3";
  $products = $conn->query($products_query);
  ?>
  <div class="main-content">
    <div class="banner">
      <img src="src/img/image20.png" alt="beancurd" />
      <button onclick="location.href='pages/menu.php'" type="button" class="primary large">Browse Menu</button>
    </div>

    <div class="promotion">
      <div class="wrapper">
        <h2>[ words for what we provide eg. non gmo beans, free-delivery, 100% freshness, top quality beans]</h2>
        <div class="promotion-list">
          <?php for ($i = 0; $i < 5; $i++) { ?>
            <div class="promotion-item">
              <img src="src/img/promo.svg" alt="promotion" />
            </div>
          <?php } ?>
        </div>
      </div>
    </div>

    <div class="menu">
      <div class="wrapper">
        <h2>CHOOSE YOUR BEAN [show what kind of food we have, eg. beancurd, soymilk, pancake]</h2>
        <h3>There’s always something for everyone</h3>
        <div class="product-list">
          <?php if ($products->num_rows > 0) {
            while ($product = $products->fetch_assoc()) {
          ?>
              <div class="product-item">
                <img src="src/img/products/<?php echo $product['imageFileName']; ?>" alt="<?php echo $product["name"]; ?>" />
                <div class="product-name"><?php echo $product["name"]; ?></div>
              </div>
          <?php }
          } ?>
        </div>
        <button onclick="location.href='pages/menu.php'" type="button" class="primary large">Browse menu</button>
      </div>
    </div>

    <div class="about">
      <img src="src/img/soybean.jpg" alt="soybean" />
      <div class="info">
        <div class="brand-name">
          <h4>DOUHUA BEANCURD</h4>
          since 2021
        </div>
        <button onclick="location.href='pages/about.php'" type="button" class="primary large">Hear our story</button>
      </div>
    </div>
  </div>
  <?php require 'components/footer.php' ?>
</body>

</html>