<?php
session_start();
include_once('db/conn.php');

$user = mysqli_real_escape_string($conn,$_POST['cad-user']);
$pass = mysqli_real_escape_string($conn,$_POST['cad-pass']);
$email = mysqli_real_escape_string($conn,$_POST['cad-email']);

$sql = "select * from usuarios where usuario = '{$user}'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['usuario'] == 1) {
  $_SESSION['usuario_existe'] = true;
  header ('Location: cadastro-view.php');
  exit();
}


$sql = "INSERT INTO usuarios(usuario, senha, email) VALUES ('{$user}','{$pass}','{$email}')";

if (mysqli_query($conn, $sql)) {
  $_SESSION['status_cadastro'] = true;
  mkdir('uploads/'.$user.'/', 0777, true);
  header('Location: index.php');

} else {
  $_SESSION['ERRO'] = true;
  header ('Location: cadastro-view.php');
  exit();
}

mysqli_close($conn);
 ?>
