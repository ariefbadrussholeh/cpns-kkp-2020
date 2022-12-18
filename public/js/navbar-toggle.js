const check = document.getElementById("check");
const navbar = document.getElementById("navbar");
check.addEventListener("click", function () {
  if (check.checked == true) {
    navbar.style.display = "block";
  } else {
    navbar.style.display = "none";
  }
});
