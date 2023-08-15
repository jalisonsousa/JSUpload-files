<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
               $diretorio = 'arquivos/';
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
            <a class="back-button" href="index.html">Voltar</a>
            <a href="view-delete-files.php" class="back-button">Apagar</a>
         </center>
         <div class="footer mt-5">
            <a href="https://github.com/jalisonsousa">
               <img src="\imagens/footerNoBack.png" alt="JalisonSousa" class="footer-image">
            </a>
         </div>
      </main>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
   </body>
</html>
