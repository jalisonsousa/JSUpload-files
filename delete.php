<?php
    // SEGUNDA CORREÇÃO DO DIA. 19/08/2023
    if (isset($_GET['arquivo'])) {
        $arquivo = $_GET['arquivo'];
        if($arquivo == "") { echo "Sem nenhum resultado."; exit;}
        
        $caminhoA = 'arquivos/' . $arquivo;
        $caminhoB = "../";

        if(strpos($caminhoA, $caminhoB) === false){
            if (file_exists($caminhoA)) {
                if (unlink($caminhoA)) {
                    $message = 'Removido com sucesso.';
                    $isSuccess = true;
                } else {
                    $message = 'Erro ao remover o arquivo.';
                    $isSuccess = false;
                }
            } else {
                $message = 'Arquivo não existe!';
                $isSuccess = false;
            }
        } else {
            $message = 'Acesso negado!';
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
