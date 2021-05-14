<?php
session_start();
$arquivos = $_FILES['arquivo'];
$indice = count(array_filter($arquivos['name']));

if ($indice <= 0) {
  echo "sem selecao de arquivos";
}else {
  for ($i=0; $i < $indice ; $i++) {
    $arquivos['name'][$i];
    $enviar = move_uploaded_file($arquivos['tmp_name'][$i], "uploads/".$_SESSION["usuario"]."/".$arquivos['name'][$i]);
  }
  if ($enviar == true) {
    echo '<br><div class="alert alert-success" role="alert">
    <center>Arquivo enviado com sucesso</center>
    </div>';
    echo "<meta HTTP-EQUIV='refresh' CONTENT='2'>";
  }else {
    echo '<br><div class="alert alert-danger" role="alert">
    <center>Houve um erro no arquivo</center>
    </div>';
  }
}
