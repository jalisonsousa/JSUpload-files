document.addEventListener("DOMContentLoaded", function () {
  var form = document.getElementById("upload-form");
  var fileInput = document.getElementById("file-input");
  var uploadButton = document.getElementById("upload-button");
  var fileLabel = document.getElementById("file-label");

  fileInput.addEventListener("change", function () {
    var fileName = fileInput.value.split("\\").pop();
    if (fileName) {
      uploadButton.disabled = false;
      fileLabel.innerText = fileName;
    } else {
      uploadButton.disabled = true;
      fileLabel.innerText = "Selecionar Arquivo";
    }
  });

  form.addEventListener("submit", function (event) {
    event.preventDefault();
    uploadButton.disabled = true;
    var formData = new FormData(form);
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
      if (request.readyState === XMLHttpRequest.DONE) {
        if (request.status === 200) {
          Swal.fire({
            icon: "success",
            title: "Sucesso",
            text: "O arquivo foi enviado com sucesso!",
            showConfirmButton: false,
            timer: 2000,
          }).then(function () {
            form.reset();
            uploadButton.disabled = true;
            fileLabel.innerText = "Selecionar Arquivo";
          });
        } else {
          Swal.fire({
            icon: "error",
            title: "Erro",
            text: "Ocorreu um erro ao enviar o arquivo.",
            showConfirmButton: false,
            timer: 2000,
          }).then(function () {
            uploadButton.disabled = false;
          });
        }
      }
    };
    request.open("POST", "upload.php");
    request.send(formData);
  });
});

function goToFilesPage() {
  window.location.href = "view-files.php";
}
