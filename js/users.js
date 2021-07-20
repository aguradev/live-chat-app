const searchBar = document.querySelector("#users .search input");
const searchBtn = document.querySelector("#users .search button");
const userList = document.querySelector("#users .users-list");
const iconClose = document.querySelector("#users .search .bi-x-lg");
const iconSearch = document.querySelector("#users .search .bi-search");

searchBtn.onclick = () => {
  searchBar.classList.toggle("active");
  searchBar.focus();
  searchBtn.classList.toggle("active");
  iconClose.classList.toggle("icon-active");
  iconSearch.classList.toggle("icon-deactive");
  searchBar.value = "";
  searchBar.classList.remove("search-active");
};

searchBar.onkeyup = () => {
  let searchValue = searchBar.value;
  // TODO input data tidak kosong maka tambahkan class active
  if (searchValue !== "") {
    searchBar.classList.add("search-active");
  } else {
    searchBar.classList.remove("search-active");
  }
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let data = xhr.response;
      userList.innerHTML = data;
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  // ? kirimkan input ke file php
  xhr.send("searchValue=" + searchValue);
};

// * Ajax
setInterval(() => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/userData.php", true);
  xhr.onload = () => {
    if (xhr.readyState == 4 && xhr.status == 200) {
      let data = xhr.response;
      // TODO jika searchBar tidak mengandung class search-active maka kirimkan data
      if (!searchBar.classList.contains("search-active")) {
        // ? menampilkan hasil respond data di innerHtml userList
        userList.innerHTML = data;
      }
    }
  };
  xhr.send();
}, 500);
// TODO data akan muncul dalam 500ms
