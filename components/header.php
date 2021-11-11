<?php

include_once $_SERVER['DOCUMENT_ROOT'] . "/f32ee". '/DH/database.php';
$httpProtocol = !isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] != 'on' ? 'http' : 'https';
$base = $httpProtocol . '://' . $_SERVER['HTTP_HOST'] . '/f32ee'.  '/DH/';

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
    <a href="<?php echo $base ?>" class="logo"><img src="<?php echo $base ?>/src/img/logo-black.svg"></a>
    <div class="menu">
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
      <img style="width: 2rem;" src="<?php echo $base ?>/src/img/icon-cart.svg"></a>
    </div>
  </div>
</header>
