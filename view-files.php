<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta content="minimum-scale=0.8, width=device-width, maximum-scale=0, user-scalable=no" name="viewport">
      <meta name="description" content=" Faça Upload de Imagens e PDFs para usar em pc e baixa arquivo no celular ou vice-versa, para uso pessoal. ">
      <link rel="icon" href="icon.png" type="image/icon type">
      <link rel="stylesheet" type="text/css" href="css/view-files.css">
      <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/gh/jalisonsousa/RemoveBanner/removeBanner2.js"></script>
      <title>JSUpload Files - Arquivos</title>
   </head>
   <body>
      <main class="container">
         <h1 class="mt-5">Visualizar Arquivos</h1>
         <div class="files-container row">
            <?php
               $diretorio = 'uploads/';
               $arquivos = scandir($diretorio);
               foreach ($arquivos as $arquivo) {
                  if ($arquivo !== '.' && $arquivo !== '..') {
                     echo '<div class="arquivo col-md-4">';
                     echo '<div class="arquivo-nome">' . $arquivo . '</div>';
                     echo '<a class="botao-download" href="download.php?arquivo=' . $arquivo . '">Download</a>';
                     echo '</div>';
                  }
               }
            ?>   
         </div>
         <center>
            <a class="back-button" href="\up">Voltar</a>
            <a href="view-delete-files.php" class="back-button">Apagar</a>
         </center>
         <div class="footer mt-5">
            <a href="https://github.com/jalisonsousa">
               <img src="https://cdn.discordapp.com/attachments/410233690212401162/1128038777533780060/1689008345978.png" alt="JalisonSousa" class="footer-image">
            </a>
         </div>
      </main>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
   </body>
</html>
