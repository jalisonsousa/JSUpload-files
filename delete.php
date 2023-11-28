<?php
    if (isset($_GET['arquivo'])) {
        $arquivo = $_GET['arquivo'];
        if($arquivo == "") { echo "Sem nenhum resultado."; exit;}
        $caminhoA = 'uploads/' . $arquivo;
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
// Exibir notificação usando SweetAlert
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: '" . ($isSuccess ? 'success' : 'error') . "',
            title: 'Aviso',
            text: '" . addslashes($message) . "',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            window.location.href = 'view-delete.php';
        });
    });
</script>";
?>

