<?php
session_start();
?>
<main>
  <form method="post" action="logar.php"  data-ajax="false">
    <div role="main" class="ui-content">
      <center><h3>Bem vindo faça seu login</h3></center>
      <br>

      <?php if ($_SESSION['status_cadastro']) {?>
        <div class="alert alert-success" role="alert">
          <center><h4>Cadastro efetudo com sucesso, faça seu login agora</h4></center>
        </div>
      <?php }
      unset($_SESSION['status_cadastro'])
      ?>
      <?php if ($_SESSION['ERRO']) {?>
        <div class="alert alert-danger" role="alert">
          <center><h4>Ocorreu um erro, tente digitar novamente sua senha e/ou usuario </h4></center>
        </div>
      <?php }
      unset($_SESSION['ERRO'])
      ?>

      <center><h4 for="txt-user">User</h4></center>
      <input type="text" name="user" id="txt-user">
      <center><h4 for="txt-password">Senha</h4></center>
      <input type="password" name="pass" id="txt-password" value="">
      <br>
      <fieldset data-role="controlgroup">
        <input type="checkbox" name="chck-rememberme" id="chck-rememberme" checked="">
        <label for="chck-rememberme">Lembre de mim</label>
      </fieldset>
      <center><button type="submit" class="btn" style="background-color: #EFC958;" name="enviar">Entrar</button></center>
      <a href="./cadastro.php" data-ajax="false">Clique aqui para se cadastrar</a>
    </div>
  </form>
</main>
