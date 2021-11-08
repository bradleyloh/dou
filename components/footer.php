<footer>
  <div class="wrapper">
    <div class="info">
      <div class="logo"><img src="<?php echo $base ?>src/img/logo-black.png"></div>
      <p>Daily: 10am - 9pm</p>
      <p>
        6 Butik Batok<br />
        Singapore 12356 <br />
        <a style="color:#73a580; font-weight:bold" href="https://www.google.com/maps/dir//bukit+batok+tauhuay/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x31da1089dc56361d:0xae00ac5ff6bb4f7c?sa=X&ved=2ahUKEwim18S3ofvzAhXVV30KHUdJD1gQ9Rd6BAgMEAU">Get directions to Dou!</a>
      </p>

    </div>
    <div class="social">
      <p>Connect with us</p>
      <ul class="social-list">
        <li> <a href="https://facebook.com" ><img style="width: 2rem;" src="<?php echo $base ?>/src/img/icon-fb.png"></a></li>
        <li> <a href="https://twitter.com" ><img style="width: 2rem;" src="<?php echo $base ?>/src/img/icon-instagram.png"></a></li>
        <li> <a href="https://instagram.com" ><img style="width: 2rem;" src="<?php echo $base ?>/src/img/icon-twitter.png"></a></li>
      </ul>
    </div>
    <p class="copyright">
      Privacy notice &copy; 2021 bradley_jiazhi@dou.com. All Rights Reserved
    </p>
  </div>
</footer>

<script>
  const scrollElements = document.querySelectorAll(".scroll-element");

  function elementInView(el, dividend = 1) {
    const elementTop = el.getBoundingClientRect().top;

    return (
      elementTop <=
      (window.innerHeight || document.documentElement.clientHeight) / dividend
    );
  };

  function elementOutofView(el) {
    const elementTop = el.getBoundingClientRect().top;

    return (
      elementTop > (window.innerHeight || document.documentElement.clientHeight)
    );
  };

  function displayScrollElement(el) {
    el.classList.add("scrolled");
  };

  function hideScrollElement(el) {
    el.classList.remove("scrolled");
  };

  function handleScrollAnimation() {
    scrollElements.forEach((el) => {
      if (elementInView(el, 1.25)) {
        displayScrollElement(el);
      } else if (elementOutofView(el)) {
        hideScrollElement(el)
      }
    })
  }

  window.onload = () => handleScrollAnimation();
  window.addEventListener("scroll", handleScrollAnimation);
</script>