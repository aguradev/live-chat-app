const form = document.querySelector(".form-login form");
const registerBtn = form.querySelector("#btn-submit");
const errorMessage = form.querySelector(".error-message");

form.onsubmit = (e) => {
  e.preventDefault();
};

registerBtn.addEventListener("click", function () {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/auth.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let data = xhr.response;
      if (data == "login success") {
        location.href = "users.php";
      } else {
        errorMessage.style.display = "block";
        errorMessage.textContent = data;
      }
    }
  };
  const dataInput = new FormData(form);
  xhr.send(dataInput);
});
