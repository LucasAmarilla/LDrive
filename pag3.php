<?php
session_start();
include_once('db/conn.php');

?>
<html lang="pt-br">
<head>
  <meta charset= "utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title> Confingurações de <?php $_SESSION['usuario']; ?> </title>
  <link rel="stylesheet" href="CSS/jquery.mobile-1.4.5.min.css" />
  <link rel="stylesheet" href="CSS/main.css">
  <script type="text/javascript" src= "JS/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src= "JS/jquery.mobile-1.4.5.min.js" /></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
</style>
</head>
<body>
  <div data-role="page" id="principal" data-theme="a">
    <div class="header" data-role="header" style="background-color: #EFC958;">
      <h1><img src="Assets/LDrive.png"></h1>
      <a style="background-color: #EFC958;" href="pag2.php" class="ui-btn ui-btn-icon-left" data-role="button"><ion-icon name="home-sharp" size="large"></ion-icon></a>
    </div>
    <div data-role="content" data-theme="a" class="center-wrapper">
      <form>
        <a href="alteracaoEmail.php" class="ui-btn ui-btn-center" data-role="button" data-ajax="false">Alterar email</ion-icon></a>
        <br>
        <a  href="alteracaoSenha.php" class="ui-btn ui-btn-center" data-role="button">Alterar senha</ion-icon></a>
        <br>
        <a  href="alteracaoUsuario.php" class="ui-btn ui-btn-center" data-role="button">Alterar nome de usuario</ion-icon></a>
      </form>
    </div>
  </div>
</body>
</html>
