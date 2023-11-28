<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Faça Upload de Imagens e PDFs para usar em pc e baixa arquivo no celular ou vice-versa." />
    <link rel="icon" href="icon.png" type="image/icon type" />
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/jalisonsousa/RemoveBanner/removebanner.js"></script>
    <title>JSUpload Files</title>
    
  </head>
  <body>
    <h1 class="mt-5">Upload de Imagens e PDFs</h1>
    <form id="upload-form" enctype="multipart/form-data" class="mb-3" action="upload.php" method="post">
         <input type="file" name="files[]" id="file-input" accept="image/*, application/pdf, application/vnd.openxmlformats-officedocument.wordprocessingml.document, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" onchange="showFileName()" class="d-none" multiple />
         <label for="file-input" id="file-label" class="btn btn-success">Selecionar Arquivos</label>
        <button type="submit" id="upload-button" class="btn btn-primary" disabled="disabled">Enviar</button>
    </form>
    <button onclick="goToFilesPage()" id="view-files-button" class="btn btn-primary d-block mx-auto">Ver Arquivos</button>
    <center>
      <a href="view-delete.php" id="delete-button" class="btn btn-light">Apagar arquivos</a>
    </center>
    <div class="footer mt-5">
      <a href="https://github.com/jalisonsousa">
        <img src="https://cdn.discordapp.com/attachments/410233690212401162/1128038777533780060/1689008345978.png" alt="JalisonSousa" class="footer-image" />
      </a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/index-enviar.js"></script>
  </body>
</html>
