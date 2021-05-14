<?php
session_start();
include_once('db/conn.php');

if ((empty($_POST['user'])) || (empty($_POST['pass']))) {
  header('Location: index.php');
  exit();
}

$user = mysqli_real_escape_string($conn,$_POST['user']);
$pass = mysqli_real_escape_string($conn,$_POST['pass']);

$query = "select * from usuarios where usuario = '{$user}' and senha = '{$pass}'";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
  $_SESSION['usuario'] = $user;
  header ('Location: pag2.php');
}else {
  $_SESSION['ERRO'] = true;
  header('Location: index.php');
}
 ?>
