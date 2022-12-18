const dropArea = document.getElementById("upload-photos"),
  dragText = document.getElementById("title"),
  input = document.getElementById("photo");
let file;

dropArea.addEventListener("click", function () {
  input.click();
});

input.addEventListener("change", function () {
  file = this.files[0];
  dropArea.classList.add("active");
  viewfile();
});

dropArea.addEventListener("dragover", (event) => {
  event.preventDefault();
  dropArea.classList.add("active");
  dragText.textContent = "Lepaskan untuk upload gambar";
});

dropArea.addEventListener("dragleave", () => {
  dropArea.classList.remove("active");
  dragText.textContent = "Drag & Drop untuk upload gambar";
});

dropArea.addEventListener("drop", (event) => {
  event.preventDefault();

  file = event.dataTransfer.files[0];
  viewfile();
});

function viewfile() {
  let fileType = file.type;
  let validExtensions = ["image/jpeg", "image/jpg", "image/png"];
  if (validExtensions.includes(fileType)) {
    let fileReader = new FileReader();
    fileReader.onload = () => {
      let fileURL = fileReader.result;
      let imgTag = `<img src="${fileURL}" alt="image" id="preview">`;
      dropArea.innerHTML = imgTag;
    };
    fileReader.readAsDataURL(file);
  } else {
    alert("This is not an Image File!");
    dropArea.classList.remove("active");
    dragText.textContent = "Drag & Drop untuk upload gambar";
  }
}
