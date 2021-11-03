<!DOCTYPE html>

<head>
  <title>Dou! - Customer Details</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Quicksand" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.iconmonstr.com/1.3.0/css/iconmonstr-iconic-font.min.css">
  <link rel="stylesheet" href="../src/css/main.css">
    
  <link href="../src/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
</head>

<body class="page-details">
  <?php require '../components/header.php'?>

  <div class="main-content">
    <div class="wrapper">
      <h1>Enter your details</h1>

      <form class="details contact-form" method="post" action="confirmation.php">
              <div class="field-set required">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required />
              </div>

              <div class="field-set required">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter your email"  required />
              </div>

              <button type="submit" class="secondary large">Place order</button>
      </form>
    </div>
  </div>
  <?php require '../components/footer.php' ?>
</body>

<script type="text/javascript" src="../js/form_validator.js"></script>
</html>