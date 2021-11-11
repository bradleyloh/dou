const numberInputs = document.querySelectorAll(".number-input");

function numberInput(el) {
  const input = el.querySelector("input");
  const dec = el.querySelector(".decrement");
  const inc = el.querySelector(".increment");
  const min = input.getAttribute("min") || false;
  const max = input.getAttribute("max") || false;

  dec.addEventListener("click", decrement);
  inc.addEventListener("click", increment);

  function decrement() {
    let value = input.value;
    value--;
    if (!min || value >= min) {
      input.value = value;
    }
  }

  function increment() {
    let value = input.value;
    value++;
    if (!max || value <= max) {
      input.value = value;
    }
  }
}

numberInputs.forEach(input => numberInput(input));

