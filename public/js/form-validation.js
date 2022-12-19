function validateNIK() {
  const input = document.getElementById("nik");
  const error = document.getElementById("error-nik");
  if (input.value == "") {
    error.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> NIK tidak boleh kosong';
    return false;
  }
  if (!containsAnyLetters(input.value)) {
    error.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> NIK hanya berupa angka';
    return false;
  }
  if (input.value.length != 16) {
    error.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> NIK anda tidak valid';
    return false;
  }
  error.innerHTML = "";
  return true;
}

function validateEmail() {
  const input = document.getElementById("email");
  const error = document.getElementById("error-email");

  const regexExp = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (input.value == "") {
    error.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Email tidak boleh kosong';
    return false;
  }
  if (!input.value.match(regexExp)) {
    error.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Email anda tidak valid';
    return false;
  }
  error.innerHTML = "";
  return true;
}

function validatePwd() {
  const input = document.getElementById("password");
  const error = document.getElementById("error-pwd");

  if (input.value == "") {
    error.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password tidak boleh kosong';
    return false;
  }
  if (input.value.length < 8) {
    error.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password minimal 8 karakter';
    return false;
  }
  error.innerHTML = "";
  return true;
}

function validateConfirmPwd() {
  const input = document.getElementById("confirm-password");
  const password = document.getElementById("password");
  const error = document.getElementById("error-confirm-pwd");

  if (input.value != password.value) {
    error.innerHTML = '<i class="fa-solid fa-triangle-exclamation"></i> Password tidak sama';
    return false;
  }
  error.innerHTML = "";
  return true;
}

function verification() {
  if (!validateNIK()) {
    return false;
  }
  const formNIK = document.getElementById("form-nik");
  const formRegister = document.getElementById("form-register");
  formNIK.classList.add("hidden");
  formRegister.classList.remove("hidden");
}

function registerValidation() {
  if (!validateEmail() || !validatePwd() || !validateConfirmPwd()) {
    return false;
  }
  const register = document.getElementById("register");
  register.click();
  return true;
}

function loginValidation() {
  if (!validateEmail() || !validatePwd()) {
    return false;
  }
  const loginSubmit = document.getElementById("login");
  loginSubmit.click();
  return true;
}

function containsAnyLetters(str) {
  return /^\d+$/.test(str);
}
