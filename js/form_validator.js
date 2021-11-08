var nameObject = document.getElementById("name");
nameObject.addEventListener("change", checkName, false);

var emailObject = document.getElementById("email");
emailObject.addEventListener("change", checkEmail, false);


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

function checkEmail(event) {
    var inputEmail = event.currentTarget;
    var pos = inputEmail.value.search(/^[-.\w]+@(\w+\.){1,3}\w{2,3}$/);

    if (pos != 0) {
        alert("The email you entered (" + inputEmail.value +
            ") is not valid. \n");
        inputEmail.focus();
        inputEmail.select();
        return false;
    }
}

