// TODO untuk mencari id input melalu css selector
const passwordField = document.querySelector(
  "#form #form-password input[type='password']"
);

const hideBtn = document.querySelector("#form #form-password #password_toogle");

hideBtn.addEventListener("click", function () {
  if (passwordField.type == "password") {
    // ? ubah tipe input
    passwordField.type = "text";
    // * tambahkan class css
    hideBtn.classList.add("active");
  } else {
    passwordField.type = "password";
    hideBtn.classList.remove("active");
  }
});
