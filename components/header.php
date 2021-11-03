<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/f32ee". '/dou/database.php';

$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';
$base = $httpProtocol . '://' . $_SERVER['HTTP_HOST'] . '/f32ee'.  '/dou/';

function active($current_page)
{
  $url_array =  explode('/', $_SERVER['REQUEST_URI']);
  $url = end($url_array);
  if ($current_page == $url) {
    echo 'active';
  }
}

session_start(); ?>

<header>
  <div class="wrapper">
    <a href="<?php echo $base ?>" class="logo"><img src="<?php echo $base ?>/src/img/logo-black.png"></a>
    <div class="menu">
      <div class="menu-toggle">
        <span class="material-icons">menu</span>
      </div>
      <nav class="nav">
        <ul class="nav-list">
          <li class="nav-item <?php active('about.php'); ?>"><a href="<?php echo $base . 'pages/about.php' ?>">About</a></li>
          <li class="nav-item <?php active('menu.php'); ?>"><a href="<?php echo $base . 'pages/menu.php' ?>">Menu</a></li>
          <li class="nav-item <?php active('contact.php'); ?>"><a href="<?php echo $base . 'pages/contact.php' ?>">Contact Us</a></li>
        </ul>
      </nav>
    </div>
    <div class="cart">
      <a href="<?php echo $base . 'pages/cart.php' ?>">
        <span class="material-icons">shopping_cart</span>
      </a>
    </div>
  </div>
</header>

<script>
  function toggleMenu() {
    const icon = document.querySelector(".menu-toggle .material-icons");
    const menu = document.querySelector(".menu");
    menu.classList.toggle("expanded");
    document.body.classList.toggle("menu-expanded");

    if (menu.classList.contains("expanded")) {
      icon.textContent = "close";
    } else {
      icon.textContent = "menu";
    }
  }
  document.querySelector(".menu-toggle").addEventListener("click", toggleMenu);
</script>