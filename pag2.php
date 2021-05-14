<?php
session_start();
include ('db/conn.php');
include 'verifica_login.php';
?>

<html lang="pt-br">
<head>
  <meta charset= "utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title> L drive de <?php $_SESSION['usuario']; ?> </title>
  <link rel="stylesheet" href="CSS/main.css">
  <link rel="stylesheet" href="CSS/jquery.mobile-1.4.5.min.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  <script type="text/javascript" src= "JS/jquery-1.9.1.min.js"></script>
  <script type="text/javascript" src= "JS/jquery.mobile-1.4.5.min.js" /></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <style media="screen">
  #progress-wrp {
    border: 1px solid #0099CC;
    padding: 1px;
    position: relative;
    border-radius: 3px;
    margin: 10px;
    text-align: left;
    background: #fff;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
  }
  #progress-wrp .progress-bar{
    height: 30px;
    border-radius: 3px;
    background-color: #EFC958;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
  }
  #progress-wrp .status{
    top:3px;
    left:47%;
    position:absolute;
    display:inline-block;
    color: #000000;
  }
</style>
</head>
<body>
  <div data-role="page">
    <?php
    //header
    include 'view/header_main.php';
    //main
    include 'view/main.php';
    //footer
    include 'view/footer.php';
    ?>
  </div>

  <!-- Modais -->
  <div class="modal" id="upload" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Upload de arquivos</h5>
          <button type="button" class="close" data-dismiss="modal">x</button>
        </div>
        <div class="modal-body">
          <form id="upload-form" enctype="multipart/form-data">
            <input type="file" name="arquivo[]" multiple>
            <br>
            <br>
            <center><button class="btn" style="background-color: #EFC958;" id="enviar">Upload</button></center>
            <div id="progress-wrp">
              <div class="progress-bar"></div >
                <div class="status">0%</div>
              </div>
              <div id="mensagens">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  </html>
  <script type="text/javascript">
  $("#enviar").on('click', function(e){
    e.preventDefault();
    var formData = new FormData($("#upload-form")[0]);
    $.ajax({
      url: "enviar.php",
      type: 'POST',
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      enctype: 'multipart/form-data',

      xhr: function(){
        //upload Progress
        var xhr = $.ajaxSettings.xhr();
        if (xhr.upload) {
          xhr.upload.addEventListener('progress', function(event) {
            var percent = 0;
            var position = event.loaded || event.position;
            var total = event.total;
            if (event.lengthComputable)
            {
              percent = Math.ceil(position / total * 100);
            }
            //update progressbar
            $(".progress-bar").css("width", + percent +"%");
            $(".status").text(percent +"%");
          }, true);
        }
        return xhr;
      },
      success: function (data) {
        $("#mensagens").html(data);

      },
    });
  });

</script>
