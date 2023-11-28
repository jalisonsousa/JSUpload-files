<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['files'])) {
    $files = $_FILES['files'];

    $uploadDir = 'uploads/';
    
    // Loop através de cada arquivo
    for ($i = 0; $i < count($files['name']); $i++) {
        $fileName = $files['name'][$i];
        $fileTmp = $files['tmp_name'][$i];
        $fileSize = $files['size'][$i];

        // Verificar o tamanho do arquivo (10 MB = 10 * 1024 * 1024 bytes)
        $maxFileSize = 10 * 1024 * 1024;
        if ($fileSize > $maxFileSize) {
            http_response_code(400);
            die("O arquivo $fileName é muito grande. O tamanho máximo permitido é de 10 MB.");
        }

        // Usar mime_content_type() para obter o tipo MIME do arquivo
        $fileType = mime_content_type($fileTmp);
        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

        if (!in_array($fileType, $allowedTypes)) {
            http_response_code(400);
            die("Tipo de arquivo inválido. Apenas JPG, JPEG, PNG, PDF, DOCX, XLSX são permitidos.");
        }

        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, ['jpg', 'jpeg', 'png', 'pdf', 'docx', 'xlsx'])) {
            http_response_code(400);
            die("Extensão de arquivo não permitida. Apenas JPG, JPEG, PNG, PDF, DOCX, XLSX são permitidos.");
        }

        $filePath = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmp, $filePath)) {
            echo "Arquivo $fileName enviado com sucesso!<br>";
        } else {
            http_response_code(500);
            die("Ocorreu um erro ao enviar o arquivo $fileName.");
        }
    }

    echo "Todos os arquivos foram enviados com sucesso!";
} else {
    http_response_code(400);
    echo 'Requisição inválida.';
}
?>
