const form = document.querySelector(".chat-area .typing-area"),
  inputField = form.querySelector(".form-message"),
  btnSend = form.querySelector(".btn-send");
const chatBox = document.querySelector(".chat-area .chat-box");

btnSend.disabled = true;

inputField.onkeyup = () => {
  if (inputField.value !== "") {
    btnSend.classList.add("active");
    btnSend.disabled = false;
  } else {
    btnSend.classList.remove("active");
    btnSend.disabled = true;
  }
};

form.onsubmit = (e) => {
  e.preventDefault();
};

btnSend.onclick = () => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/insertChat.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      inputField.value = "";
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
};

setInterval(() => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/get-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let data = xhr.response;
      chatBox.innerHTML = data;
    }
  };
  let formData = new FormData(form);
  xhr.send(formData);
}, 500);
