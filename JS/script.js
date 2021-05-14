<main>
  <div data-role="content" data-theme="a">
    <center><h3>Bem vindo ao seu LDrive <?php echo $_SESSION['usuario']; ?></h3><center>
      <br>
      <div data-role="navbar">
        <ul>
          <li> <a  id="btnList">list</a> </li>
          <li> <a  id="btnIntermediario">Intermediario </a> </li>
          <li> <a  id="btnAvancado">Avancado</a> </li>
        </ul>
        <div id="resultado"></div>
      </div>
    </div>
  </main>

<script type="text/javascript">
$(document).ready(function() {

$("#btnSimples").click(function(){

  $.ajax({
    method: "POST",
    url: "BracoSimples.html",
    beforeSend : function(){
      $("#resultado").html("ENVIANDO...");
    }
  })
  .done(function(msg){
    $("#resultado").html(msg);
  })
  .fail(function(jqXHR, textStatus, msg){
    alert(msg);
  });
});

$("#btnList").click(function(){

  $.ajax({
    method: "POST",
    url: "./list.php",
    beforeSend : function(){
      $("#resultado").html("ENVIANDO...");
    }
  })
  .done(function(msg){
    $("#resultado").html(msg);
  })
  .fail(function(jqXHR, textStatus, msg){
    alert(msg);
  });
});

$("#btnAvancado").click(function(){

  $.ajax({
    method: "POST",
    url: "BracoAvancado.html",
    beforeSend : function(){
      $("#resultado").html("ENVIANDO...");
    }
  })
  .done(function(msg){
    $("#resultado").html(msg);
  })
  .fail(function(jqXHR, textStatus, msg){
    alert(msg);
  });
});

});
</script>
