<?php
// FALHA DE SEGURANÇA: 19/08/2023

// Verifica se o parâmetro "arquivo" está presente na URL
if (isset($_GET['arquivo'])) {
  $arquivo = $_GET['arquivo'];
  if($arquivo == ""){ echo "√ Você é malvado? kkk " . $_SERVER["REMOTE_ADDR"]; exit; ; }
  
  // Caminho para a pasta de uploads
  $caminhoArquivo = 'arquivos/' . $arquivo;
  $caminhoCheck = "../";

  // Verifica se o arquivo existe
  if (strpos($caminhoArquivo, $caminhoCheck) === false) {
    if(file_exists($caminhoArquivo)){
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
      echo "Esse arquivo não existe.";
    }
  } else {
    echo 'Acesso negado!';
  }
} else {
  echo 'O arquivo não foi especificado.';
} // RESOLVIDO POR R0HTG0R/KASPAROV
?>
