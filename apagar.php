<?php
session_start();

$pasta = 'uploads';
$user = $_SESSION['usuario'];

if (isset($_GET['file']) && file_exists("{$pasta}/{$user}/".$_GET['file'])) {
  $file = $_GET['file'];
  unlink("{$pasta}/{$user}/{$file}");
  header('Location: pag2.php');

}
 ?>
