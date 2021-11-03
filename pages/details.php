<!DOCTYPE html>

<head>
  <title>Dou! - Customer Details</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Quicksand" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">
  <link rel="stylesheet" href="../src/css/main.css">
</head>

<body class="page-details">
  <?php require '../components/header.php'?>

  <div class="main-content">
    <div class="wrapper">
      <p>Enter your details</p>
      <form class="details" method="post" action="confirmation.php">
        <div class="field-set required">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required />
        </div>

        <div class="field-set required">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required />
        </div>

        <button type="submit" class="secondary large">Place order</button>
      </form>
    </div>
  </div>
  <?php require '../components/footer.php' ?>
</body>

</html>