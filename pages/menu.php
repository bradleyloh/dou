<!DOCTYPE html>

<head>
  <title>Dou! - Menu</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Quicksand" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">
  <link rel="stylesheet" href="../src/css/main.css">
    
  <link href="../src/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body class="page-menu">

  <?php require '../components/header.php';
  $type_query = "SELECT * FROM productType";
  $types = $conn->query($type_query);

  if (isset($_GET['action'])) {
    switch ($_GET['action']) {
      case "add":
        $id = intval($_GET['product']);

        if (isset($_SESSION['cart'][$id])) {
          $_SESSION['cart'][$id]['quantity'] = $_SESSION['cart'][$id]['quantity']+$_POST['qty'] ;
        } else {

          $product_query = "SELECT * FROM products WHERE id=$id";
          $product = $conn->query($product_query);

          $product_info = $product->fetch_assoc();

          $_SESSION['cart'][$id] = array(
            "quantity" => $_POST['qty'],
            "price" => $product_info['price']
          );
        }
    }
  }
  ?>

  <div class="toast">
    <p class="toast-message">Successfully added to cart!</p>
  </div>

  <div class="main-content">
    <div class="wrapper">
      <div class="product-type">
        <h1>Products</h1>
        <ul class="type-list">
          <?php if ($types->num_rows > 0) {
            while ($type = $types->fetch_assoc()) {
          ?>
              <li class="type-item"><a href="#type<?php echo $type["id"]; ?>"><?php echo $type["type"]; ?></a></li>
          <?php }
          } ?>
        </ul>
      </div>

      <?php if ($types->num_rows > 0) {
        $types->data_seek(0);
        while ($type = $types->fetch_assoc()) {
      ?>
          <div id="type<?php echo $type["id"]; ?>">
            <h2><?php echo $type["type"]; ?></h2>
            <h3><?php echo $type["description"]; ?></h3>

            <div class="product-list">
              <?php
              $products_query = "SELECT * FROM products WHERE typeId=$type[id]";
              $products = $conn->query($products_query);
              if ($products->num_rows > 0) {
                while ($product = $products->fetch_assoc()) {
              ?>
                  <div class="product-item">
                    <form method="post" action="menu.php?action=add&product=<?php echo $product['id']; ?>">
                      <img src="../src/img/products/<?php echo $product['imageFileName']; ?>" alt="<?php echo $product["name"]; ?>" />
                      <div class="product-name"><?php echo $product["name"]; ?></div>
                      <p class="product-description"><?php echo $product["description"]; ?></p>
                      <div class="price">$<?php echo $product["price"]; ?></div>
                      
                      
                      
                      <div class="quantity">
                        <label for="qty">Quantity</label>
                        <div class="number-input <?php if ($product['stock'] < 1) echo 'disabled'; ?>">
                          <span class="decrement">-</span>
                          
                          <input readonly type="number" id="qty" name="qty" 
                          value="<?php echo $product['stock'] < 1 ? 0 : 1; ?>" 
                          min="1" 
                          max="<?php echo $product["stock"]-$_SESSION['cart'][$id]['quantity']; ?>" 
                          <?php if ($product['stock'] < 1) echo 'disabled'; ?>    
                          />

                          <span class="increment">+</span>
                        </div>
                      </div>
                      <?php if ($product['stock'] > 0) { ?>
                        <button onclick="showToast()" type="submit" class="primary medium add">Add</button>
                      <?php } else { ?>
                        <button disabled class="primary medium add">Out of Stock</button>
                      <?php } ?>
                    </form>
                  </div>
                <?php }
              } else {
                ?>
                <p>No products available in this category</p>
              <?php
              } ?>
            </div>
          </div>
      <?php }
      } ?>

      <button   type="button" class="secondary large checkout">Check Out</button>
    </div>
  </div>
  <?php require '../components/footer.php' ?>
</body>

<script type="text/javascript" src="../js/menu.js"></script>

</html>