<?php
session_start();

$pasta = 'uploads';
$user = $_SESSION['usuario'];

if (isset($_GET['file']) && file_exists("{$pasta}/{$user}/".$_GET['file'])) {
  $file = $_GET['file'];
  $type = filetype("{$pasta}/{$user}/{$file}");
  $size = filesize("{$pasta}/{$user}/{$file}");
  header ("Content-Description: File Transfer");
  header ("Content-Type: {$type}");
  header ("Content-Length: {$size}");
  header ("Content-Disposition: attachment; filename = $file");
  readfile("{$pasta}/{$user}/{$file}");
  exit;
}

 ?>
