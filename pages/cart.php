<!DOCTYPE html>

<head>
  <title>Dou! - Cart</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../src/css/main.css">
  <link href="../src/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body class="page-cart">
  <?php require '../components/header.php';

  if (isset($_GET['action'])) {
    switch ($_GET['action']) {
      case "remove":
        if (!empty($_SESSION["cart"])) {
          foreach ($_SESSION["cart"] as $key => $value) {
            if ($_GET["product"] == $key)
              unset($_SESSION["cart"][$key]);
            if (empty($_SESSION["cart"]))
              unset($_SESSION["cart"]);
          }
        }
    }
  }
  ?>

  <div class="main-content">
    <div class="wrapper">
      <div class="order-summary">
        <h1>Order Summary</h1>
        <form action="details.php" method="post" class="order-list">
          <?php if (isset($_SESSION["cart"])) {
            $total = 0;
            foreach ($_SESSION["cart"] as $key => $item) {
              $subtotal = $item['price'] * $item['quantity'];
              $total += $subtotal;

              $product_query = "SELECT * FROM products WHERE id=$key";
              $product = $conn->query($product_query);
              $product_info = $product->fetch_assoc();
          ?>
              <div class="order-item">
                <img src="../src/img/products/<?php echo $product_info['imageFileName']; ?>" alt="<?php echo $product_info["name"]; ?>" />
                <div class="product-name"><?php echo $product_info["name"]; ?></div>
                <p class="product-description"><?php echo $product_info["description"]; ?></p>
                <div class="price">$<?php echo $item['price']; ?></div>
                
    
              
                <input disabled type="number" id="qty" name="qty" value="<?php echo $item['quantity']; ?>" min="1" max="<?php echo $product_info["stock"]; ?>" />
                
                
                <div class="subtotal">$<?php echo number_format($subtotal, 2); ?></div>
                <a href="cart.php?action=remove&product=<?php echo $key; ?>"><span class="material-icons">clear</span></a>
              </div>

            <?php } ?>
            <div class="total">
                <div class="label">Total cost</div>
                <div class="value">$<?php echo number_format($total, 2); ?></div>
              </div>
              <button type="submit" class="secondary large checkout">Check Out</button>
              <?php
          } else { ?>
            <p>Your cart is empty</p>
          <?php } ?>
        </form>
      </div>
    </div>
  </div>
  <?php require '../components/footer.php' ?>
</body>

</html>