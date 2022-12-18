const ijazahDrop = document.getElementById("ijazah-drop");
const cvDrop = document.getElementById("cv-drop");
const ijazahTitle = document.getElementById("ijazah-title");
const cvTitle = document.getElementById("cv-title");
const ijazahInput = document.getElementById("ijazah");
const cvInput = document.getElementById("cv");
let ijazahFile;
let cvFile;

ijazahDrop.addEventListener("click", function () {
  ijazahInput.click();
});
cvDrop.addEventListener("click", function () {
  cvInput.click();
});
ijazahInput.addEventListener("change", function () {
  ijazahFile = this.files[0];
  ijazahDrop.classList.add("active-drop");
  changeTitle(ijazahDrop, ijazahFile);
  console.log(ijazahInput.files[0]);
});
cvInput.addEventListener("change", function () {
  cvFile = this.files[0];
  cvDrop.classList.add("active-drop");
  changeTitle(cvDrop, cvFile);
});
ijazahDrop.addEventListener("dragover", (event) => {
  event.preventDefault();
  ijazahDrop.classList.add("active-drop");
  ijazahTitle.innerHTML = "Lepaskan untuk upload ijazah";
});
ijazahDrop.addEventListener("dragleave", () => {
  ijazahDrop.classList.remove("active-drop");
  ijazahTitle.innerHTML = "Drag & Drop untuk upload ijazah";
});
cvDrop.addEventListener("dragover", (event) => {
  event.preventDefault();
  cvDrop.classList.add("active-drop");
  cvTitle.innerHTML = "Lepaskan untuk upload CV";
});
cvDrop.addEventListener("dragleave", () => {
  cvDrop.classList.remove("active-drop");
  cvTitle.innerHTML = "Drag & Drop untuk upload CV";
});
ijazahDrop.addEventListener("drop", (event) => {
  event.preventDefault();

  ijazahFile = event.dataTransfer.files[0];
  changeTitle(ijazahDrop, ijazahFile);
});
cvDrop.addEventListener("drop", (event) => {
  event.preventDefault();

  cvFile = event.dataTransfer.files[0];
  changeTitle(cvDrop, cvFile);
});
function changeTitle(title, file) {
  title.innerHTML = file.name;
}
