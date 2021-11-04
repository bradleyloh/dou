// var qtyObject = document.getElementById("qty");
// qtyObject.addEventListener("change", checkQty, false);

// function checkQty(event) {
//     var inputQty = event.currentTarget;
//     var pos = inputQty.value.search(/^[6-9]$/);

//     if (pos != 0) {
//         alert("The qty you entered (" + inputQty.value +
//             ") is not valid. \n");
//         inputQty.focus();
//         inputQty.select();
//         return false;
//     }
//     alert("The qty you entered (" + inputQty.value +
//     ") is not valid. \n");
// }



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

function showToast() {
  const toast = document.querySelector(".toast");
  toast.classList.add("show");
  setTimeout(function() {
    toast.classList.remove("show");
  }, 5000);
}