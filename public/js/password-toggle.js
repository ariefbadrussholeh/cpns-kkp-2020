const password = document.getElementById("password");
const confirmPassword = document.getElementById("confirm-password");
const passwordToggle = document.getElementById("password-toggle");
const confirmPasswordToggle = document.getElementById("confirm-password-toggle");

passwordToggle.addEventListener("click", function () {
  const type = password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  this.classList.toggle("fa-eye-slash");
});

confirmPasswordToggle.addEventListener("click", function () {
  const type = confirmPassword.getAttribute("type") === "password" ? "text" : "password";
  confirmPassword.setAttribute("type", type);
  this.classList.toggle("fa-eye-slash");
});
