<?php
// Verifica se o parâmetro "arquivo" está presente na URL
if (isset($_GET['arquivo'])) {
  $arquivo = $_GET['arquivo'];
  
  // Caminho para a pasta de uploads
  $caminhoArquivo = 'uploads/' . $arquivo;

  // Verifica se o arquivo existe
  if (file_exists($caminhoArquivo)) {
    // Define os cabeçalhos para forçar o download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($caminhoArquivo));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($caminhoArquivo));
    readfile($caminhoArquivo);
    exit;
  } else {
    echo 'O arquivo não existe.';
  }
} else {
  echo 'O arquivo não foi especificado.';
}
?>
