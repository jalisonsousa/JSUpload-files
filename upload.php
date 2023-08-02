<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
  $file = $_FILES['file'];
  $fileName = $file['name'];
  $fileTmp = $file['tmp_name'];
  $fileType = $file['type'];

  // Check if it's an image or PDF file
  $allowedTypes = array('image/jpeg', 'image/png', 'application/pdf');
  if (!in_array($fileType, $allowedTypes)) {
    http_response_code(400);
    die('Tipo de arquivo inválido. Apenas imagens (JPEG, PNG) e PDFs são permitidos.');
  }

  // Specify the upload directory
  $uploadDir = 'arquivos/';
  $filePath = $uploadDir . $fileName;

  // Move the uploaded file to the desired location
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