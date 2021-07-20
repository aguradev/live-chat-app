const form = document.querySelector(".form-register form");
const registerBtn = form.querySelector("#btn-register");
const errorMessage = form.querySelector(".error-message");

form.onsubmit = (e) => {
  e.preventDefault(); // ? agar ketika melakukan submit halaman tidak di refresh
};

// TODO let's AJAX
registerBtn.addEventListener("click", function () {
  // ? membuat XML object
  let xhr = new XMLHttpRequest();
  // ? mengakses isi file signup.php
  xhr.open("POST", "php/signup.php", true);

  xhr.onload = () => {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // ? tampilkan hasil respon dari signup.php ke body
      let data = xhr.response;
      // ? jika hasil output "success"
      if (data == "success") {
        location.href = "login.php";
      } else {
        // ? tampilkan pesan error
        errorMessage.style.display = "block";
        errorMessage.textContent = data;
      }
    }
  };
  // TODO send data form to ajax
  let formData = new FormData(form);

  // ? kirimkan datanya ke php
  xhr.send(formData);
});
