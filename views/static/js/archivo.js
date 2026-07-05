var open = document.getElementById('open')
var password = document.getElementById('password')

open.addEventListener('click', () => {
    if (password.type == "password") {
        password.type = "text";

        open.classList.remove("fa-solid", "fa-eye-slash")
        open.classList.add("fa-solid", "fa-eye")

    } else {
        password.type = "password";
        open.classList.remove("fa-solid", "fa-eye")
        open.classList.add("fa-solid", "fa-eye-slash")
    }
})

