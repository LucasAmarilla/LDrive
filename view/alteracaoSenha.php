<?php
session_start();
include './db/conn.php';

if(isset($_POST['enviar']))
{
  $user = $_SESSION['usuario'];
  $senha = $_POST['senha'];

  $sql = "UPDATE usuarios SET senha ='{$senha}' where '{$user}' = usuario";

  if (mysqli_query($conn, $sql)) {
    $_SESSION['senha_mudado'] = true;
    header("Refresh: 40;");

  }else {
    $_SESSION['ERRO'] = true;
    header("Refresh: 0;");
    exit();
  }

  mysqli_close($conn);
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" data-ajax="false">
  <div role="main" class="ui-cont ent">
    <?php if ($_SESSION['senha_mudado']) {?>
      <center><div class="alert alert-success" role="alert">
        senha alterada com sucesso!
      </div></center>
    <?php }
    unset($_SESSION['senha_mudado'])
    ?>

    <?php if ($_SESSION['ERRO']) {?>
      <div class="alert alert-danger" role="alert">
        Ocorreu um erro!
      </div>
    <?php }
    unset($_SESSION['ERRO'])
    ?>

    <center><h3 for="senha">Informe sua nova senha</h3></center>
    <input type="password" name="senha" id="senha">
    <center><button type="submit" class="btn" style="background-color: #EFC958;" name="enviar">Alterar</button></center>
  </div>
</form>
