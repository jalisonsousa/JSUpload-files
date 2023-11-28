<!DOCTYPE html>
<html lang="pt-BR">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="description" content=" Faça Upload de Imagens e PDFs para usar em pc e baixa arquivo no celular ou vice-versa, para uso pessoal. ">
      <link rel="icon" href="icon.png" type="image/icon type">
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/view-delete-files.css">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/gh/jalisonsousa/RemoveBanner/removebanner.js"></script>
      <title>Apagar - JSUpload Files</title>
   </head>
   <body>
      <main class="container">
         <h1 class="mt-5">Apagar Arquivos</h1>
         <div class="files-container row">
             <?php
            $diretorio = 'uploads/';
            $arquivos = scandir($diretorio);
            $allowedExtensions = ['jpeg', 'jpg', 'png', 'pdf', 'docx', 'xlsx'];
            foreach ($arquivos as $arquivo) {
                $extension = pathinfo($arquivo, PATHINFO_EXTENSION);
                if ($arquivo !== '.' && $arquivo !== '..' && $arquivo !== '.htaccess' && in_array($extension, $allowedExtensions)) {
                    echo '<div class="arquivo col-md-4">';
                    echo '<div class="arquivo-nome">' . $arquivo . '</div>';
                    echo '<a class="delete-button" href="delete.php?arquivo=' . urlencode($arquivo) . '">Apagar</a>';
                    echo '</div>';
                }
            }
            ?>
         </div>
         <center>
            <a class="back-button" href="\sitefile">Voltar</a>
         </center>
         <div class="footer mt-5">
            <a href="https://github.com/jalisonsousa">
               <img src="https://cdn.discordapp.com/attachments/410233690212401162/1128038777533780060/1689008345978.png" alt="JalisonSousa" class="footer-image">
            </a>
         </div>
      </main>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
      <script>
        <?php
            if (isset($_GET['success']) && isset($_GET['message'])) {
                $isSuccess = $_GET['success'];
                $message = $_GET['message'];

                if ($isSuccess) {
                    echo 'Swal.fire({';
                    echo 'icon: "success",';
                    echo 'title: "Sucesso!",';
                    echo 'text: "' . $message . '",';
                    echo 'showConfirmButton: false,';
                    echo 'timer: 2000';
                    echo '});';
                } else {
                    echo 'Swal.fire({';
                    echo 'icon: "error",';
                    echo 'title: "Erro!",';
                    echo 'text: "' . $message . '",';
                    echo 'showConfirmButton: false,';
                    echo 'timer: 2000';
                    echo '});';
                }
            }
        ?>
      </script>
   </body>
</html>
