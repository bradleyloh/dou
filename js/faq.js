const items = document.querySelectorAll(".accordion-header");

function toggleAccordion() {
  const itemToggle = this.getAttribute('aria-expanded');

  for (i = 0; i < items.length; i++) {
    items[i].setAttribute('aria-expanded', 'false');
    items[i].parentElement.classList.remove("expanded");
  }

  if (itemToggle == 'false') {
    this.setAttribute('aria-expanded', 'true');
    this.parentElement.classList.add("expanded");
  }
}

items.forEach(item => item.addEventListener('click', toggleAccordion));


var nameObject = document.getElementById("name");
nameObject.addEventListener("change", checkName, false);

var dateObject = document.getElementById("contact");
dateObject.addEventListener("change", checkContact, false);

function checkName(event) {

  var inputName = event.currentTarget;
  var pos = inputName.value.search(/^[^0-9]+$/);

  if (pos != 0) {
      alert("Please enter your name (e.g. Alex Lim).\nThe name you entered (" + inputName.value +
          ") is not valid. \n");
      inputName.focus();
      inputName.select();
      return false;
  }
}



function checkContact(event) {
    var inputName = event.currentTarget;
    var pos = inputName.value.search(/^\d{8}$/);
    
    if (pos != 0) {
        alert("Please enter your 8-digit phone number.\nThe number you entered (" + inputName.value +
            ") is not valid. \n ");
        inputName.focus();
        inputName.select();
        return false;
    }
}