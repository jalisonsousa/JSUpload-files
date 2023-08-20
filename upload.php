<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
  $file = $_FILES['file'];
  $fileName = $file['name'];
  $fileTmp = $file['tmp_name'];
  $fileType = $file['type'];
  $allowedTypes = array('image/jpg', 'image/jpeg', 'image/png', 'application/pdf');

  if (!in_array($fileType, $allowedTypes)) {
    http_response_code(400);
    die('Tipo de arquivo inválido. Apenas imagens (JPEG, PNG) e PDFs são permitidos.');
  }
  $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
  if (!in_array($fileExtension, array('jpg', 'jpeg', 'png', 'pdf'))) {
    http_response_code(400);
    die('Extensão de arquivo não permitida. Apenas JPG, JPEG, PNG e PDF são permitidos.');
  }

  $uploadDir = 'uploads/';
  $filePath = $uploadDir . $fileName;

  if (move_uploaded_file($fileTmp, $filePath)) {
    http_response_code(200);
    echo 'Arquivo enviado com sucesso!';
  } else {
    http_response_code(500);
    echo 'Ocorreu um erro ao enviar o arquivo.';
  }
} else {
  http_response_code(400);
  echo 'Requisição inválida.';
}
?>