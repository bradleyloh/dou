<!DOCTYPE html>

<head>
  <title>Dou! - Confirmation</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">
  <link rel="stylesheet" href="../src/css/main.css">
    
  <link href="../src/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body class="page-confirmation">
  <?php require '../components/header.php';

  if ($_POST["name"] && isset($_SESSION["cart"])) {
    $insert = "INSERT INTO orders(`customerName`, `customerEmail`) VALUES ('$_POST[name]', '$_POST[email]')";
    $conn->query($insert);
    $order_id = $conn->insert_id;
    $total = 0;

    $stack[] = $var;
    $initial_message = "Hi" ." ". $_POST['name'] . '!' . "\r\n\r\n" . 
    "Here is your confirmation order: " . "\r\n";
    array_push($stack,$initial_message);

    foreach ($_SESSION["cart"] as $key => $item) {
      $subtotal = $item["quantity"] * $item["price"];
      $total += $subtotal;
      
      $insert_detail = "INSERT INTO orderDetail(`orderId`, `productId`, `quantity`, `price`, `subtotal`) VALUES ($order_id, $key, $item[quantity], $item[price], $subtotal)";
      $conn->query($insert_detail);

      $update_stock = "UPDATE products SET stock = stock - $item[quantity] WHERE id = $key";
      $conn->query($update_stock);

      $product_query = "SELECT * FROM products WHERE id=$key";
      $product = $conn -> query($product_query);

      $product_info = $product->fetch_assoc();
      $message_product = $product_info["name"] . ' : ' . $item['quantity'] . 'unit(s)'.' @ $' . $item['price'] . ' each' . "\r\n";
      array_push($stack,$message_product);
      
    }

    $total_message = "\r\n" . "The total cost: $" . $total;
    array_push($stack,$total_message);
    foreach ($stack as $key => $value) {
      $message = $message . $value;

    }

    $to      = 'f32ee@localhost';
    $subject = 'Hi ' . $_POST['name'] . '! '. 'Dou! - View your confirmation order!';
    $headers = 'From: '. 'Dou@f32ee.com' . "\r\n" .
    'Reply-To: '. $_POST['email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($to, $subject, $message, $headers,'-ff32ee@localhost');

    $update = "UPDATE orders SET total=$total WHERE id=$order_id";
    $conn->query($update);

    unset($_SESSION["cart"]);
  }
  ?>

  <div class="main-content">
    <div class="wrapper">
      <img src="../src/img/done.svg" alt="done" class= "thankyou-image" />
      <p>Thank you!</p>
      <p>Self-collect your order at the counter. <br />
        Your order number is <strong>#<?php echo $order_id; ?></strong></p>
    </div>
  </div>
  <?php require '../components/footer.php' ?>
</body>

</html>