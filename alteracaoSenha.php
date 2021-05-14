<?php session_start();?>
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
<?php
include 'view/header.php';
include 'view/alteracaoSenha.php';
include 'view/footer.php';


 ?>
</body>
</html>
