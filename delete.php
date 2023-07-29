<?php

if (isset($_GET['arquivo'])) {

    $arquivo = $_GET['arquivo'];

    $scandir = 'uploads/';



    $filePath = $scandir . $arquivo;

    if (file_exists($filePath)) {

        if (unlink($filePath)) {

            $message = 'Removido com sucesso.';

            $isSuccess = true;

        } else {

            $message = 'Erro ao remover o arquivo.';

            $isSuccess = false;

        }

    } else {

        $message = 'O arquivo não existe.';

        $isSuccess = false;

    }

} else {

    $message = 'Parâmetros inválidos.';

    $isSuccess = false;

}



// Redirecionar de volta para a página delete-files.php com mensagem de sucesso/erro

header("Location: view-delete-files.php?success=$isSuccess&message=" . urlencode($message));

exit();

?>

