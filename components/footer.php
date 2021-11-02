<footer>
  <div class="wrapper">
    <div class="info">
      <div class="logo">Logo @ Footer</div>
      <p>Daily: 10am - 9pm</p>
      <p>
        6 Bayfront Avenue <br />
        Singapore 12356 <br />
        Get directions to NAME
      </p>

    </div>
    <div class="social">
      <p>Connect with us</p>
      <ul class="social-list">
        <li class="social-item"> <a href="#" onclick="event.preventDefault();"><i class="im im-facebook"></i></a></li>
        <li class="social-item"> <a href="#" onclick="event.preventDefault();"><i class="im im-twitter"></i></a></li>
        <li class="social-item"> <a href="#" onclick="event.preventDefault();"><i class="im im-instagram"></i></a></li>
      </ul>
    </div>
    <p class="copyright">
      Privacy notice © 2021 NAME. All Rights Reserved
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