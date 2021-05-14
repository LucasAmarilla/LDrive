<?php
session_start();
?>
<main>
  <form method="post" action="./cadastro_func.php"  data-ajax="false">
    <div role="main" class="ui-content">
      <center><h2>Cadastre-se</h2></center>
      <?php if ($_SESSION['usuario_existe']) {?>
        <div class="alert alert-danger" role="alert">
          <h4>O usuario já existe</h4>
        </div>

      <?php }
      unset($_SESSION['usuario_existe'])
      ?>

      <?php if ($_SESSION['ERRO']) {?>
        <div class="alert alert-danger" role="alert">
          <h4>Ocorreu um erro </h4>
        </div>
      <?php }
      unset($_SESSION['ERRO'])
      ?>

      <center><h5 for="txt-user">Informe o seu nome de usuario</h5></center>
      <input type="text" name="cad-user" id="txt-user">
      <center><h5 for="txt-password">Informe a sua nova senha</h5></center>
      <input type="password" name="cad-pass" id="txt-password" value="">
      <center><h5 for="txt-password">Informe a seu email</h5></center>
      <input type="text" name="cad-email" id="txt-password" value="">
      <br>
      <center><button type="submit" class="btn" style="background-color: #EFC958;" name="enviar">Cadastrar</button></center>
    </div>
  </form>
</main>
