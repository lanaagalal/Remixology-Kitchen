let profileDropdownList = document.querySelector(".profile-dropdown-list");
let btn = document.querySelector(".profile-dropdown-btn");

let classList = profileDropdownList.classList;

const toggle = () => classList.toggle("hop");

window.addEventListener("click", function (e) {
  if (!btn.contains(e.target)) classList.remove("hop");
});
