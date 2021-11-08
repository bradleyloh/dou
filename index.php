<!DOCTYPE html>

<head>
  <title>Name</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">
  <link rel="stylesheet" href="./src/css/main.css">
  
  <link href="src/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body class="page-index">
  <?php

  require 'components/header.php';

  $products_query = "SELECT * FROM products WHERE stock > 0 LIMIT 3";
  $products = $conn->query($products_query);
  ?>
  <div class="main-content">
    <div class="banner">
      <img src="src/img/home-banner.png" alt="beancurd" />
      <button onclick="location.href='pages/menu.php'" type="button" class="primary large">Browse Menu</button>
    </div>

    <div class="promotion">
      <div class="wrapper">
        <h2>Why DOU?</h2>
        <div class="promotion-list">
          
            <div class="promotion-item">
              <img src="src/img/icon-flask-black.png" alt="bean" /><h4><br>No Perservative</h4>
            </div>
            <div class="promotion-item">
              <img src="src/img/icon-bean-black.png" alt="promotion" /><h4><br>Non-GMO Beans</h4>
            </div>
            <div class="promotion-item">
              <img src="src/img/icon-leaf-black.png" alt="promotion" /><h4><br>High Nutrition</h4>
            </div>
            <div class="promotion-item">
              <img src="src/img/icon-box-black.png" alt="promotion" /><h4><br>Eco-Packaging</h4>
            </div>
            <div class="promotion-item">
              <img src="src/img/icon-quick-black.png" alt="promotion" /><h4><br>Quick Service</h4>
            </div>
            
        </div>
      </div>
    </div>

    <div class="menu">
      <div class="wrapper">
        <h2>Our Products</h2>
        <h3>There's always something for everyone</h3>
        <div class="product-list">
              <div class="product-item">
                <img src="src/img/products/beancurd.png"/>
                <div class="product-name">Beancurd</div>
              </div>
              <div class="product-item">
                <img src="src/img/products/soymilk.png" />
                <div class="product-name">Drink</div>
              </div>
              <div class="product-item">
                <img src="src/img/products/muffin.png" />
                <div class="product-name">Muffin</div>
              </div>
        </div>
        <button onclick="location.href='pages/menu.php'" type="button" class="primary large">Browse menu</button>
      </div>
    </div>

    <div class="about">
      <img src="src/img/home-story.png" alt="story" />
      <div class="info">
        <div class="brand-name">
          <h4>DOUHUA BEANCURD<br>since 2021</h4>
          
        </div>
        <button onclick="location.href='pages/about.php'" type="button" class="primary large">Hear our story</button>
      </div>
    </div>
  </div>
  <?php require 'components/footer.php' ?>
</body>

</html>